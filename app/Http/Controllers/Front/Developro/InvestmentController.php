<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Investment;
use Illuminate\Http\Request;

// CMS
use App\Models\Page;
use App\Repositories\InvestmentRepository;

class InvestmentController extends Controller
{
    private InvestmentRepository $repository;
    private int $pageId;

    public function __construct(InvestmentRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 4;
    }

    public function show(string $citySlug, string $slug)
    {
        $city = City::where('slug', $citySlug)->first();
        $investment = Investment::where('city_id', $city->id)->where('slug', $slug)->with(['properties', 'properties.floor'])->first();
        $page = Page::find($this->pageId);

        return view('front.developro.investment.show', [
            'investment' => $investment,
            'page' => $page
        ]);
    }
}
