<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as ImageManager;

class ImageService
{
    private const BASE_PATH = 'uploads/gallery/images';
    
    private function ensureDirectoriesExist(): void
    {
        $paths = [
            self::BASE_PATH,
            self::BASE_PATH . '/webp',
            self::BASE_PATH . '/thumbs',
            self::BASE_PATH . '/thumbs/webp'
        ];

        foreach ($paths as $path) {
            $fullPath = public_path($path);
            if (!File::isDirectory($fullPath)) {
                File::makeDirectory($fullPath, 0755, true);
            }
        }
    }

    public function upload(UploadedFile $file, object $model, bool $delete = false): void
    {
        try {
            // Ensure directories exist before processing
            $this->ensureDirectoriesExist();
            
            // Delete old files if requested
            if ($delete) {
                $this->deleteExistingFiles($model);
            }

            $name_file = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $name = date('His') . '_' . Str::slug($name_file) . '.' . $file->getClientOriginalExtension();
            $name_webp = date('His') . '_' . Str::slug($name_file) . '.webp';

            $file->storeAs('gallery/images/', $name, 'public_uploads');

            $filepath = public_path('uploads/gallery/images/' . $name);
            $filepath_webp = public_path('uploads/gallery/images/webp/' . $name_webp);

            $thumb_filepath = public_path('uploads/gallery/images/thumbs/' . $name);
            $thumb_filepath_webp = public_path('uploads/gallery/images/thumbs/webp/' . $name_webp);

            ImageManager::make($filepath)
                ->resize(
                    config('images.gallery.big_width'),
                    config('images.gallery.big_height'),
                    function ($constraint) {
                        $constraint->aspectRatio();
                    }
                )->save($filepath);
            ImageManager::make($filepath)->encode('webp', 90)->save($filepath_webp);

            ImageManager::make($filepath)
                ->fit(
                    config('images.gallery.thumb_width'),
                    config('images.gallery.thumb_height')
                )->save($thumb_filepath);
            ImageManager::make($thumb_filepath)->encode('webp', 90)->save($thumb_filepath_webp);

            $model->update([
                'file' => $name,
                'file_webp' => $name_webp,
                'name' => $file->getClientOriginalName()
            ]);
        } catch (\Exception $e) {
            \Log::error('Image upload failed: ' . $e->getMessage());
            throw new \RuntimeException('Failed to process image: ' . $e->getMessage());
        }
    }

    private function deleteExistingFiles(object $model): void
    {
        $paths = [
            self::BASE_PATH . '/' . $model->file,
            self::BASE_PATH . '/webp/' . $model->file_webp,
            self::BASE_PATH . '/thumbs/' . $model->file,
            self::BASE_PATH . '/thumbs/webp/' . $model->file_webp
        ];

        foreach ($paths as $path) {
            $fullPath = public_path($path);
            if (File::isFile($fullPath)) {
                File::delete($fullPath);
            }
        }
    }
}
