<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'gallery_id',
        'name',
        'file',
        'file_webp',
        'gallery_item_hover_date',
        'file_alt'
    ];
}
