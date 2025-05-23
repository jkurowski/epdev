<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ChatSend;
use App\Mail\VoxContactMail;
use App\Models\RodoRules;
use App\Repositories\Client\ClientRepository;
use App\Rules\ReCaptchaV3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            'g-recaptcha-response' => ['required', new ReCaptchaV3()]
        ]);

        $validated['is_external'] = false;
        $validated['ip'] = $request->ip();
        $validated['investment_id'] = $request->input('investment_id');
        $validated['investment_name'] = $request->input('investment_name');
        $validated['property_name'] = $request->input('property_name');
        $validated['page'] = url()->current();

        $client = $this->clientRepository->createClient($validated);
        $this->sendToVox($validated);

        $email = settings()->get("page_email");

        if (!is_array($email)) {
            $email = json_decode($email, true); // Decode JSON string if not already an array
        }

        if (is_array($email)) {
            foreach ($email as $entry) {
                if (isset($entry['value'])) {
                    $emailAddresses[] = $entry['value'];
                }
            }
            Mail::to($emailAddresses)->send(new ChatSend($request, $client));
        }

        return redirect()->back()->with('success', 'Formularz został wysłany pomyślnie.');
    }

    public function modal(Request $request)
    {
        // Custom validation messages
        $messages = [
            'investment_name.max' => 'The investment name cannot exceed 255 characters.',
            'property_name.max' => 'The property name cannot exceed 255 characters.',
            'name.required' => 'Pole <b>Imię i nazwisko</b> jest wymagane',
            'name.max' => 'The name cannot exceed 255 characters.',
            'email.required' => 'Pole <b>Adres e-mail</b> jest wymagane',
            'email.email' => 'Zły adres w polu <b>Adres e-mail</b>',
            'phone.required' => 'Pole <b>Telefon</b> jest wymagane',
            'phone.string' => 'Pole <b>Telefon</b> jest wymagane',
            'phone.max' => 'The phone number cannot exceed 255 characters.',
            'message.sometimes' => 'The message field is optional.',
            'message.string' => 'Pole <b>Wiadomość</b> jest wymagane',
        ];

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
            'g-recaptcha-response' => ['required', new ReCaptchaV3()]
        ], $messages);

        $validated['is_external'] = false;
        $validated['ip'] = $request->ip();
        $validated['investment_id'] = $request->input('investment_id');
        $validated['investment_name'] = $request->input('investment_name');
        $validated['property_name'] = $request->input('property_name');
        $validated['page'] = url()->current();

        $client = $this->clientRepository->createClient($validated);
        $this->sendToVox($validated);

        $email = settings()->get("page_email");
        Log::info('Email addresses from settings:', ['email' => $email]);

        if (!is_array($email)) {
            $email = json_decode($email, true); // Decode JSON string if not already an array
        }

        if (is_array($email)) {
            $emailAddresses = [];
            foreach ($email as $entry) {
                if (isset($entry['value'])) {
                    $emailAddresses[] = $entry['value'];
                }
            }
            Log::info('Email addresses to send to:', ['emailAddresses' => $emailAddresses]);
            Mail::to($emailAddresses)->send(new ChatSend($request, $client));
        }

        return response()->json([
            'success' => true,
            'message' => 'Formularz został wysłany pomyślnie.'
        ]);
    }

    private function sendToVox(array $validated)
    {
        $recipient = env('VOX_MAIL');
        Log::info('sendToVox called');

        $emailData = $this->mapDataToVoxEmailView($validated);
        Log::info('Mapped Email Data');

        if (empty($emailData)) {
            Log::error('Email data is empty! Not sending email.');
            return;
        }

        $voxContactMail = new VoxContactMail($emailData);
        Mail::to($recipient)->send($voxContactMail);
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
            "area_from" => $validated['area-min'] ?? null,
            "area_to" => $validated['area-max'] ?? null,
            "city" => $validated['city'] ?? null,
            "message" => $validated['message'] ?? null,
            "agreements" => []
        ];


        $schema['agreements'] = $this->getAgreements($validated);
        return $schema;
    }

    private function getAgreements(array $validated)
    {
        $rules = [];

        // Check if rule_1 exists in the validated array
        if (isset($validated['rule_1']) && $validated['rule_1']) {
            $rule = RodoRules::find(1);
            if ($rule) {
                $rules[] = [
                    'title' => $rule->title_vox,
                    'description' => strip_tags($rule->text),
                ];
            }
        }

        // Check if rule_2 exists in the validated array
        if (isset($validated['rule_2']) && $validated['rule_2']) {
            $rule = RodoRules::find(2);
            if ($rule) {
                $rules[] = [
                    'title' => $rule->title_vox,
                    'description' => strip_tags($rule->text),
                ];
            }
        }

        // Check if rule_3 exists in the validated array
        if (isset($validated['rule_3']) && $validated['rule_3']) {
            $rule = RodoRules::find(3);
            if ($rule) {
                $rules[] = [
                    'title' => $rule->title_vox,
                    'description' => strip_tags($rule->text),
                ];
            }
        }
        return $rules;
    }
}
