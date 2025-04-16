<?php

namespace App\View\Components;

use App\Models\City;
use App\Models\Investment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCitiesNormal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public array $cities = [])
    {
        $this->cities = $this->getCities();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-cities-normal');
    }

    private function getCities(): array
    {
        $cities = City::where('active', 1)->select('name')->distinct()->get()->pluck('name', 'name');
        return $cities->toArray();
    }
}
