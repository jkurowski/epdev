<?php

namespace App\Observers;

use Illuminate\Support\Facades\File;

// CMS
use App\Models\PropertiesHistory;
use App\Models\Property;

class PropertyObserver
{
    /**
     * Handle the Property "deleted" event.
     *
     * @param Property $property
     * @return void
     */
    public function deleted(Property $property)
    {
        if (File::isFile(public_path('investment/property/' . $property->file))) {
            File::delete(public_path('investment/property/' . $property->file));
        }
        if (File::isFile(public_path('investment/property/thumbs/' . $property->file))) {
            File::delete(public_path('investment/property/thumbs/' . $property->file));
        }
        if (File::isFile(public_path('investment/property/list/' . $property->file))) {
            File::delete(public_path('investment/property/list/' . $property->file));
        }
        if (File::isFile(public_path('investment/property/webp/' . $property->file_webp))) {
            File::delete(public_path('investment/property/webp/' . $property->file_webp));
        }
        if (File::isFile(public_path('investment/property/thumbs/webp/' . $property->file_webp))) {
            File::delete(public_path('investment/property/thumbs/webp/' . $property->file_webp));
        }
        if (File::isFile(public_path('investment/property/list/webp/' . $property->file_webp))) {
            File::delete(public_path('investment/property/list/webp/' . $property->file_webp));
        }
        if (File::isFile(public_path('investment/property/pdf/' . $property->file_pdf))) {
            File::delete(public_path('investment/property/pdf/' . $property->file_pdf));
        }
    }

    /**
     * Handle the Property "updated" event.
     *
     * @param Property $property
     * @return void
     */
    public function updated(Property $property)
    {
        if ($property->isDirty('status')) {
            $newStatus = $property->status;
            $previousStatus = $property->getOriginal('status');

            // Handle status change actions
            if ($previousStatus == 2 && $newStatus == 1) {
                // If status changed from 2 (reservation) to 1 (for sale)
                $property->reservation_until = null;
                $property->client_id = null;
            }

            if ($previousStatus == 3 && $newStatus == 1) {
                // If status changed from 3 (sold) to 1 (for sale)
                $property->saled_at = null;
                $property->client_id = null;
            }

            if ($previousStatus == 3 && $newStatus == 2) {
                // If status changed from 3 (sold) to 2 (reservation)
                $property->saled_at = null;
            }

            if ($previousStatus == 2 && $newStatus == 3) {
                // If status changed from 2 (reservation) to 3 (sold)
                $property->reservation_until = null;
            }

            // Save property status change history
            PropertiesHistory::create([
                'property_id' => $property->id,
                'previous_status' => $previousStatus,
                'new_status' => $newStatus,
                'created_at' => now(),
                'user_id' => auth()->id(),
                'client_id' => $property->client_id
            ]);
        }

        if ($property->isDirty('client_id')) {
            if ($property->isDirty('status')) {
                $latestHistory = PropertiesHistory::where('property_id', $property->id)->latest()->first();
                if ($latestHistory) {
                    $latestHistory->client_id = $property->client_id;
                    $latestHistory->save();
                }
            }
            else {
                $latestHistory = PropertiesHistory::where('property_id', $property->id)->latest()->first();
                if ($latestHistory) {
                    $newHistory = $latestHistory->replicate();
                    $newHistory->previous_status = $latestHistory->new_status;
                    $newHistory->client_id = $property->client_id;
                    $newHistory->created_at = now();
                    $newHistory->save();
                }
            }
        }
    }
}
