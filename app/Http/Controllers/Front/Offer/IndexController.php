<?php

namespace App\Http\Controllers\Front\Offer;

use App\Helpers\EmailTemplatesJsonParser\WebTemplateParser;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\EmailTemplate;
use Carbon\Carbon;

//CMS
use App\Models\Offer;
use App\Models\Property;
use App\Repositories\Client\ClientRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private string $pageTemplateView = 'admin.web-generator.index';

    private ClientRepository $clientRepository;
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }
    public function show(Offer $offer)
    {


        if ($offer->status == 2) {
            throw new NotFoundHttpException(); // Throws a 404 exception
        }

        if ($offer->status != 3) {
            $offer->status = 3;
            $offer->readed_at = Carbon::now();
            $offer->save();
        }

        if ($offer->properties) {
            $propertyIds = json_decode($offer->properties);
            if ($propertyIds) {
                $selectedOffer = Property::whereIn('id', $propertyIds)->get();
            } else {
                $selectedOffer = collect();
            }
        } else {
            $selectedOffer = collect();
        }
        $entry = Client::make();

        //    check if offer has template
        if (!$offer->template_id) {
            return view('front.offer.show', compact('offer', 'selectedOffer', 'entry'));
        }

        $template = EmailTemplate::find($offer->template_id);
        $templateParser = new WebTemplateParser($template->content);
        $templateParser->prepareBlocks();
        $templateParser->prepeareOfferList(view('front.offer.property_list', ['properties' => $selectedOffer])->render());
        $html = $templateParser->render();
       
        return view($this->pageTemplateView, ['html' => $html, 'entry' => $entry, 'offer' => $offer]);
        // return view('front.offer.show', compact('offer', 'selectedOffer', 'html'));
    }

    public function store(Offer $offer, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'rule1' => ['nullable'],
            'rule2' => ['nullable'],
            'rule3' => ['nullable'],
        ]);

        $toInsert = $validated;
        $client = $this->clientRepository->createClient($toInsert);
        $this->setOfferClient($offer, $client);

        return redirect()->back()->with('success', 'Dziękujemy za rejestrację!');
    }

    private function setOfferClient(Offer $offer, Client $client)
    {
        $offer->client_id = $client->id;
        $offer->is_new_client = 0;
        $offer->save();
    }
}
