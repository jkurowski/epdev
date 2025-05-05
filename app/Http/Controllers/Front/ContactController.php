<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\Inline;
use Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

//CMS
use App\Mail\ChatSend;
use App\Models\Page;
use App\Models\Property;
use App\Models\RodoRules;
use App\Notifications\PropertyNotification;
use App\Repositories\Client\ClientRepository;

class ContactController extends Controller
{

    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    function index()
    {
        $page = Page::where('id', 3)->first();
        return view('front.contact.index', [
            'rules' => RodoRules::orderBy('sort')->whereActive(1)->get(),
            'page' => $page
        ]);
    }

    function send(ContactFormRequest $request)
    {
        try {
            $client = $this->repository->createClient($request);
            Mail::to(settings()->get("page_email"))->send(new ChatSend($request, $client));

            if( count(Mail::failures()) == 0 ) {
                $cookie_name = 'dp_';
                foreach ($_COOKIE as $name => $value) {
                    if (stripos($name, $cookie_name) === 0) {
                        Cookie::queue(
                            Cookie::forget($name)
                        );
                    }
                }
            }
        } catch (\Throwable $exception) {

        }

        return redirect()->route('front.contact')->with(
            'success',
            'Twoja wiadomość została wysłana. W najbliższym czasie skontaktujemy się z Państwem celem omówienia szczegółów!'
        );
    }

    function fast(ContactFormRequest $request)
    {
        try {
            $client = $this->repository->createClient($request);
            Mail::to(settings()->get("page_email"))->send(new ChatSend($request, $client));

            if( count(Mail::failures()) == 0 ) {
                $cookie_name = 'dp_';
                foreach ($_COOKIE as $name => $value) {
                    if (stripos($name, $cookie_name) === 0) {
                        Cookie::queue(
                            Cookie::forget($name)
                        );
                    }
                }
            }
        } catch (\Throwable $exception) {

        }

        return redirect()->route('front.contact')->with(
            'success',
            'Twoja wiadomość została wysłana. W najbliższym czasie skontaktujemy się z Państwem celem omówienia szczegółów!'
        );
    }

    function property(ContactFormRequest $request, $id)
    {
        try {
            $property = Property::find($id);
            $client = $this->repository->createClient($request, $property);
            $property->notify(new PropertyNotification($request, $property));
            Mail::to(settings()->get("page_email"))->send(new ChatSend($request, $client, $property));

            if( count(Mail::failures()) == 0 ) {
                $cookie_name = 'dp_';
                foreach ($_COOKIE as $name => $value) {
                    if (stripos($name, $cookie_name) === 0) {
                        Cookie::queue(
                            Cookie::forget($name)
                        );
                    }
                }
            }
        } catch (\Throwable $exception) {

        }

        return redirect()->back()->with(
            'success',
            'Twoja wiadomość została wysłana. W najbliższym czasie skontaktujemy się z Państwem celem omówienia szczegółów!'
        );
    }

    public function showToken() {
        echo csrf_token();
    }
}
