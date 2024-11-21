<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'active',
        'sort'
    ];

   
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($city) {
            $city->slug = \Illuminate\Support\Str::slug($city->name);
        });
    }
}
