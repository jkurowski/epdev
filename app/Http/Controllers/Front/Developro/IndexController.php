<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
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

    public function index(Request $request)
    {
        $page = Page::find($this->pageId);
        $investments = $this->investmentRepository->search($request->all());

        return view('front.developro.investment.index', [
            'list' => $investments,
            'page' => $page
        ]);
    }

    public function investmentsDone()
    {
        return view('pages.completed-investments', [
            'list' => $this->mapInvestmentsToView($this->getInvestmentsDone())
        ]);
    }

    public function investmentsPlanned()
    {
        return view('pages.planned-investments', [
            'list' => $this->mapInvestmentsToView($this->getInvestmentsPlanned())
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
