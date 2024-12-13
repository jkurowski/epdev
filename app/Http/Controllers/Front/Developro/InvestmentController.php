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
        $investment = Investment::where('city_id', $city->id)->where('slug', $slug)->first();
        $page = Page::find($this->pageId);

        $query = Property::query();

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
        if ($request->has('apartments-floor') && $request->input('apartments-floor') !== 'null') {
            $query->whereHas('floor', function ($query) use ($request) {
                $query->where('number', $request->input('apartments-floor'));
            });
        }

        // Filter by rooms if provided
        if ($request->has('rooms')) {
            $query->where('rooms', $request->input('rooms'));
        }

        // Filter by area range if provided
        if ($request->has('area-min') && $request->has('area-max')) {
            $query->whereBetween('area', [$request->input('area-min'), $request->input('area-max')]);
        }

        $query->whereIn('status', [1, 2]);

        // Paginate the results
        $perPage = 9; // Number of items per page
        $allProperties = $query->paginate($perPage)->appends($request->query());

        return view('front.developro.investment.show', [
            'investment' => $investment,
            'properties' => $allProperties,
            'page' => $page
        ]);
    }
}
