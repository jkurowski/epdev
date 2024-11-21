<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class InvestmentArticleService
{
    public function upload(string $title, UploadedFile $file, object $model, bool $delete = false)
    {
        // Create required directories if they don't exist
        $this->ensureDirectoriesExist([
            'investment/articles',
            'investment/articles/thumbs',
            'investment/articles/webp',
            'investment/articles/thumbs/webp'
        ]);

        if ($delete) {
            if (File::isFile(public_path('investment/articles/' . $model->file))) {
                File::delete(public_path('investment/articles/' . $model->file));
            }
            if (File::isFile(public_path('investment/articles/thumbs/' . $model->file))) {
                File::delete(public_path('investment/articles/thumbs/' . $model->file));
            }

            // WebP
            if (File::isFile(public_path('investment/articles/webp/' . $model->file_webp))) {
                File::delete(public_path('investment/articles/webp/' . $model->file_webp));
            }
            if (File::isFile(public_path('investment/articles/thumbs/webp/' . $model->file_webp))) {
                File::delete(public_path('investment/articles/thumbs/webp/' . $model->file_webp));
            }
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $name_webp = date('His').'_'.Str::slug($title).'.webp';

        $file->storeAs('articles', $name, 'investment_uploads');

        $file_path = public_path('investment/articles/' . $name);
        $file_thumb_path = public_path('investment/articles/thumbs/' . $name);

        // Create and save images with error handling
        try {
            Image::make($file_path)
                ->fit(config('images.article.big_width'), config('images.article.big_height'))
                ->save($file_path, 90);

            Image::make($file_path)
                ->fit(config('images.article.thumb_width'), config('images.article.thumb_height'))
                ->save($file_thumb_path, 90);

            // WebP versions
            $file_path_webp = public_path('investment/articles/webp/' . $name_webp);
            $file_thumb_path_webp = public_path('investment/articles/thumbs/webp/' . $name_webp);

            Image::make($file_path)
                ->encode('webp', 75)
                ->save($file_path_webp);

            Image::make($file_thumb_path)
                ->encode('webp', 75)
                ->save($file_thumb_path_webp);

            $model->update([
                'file' => $name,
                'file_webp' => $name_webp
            ]);
        } catch (\Exception $e) {
            // Clean up any partially created files
            $this->cleanupFiles([$file_path, $file_thumb_path, $file_path_webp, $file_thumb_path_webp]);
            throw new \Exception('Failed to process images: ' . $e->getMessage());
        }
    }

    private function ensureDirectoriesExist(array $paths): void
    {
        foreach ($paths as $path) {
            $fullPath = public_path($path);
            if (!File::isDirectory($fullPath)) {
                File::makeDirectory($fullPath, 0755, true);
            }
        }
    }

    private function cleanupFiles(array $paths): void
    {
        foreach ($paths as $path) {
            if (File::exists($path)) {
                File::delete($path);
            }
        }
    }
}
