<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Floor;
use App\Models\Property;
use App\Repositories\InvestmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertiesController extends Controller
{
    protected $investmentRepository;
    public function __construct(InvestmentRepository $investmentRepository)
    {
        $this->investmentRepository = $investmentRepository;
    }
    public function index(Request $request)
    {
        $properties = $this->investmentRepository->search($request->all());
        return view('pages.properties', [
            'cities' => $this->getCities(),
            'rooms' => $this->getRoomsCount(),
            'rangeMin' => $this->getRanges()[0],
            'rangeMax' => $this->getRanges()[1],
            'floors' => $this->getFloors(),
            'properties' => $properties
        ]);
    }

    private function getCities(): array
    {
        $cities = City::select('name')->distinct()->get()->pluck('name', 'name');
        return $cities->toArray();
    }

    private function getRoomsCount(): int
    {
        $roomsCount = Property::max('rooms') ?? 5;
        return $roomsCount;
    }
    private function getRanges(): array
    {
        // Convert varchar area to float and filter out non-numeric values
        $minRange = Property::whereRaw('CAST(REPLACE(REPLACE(area, " ", ""), ",", ".") AS DECIMAL(10,2)) > 0')
            ->min(DB::raw('CAST(REPLACE(REPLACE(area, " ", ""), ",", ".") AS DECIMAL(10,2))')) ?? 35;
        
        $maxRange = Property::whereRaw('CAST(REPLACE(REPLACE(area, " ", ""), ",", ".") AS DECIMAL(10,2)) > 0')
            ->max(DB::raw('CAST(REPLACE(REPLACE(area, " ", ""), ",", ".") AS DECIMAL(10,2))')) ?? 95;

        return [intval($minRange), intval($maxRange)];
    }

    private function getFloors(): array
    {
  
        $floors = Floor::select('number')->distinct()->get()->pluck('name', 'number');
        return $floors->toArray();
    }
}
