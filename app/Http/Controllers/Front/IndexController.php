<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

// CMS
use App\Models\Inline;
use App\Models\Investment;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    public function index()
    {
        $popup = 0;
        $investments = Investment::with('homepageImages')
            ->where('homepage', 1)
            ->get();
        $array = Inline::whereSlug('homepage')->get()->toArray();

        if(settings()->get("popup_status") == "1") {
            if(settings()->get("popup_mode") == "1") {
                Cookie::queue('popup', null);
                $popup = 1;
            } else {
                if(Cookie::get('popup') == null){
                    $popup = 1;
                    Cookie::queue('popup', true);
                }
            }
        } else {
            Cookie::queue('popup', null);
        }

        return view('pages.homepage', ['popup' => $popup, 'investments' => $investments, 'array' => $array]);
    }
}
