<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentSections extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'investment_id',
        'category',
        'title',
        'subtitle',
        'text',
        'link',
        'link_button',
        'file',
        'file_webp',
        'active',
        'position'
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}











