<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\VoxContactMail;
use App\Models\RodoRules;
use App\Repositories\Client\ClientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormsController extends Controller
{


    public function __construct(
        public  ClientRepository $clientRepository
    ) {}

    public function store(Request $request)
    {
      

        $validated = $request->validate([
            'investment_name' => 'sometimes|string|max:255',
            'property_name' => 'sometimes|string|max:255',
            'investment_id' => 'sometimes|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'city' => 'sometimes|string|max:255',
            'area-min' => 'sometimes|integer',
            'area-max' => 'sometimes|integer',
            'message' => 'sometimes|string',
            'rule_1' => 'integer',
            'rule_2' => 'integer',
            'rule_3' => 'integer',
            'rule_5' => 'integer',
        ]);

        $validated['is_external'] = false;
        $validated['ip'] = $request->ip();
        $validated['investment_id'] = $request->input('investment_id');
        $validated['investment_name'] = $request->input('investment_name');
        $validated['property_name'] = $request->input('property_name');
        $validated['page'] = url()->current();

        $this->clientRepository->createClient($validated);
        $this->sendToVox($validated);

        return redirect()->back()->with('success', 'Formularz został wysłany pomyślnie.');
    }

    private function sendToVox(array $validated)
    {
        $voxContactMail = new VoxContactMail($this->mapDataToVoxEmailView($validated));
        Mail::to(env('VOX_MAIL'))->send($voxContactMail);
    }

    private function mapDataToVoxEmailView(array $validated)
    {
        // "investment_id" => "10" - optional
        // "investment_name" => "Jarzębinowa II" - optional
        // "_token" => "WVIMdAbsHkCq7wCgPVNrSvv94gdpQf7imFp6NJJG"
        // "name" => "Miłosz Branewicz"
        // "email" => "test@example.com"
        // "phone" => "605908196"
        // "city" => "Warszawa"
        // "area-min" => "32"
        // "area-max" => "58"
        // "message" => "Test"
        // "rule_1" => "1"
        // "rule_2" => "1"
        // "rule_3" => "1"
        // "rule_5" => "1"
        $schema = [
            "investment_name" => $validated['investment_name'] ?? null,
            "name" => $validated['name'] ?? null,
            "email" => $validated['email'] ?? null,
            "phone" => $validated['phone'] ?? null,
            "message" => $validated['message'] ?? null,
            "agreements" => []
        ];


        $schema['agreements'] = $this->getAgreements($validated);
        return $schema;
    }

    private function getAgreements(array $validated)
    {


        $rules = [];
        if ($validated['rule_1']) {
            $rule = RodoRules::find($validated['rule_1']);
            $rules[] = [
                'title' => $rule->title,
                'description' => $rule->text,
            ];
        }
        if ($validated['rule_2']) {
            $rule = RodoRules::find($validated['rule_2']);
            $rules[] = [
                'title' => $rule->title,
                'description' => $rule->text,
            ];
        }
        if ($validated['rule_3']) {
            $rule = RodoRules::find($validated['rule_3']);
            $rules[] = [
                'title' => $rule->title,
                'description' => $rule->text,
            ];
        }
        return $rules;
    }
}
