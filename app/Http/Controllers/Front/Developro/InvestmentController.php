<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Investment;
use App\Models\Property;
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

    public function show(Request $request, string $citySlug, string $slug)
    {
        $city = City::where('slug', $citySlug)->first();
        $investment = Investment::where('city_id', $city->id)->where('slug', $slug)->with('sections')->first();
        $page = Page::find($this->pageId);

        $query = Property::query();

        //apartments-floor=3&rooms=3&area-min=27&area-max=65#mieszkania

        $query->where('investment_id', $investment->id);

        // Filter properties where the associated investment status is 1
        $query->whereHas('investment', function ($query) {
            $query->where('status', 1);
        });

        if ($request->has('apartments-city') && $request->input('apartments-city') !== 'null') {
            $query->whereHas('investment.city', function (\Illuminate\Database\Eloquent\Builder $query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('apartments-city') . '%');
            });
        }

        // Filter by floor if provided
        if ($request->has('apartments-floor') && (string) $request->input('apartments-floor') !== '') {
            $query->where('floor_id', $request->input('apartments-floor'));
        }

        // Filter by rooms if provided
        if ($request->has('rooms')) {
            $query->where('rooms', $request->input('rooms'));
        }

        // Filter by area range if provided
        if ($request->has('area-min') && $request->has('area-max')) {
            $query->whereBetween('area_search', [$request->input('area-min'), $request->input('area-max')]);
        }

        $query->whereIn('status', [1, 2]);

        // Paginate the results
        $perPage = 9; // Number of items per page
        $allProperties = $query->paginate($perPage)->appends($request->query());

        $progressData = collect([]);

        if (!is_null($investment->progress)) {
            $lines = explode("\n", $investment->progress);

            $progressData = collect($lines)->map(function ($line) {
                $parts = explode(';', $line);
                return [
                    'number' => $parts[0],
                    'date' => $parts[1] ?: '',
                    'title' => $parts[2],
                    'highlight' => isset($parts[3]) && $parts[3] == '1',
                ];
            });
        }

        $staticFloors = [0 => 'Parter'];
        $dynamicFloors = explode(',', $investment->floor_range);
        $floors = array_merge($staticFloors, $dynamicFloors);

        return view('front.developro.investment.show', [
            'investment' => $investment,
            'properties' => $allProperties,
            'page' => $page,
            'progressData' => $progressData,
            'floors' => $floors
        ]);
    }
}
