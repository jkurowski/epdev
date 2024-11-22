<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Client\ClientRepository;
use Illuminate\Http\Request;

class ContactFormsController extends Controller
{


    public function __construct(
        public  ClientRepository $clientRepository
    ) {}

    public function store(Request $request)
    {

        $validated = $request->validate([
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
        ]);
        $validated['is_external'] = false;
        $validated['ip'] = $request->ip();
        $validated['investment_id'] = $request->input('investment_id');
        $validated['investment_name'] = $request->input('investment_name');
        $validated['property_name'] = $request->input('property_name');
        $validated['page'] = url()->current();

        $this->clientRepository->createClient($validated);

        return redirect()->back()->with('success', 'Formularz został wysłany pomyślnie.');
    }
}
