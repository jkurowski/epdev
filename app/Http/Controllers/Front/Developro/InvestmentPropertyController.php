<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Page;
use App\Models\Property;
use Illuminate\Http\Request;


class InvestmentPropertyController extends Controller
{
    private $pageId;

    public function __construct()
    {
        $this->pageId = 2;
    }
    // miasto/{citySlug}/i/{slug}/pietro/{floor}/m/{property}
    public function index($citySlug, $slug, Floor $floor, Property $property)
    {
        $property->timestamps = false;
        $property->increment('views');
        $page = Page::where('id', $this->pageId)->first();
        $similarProperties = Property::where('investment_id', $property->investment_id)->where('status', 1)->where('id', '!=', $property->id)->limit(3)->get();

        return view('front.developro.investment_property.index', [
            'floor' => $floor,
            'property' => $property,
            'investment' => $property->investment,
            'city' => $property->investment->city,
            'similarProperties' => $similarProperties,
            'page' => $page
        ]);
    }

    public function properties(Request $request)
    {



        $page = Page::where('id', $this->pageId)->first();

     
        $query = Property::query();

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

        $allProperties = $query->get();

        return view('front.developro.investment_property.properties', [
            'page' => $page,
            'allProperties' => $allProperties
        ]);
    }
}
