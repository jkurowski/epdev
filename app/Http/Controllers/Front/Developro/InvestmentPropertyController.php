<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Floor;
use App\Models\Investment;
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
        $citySlug = $request->input('apartments-city');
        $investmentSlug = $request->input('apartments-invest');

        if ($citySlug && $investmentSlug) {
            // Prepare the query parameters to include all except 'apartments-city' and 'apartments-invest'
            $queryParams = $request->except(['apartments-city', 'apartments-invest']);

            // Build the query string
            $queryString = http_build_query($queryParams);

            // Construct the redirect URL with query parameters
            $redirectUrl = route('front.developro.show', ['citySlug' => $citySlug, 'slug' => $investmentSlug]);

            // Append the query string to the URL
            if (!empty($queryString)) {
                $redirectUrl .= '?' . $queryString;
            }

            // Redirect to the investment show page with the additional query parameters
            return redirect()->to($redirectUrl.'#mieszkania');
        }

        if (!$citySlug && $investmentSlug) {
            // Prepare the query parameters to include all except 'apartments-city' and 'apartments-invest'
            $queryParams = $request->except(['apartments-city', 'apartments-invest']);

            // Build the query string
            $queryString = http_build_query($queryParams);
            $investment = Investment::where('slug', '=', $investmentSlug)->first();
            $city = City::find($investment->city_id);

            // Construct the redirect URL with query parameters
            $redirectUrl = route('front.developro.show', ['citySlug' => $city->slug, 'slug' => $investmentSlug]);

            // Append the query string to the URL
            if (!empty($queryString)) {
                $redirectUrl .= '?' . $queryString;
            }

            // Redirect to the investment show page with the additional query parameters
            return redirect()->to($redirectUrl.'#mieszkania');
        }

        $page = Page::where('id', $this->pageId)->first();
        $query = Property::query();

        // Filter properties where the associated investment status is 1
        $query->whereHas('investment', function ($query) {
            $query->where('status', 1);
        });

        if ($citySlug) {
            $query->whereHas('investment.city', function ($query) use ($citySlug) {
                $query->where('slug', $citySlug); // City slug matches the selected city
            });
        }

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
            $query->whereBetween('area', [$request->input('area-min'), $request->input('area-max')]);
        }

        $query->whereIn('status', [1, 2]);

        // Paginate the results
        $perPage = 9; // Number of items per page
        $allProperties = $query->paginate($perPage)->appends($request->query());

        return view('front.developro.investment_property.properties', [
            'page' => $page,
            'allProperties' => $allProperties
        ]);
    }
}
