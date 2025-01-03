<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RodoRules extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title',
        'title_vox',
        'text',
        'required',
        'time',
        'active',
        'sort'
    ];
}
