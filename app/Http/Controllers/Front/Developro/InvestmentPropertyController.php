<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Page;
use App\Models\Property;

class InvestmentPropertyController extends Controller
{
    private $pageId;

    public function __construct()
    {
        $this->pageId = 2;
    }

    public function index($slug, Floor $floor, Property $property)
    {
        $property->timestamps = false;
        $property->increment('views');
        $page = Page::where('id', $this->pageId)->first();

        return view('front.developro.investment_property.index', [
            'floor' => $floor,
            'property' => $property
        ]);
    }
}
