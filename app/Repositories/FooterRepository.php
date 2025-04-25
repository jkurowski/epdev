<?php namespace App\Repositories;

use App\Models\Footer;

class FooterRepository extends BaseRepository
{
    protected $model;

    public function __construct(Footer $model)
    {
        parent::__construct($model);
    }
}
