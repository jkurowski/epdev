<?php

namespace App\View\Components;

use App\Models\City;
use App\Models\Property;
use Illuminate\View\Component;
use PhpOffice\PhpSpreadsheet\Chart\Properties;
use Illuminate\Support\Facades\DB;

class ApartmentSearchForm extends Component
{
    public $cities;
    public $rangeMin;
    public $rangeMax;
    public $levels;

    /**
     * Create a new component instance.
     *
     * @param array $cities - List of cities to select
     * @param int $rangeMin - Minimum range value for slider
     * @param int $rangeMax - Maximum range value for slider
     * @param int $levels - Number of apartment levels (checkboxes)
     */
    public function __construct($cities = [], $rangeMin = 35, $rangeMax = 95, $levels = 5)
    {
        $this->cities = $this->getCities();
        $this->rangeMin = $this->getRanges()[0];
        $this->rangeMax = $this->getRanges()[1];
        $this->levels = $this->getRoomsCount();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.apartment-search-form');
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
}
