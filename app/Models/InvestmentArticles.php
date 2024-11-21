<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class InvestmentArticles extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'investment_id',
        'title',
        'gallery_id',
        'subtitle',
        'date',
        'content',
        'content_entry',
        'meta_title',
        'meta_description',
        'meta_robots',
        'active',
        'file',
        'file_webp'
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }

    public function gallery()
    {
        return $this->hasOne(Gallery::class, 'id', 'gallery_id');
    }
}
