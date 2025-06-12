<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Investment;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Repositories\InvestmentRepository;
use App\Models\Property;
use PhpOffice\PhpSpreadsheet\Chart\Properties;

class IndexController extends Controller
{
    private int $pageId;
    private InvestmentRepository $investmentRepository;

    public function __construct(InvestmentRepository $investmentRepository)
    {
        $this->pageId = 4;
        $this->investmentRepository = $investmentRepository;
    }

    public function index(Request $request, string $citySlug)
    {
        $city = City::where('slug', $citySlug)->first();

        $page = Page::find($this->pageId);
        $investments = Investment::where('city_id', $city->id)->where('status', '1')->get();

        return view('front.developro.investment.index', [
            'list' => $investments,
            'page' => $page,
            'city' => $city
        ]);
    }

    public function investmentsDone()
    {
        $page = Page::find(9);

        return view('pages.completed-investments', [
            'list' => $this->mapInvestmentsToView($this->getInvestmentsDone()),
            'page' => $page
        ]);
    }

    public function investmentsPlanned()
    {
        $page = Page::find(10);

        return view('pages.planned-investments', [
            'list' => $this->mapInvestmentsToView($this->getInvestmentsPlanned()),
            'page' => $page
        ]);
    }

    private function getInvestmentsDone(): array
    {
        return Investment::where('status', '2')
            ->with('city')
            ->get()
            ->groupBy('city.name')->toArray();
    }

    private function getInvestmentsPlanned()
    {
        return Investment::where('status', '3')->with('city')->get()->groupBy('city.name')->toArray();
    }

    private function mapInvestmentsToView(array $groupedInvestments): array
    {
        return collect($groupedInvestments)
            ->map(function ($investments, $cityName) {
                return [
                    'id' => strtolower(str_replace(' ', '-', $cityName)),
                    'label' => $cityName,
                    'investments' => array_values($investments)
                ];
            })
            ->values()
            ->toArray();
    }

    private function getPropertiesForSale()
    {
        return Property::where('status', '1')->get();
    }

    public function currentlyForSale()
    {
        return view('pages.currently-for-sale', [
            'properties' => $this->getPropertiesForSale()
        ]);
    }
    
}
