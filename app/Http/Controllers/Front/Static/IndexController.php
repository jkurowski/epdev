<?php

namespace App\Http\Controllers\Front\Static;

use App\Http\Controllers\Controller;
use App\Models\Inline;
use App\Models\Investment;
use App\Models\Page;
use App\Repositories\Client\ClientRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }
    public function privacypolicy()
    {
        $page = Page::find(5);
        return view('pages.privacy-policy', compact('page'));
    }
    public function office()
    {
        $array = Inline::whereSlug('kontakt')->get()->toArray();
        $page = Page::find(3);
        return view('pages.contact-office', compact('page', 'array'));
    }
    public function sales()
    {
        $array = Inline::whereSlug('obsluga')->get()->toArray();
        $page = Page::find(7);
        return view('pages.contact-after-sales', compact('page', 'array'));
    }

    public function testPage()
    {
        $investment = Investment::find(1);
        return view('test-page', compact('investment'));
    }

    public function about()
    {
        $array = Inline::whereSlug('about')->get()->toArray();
        $completed = Investment::where('status', 2)->get();
        $page = Page::find(6);
        return view('pages.about-ep-development', compact('completed', 'page', 'array'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'investment_id' => 'nullable|exists:investments,id',
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'nullable|string',
            ]);

            $investmentName = Investment::find($request->investment_id)->name;

            $client = $this->clientRepository->createClient(
                [
                    'name' => $request->name,
                    'lastname' => $request->surname,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'message' => $request->message,
                    'ip' => $request->ip(),
                    'investment_id' => $request->investment_id,
                    'investment_name' => $investmentName,
                ],null, 1, 'iframe'
            );
        } catch (\Throwable $exception) {
        }
        return redirect()->back()->with('success', 'Wiadomość została wysłana. Dziękujemy za kontakt!');
    }
}
