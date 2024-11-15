<?php

namespace App\Http\Controllers\Admin\Crm\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\PropertyPayment;
use App\Repositories\ArticleRepository;
use App\Repositories\PropertyPaymentRepository;
use App\Services\ArticleService;
use Illuminate\Http\Request;

// CMS
use App\Models\Property;
use App\Models\Client;

class PaymentController extends Controller
{
    private PropertyPaymentRepository $repository;

    public function __construct(PropertyPaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Client $client)
    {
        $c = Client::with(['properties.payments' => function ($query) {
            $query->latest()->first();
        }])->findOrFail($client->id);

        foreach ($c->properties as $property) {
            $property->latestPayment = $property->nextPaymentAfterToday();
        }

        return view('admin.crm.client.payments.index', [
            'client' => $c
        ]);
    }

    public function create(Property $property)
    {
        return view('admin.crm.client.payments.modal', ['property_id' => $property->id])->with('payment', PropertyPayment::make());
    }

    public function store(PaymentRequest $request)
    {
        $validatedData = $request->validated();

        if (request()->ajax()) {
            $this->repository->create($validatedData);
            return response()->json(['success' => true]);
        }

        return response('This endpoint only supports AJAX requests.', 400);
    }

    public function show(Client $client, Property $property)
    {
        $latestPayment = null;
        if ($property) {
            $latestPayment = $property->payments()->latest()->first();
        }

        return view('admin.crm.client.payments.show', [
            'client' => $client,
            'property' => $property,
            'backButton' => route('admin.crm.clients.payments', $client),
            'latestPayment' => $latestPayment
        ]);
    }

    public function generatePayments(Client $client, Property $property)
    {
        $investmentPayments = $property->investmentPayments;
        $propertyPrice = $property->price;

        foreach ($investmentPayments as $investmentPayment) {
            $amount = ($investmentPayment->amount / 100) * $propertyPrice;

            PropertyPayment::create([
                'property_id' => $property->id,
                'percent' => $investmentPayment->amount,
                'amount' => $amount,
                'due_date' => $investmentPayment->due_date,
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function edit(PropertyPayment $payment)
    {
        return view('admin.crm.client.payments.modal', ['payment' => $payment, 'property_id' => $payment->property_id]);
    }

    public function update(PaymentRequest $request, PropertyPayment $payment)
    {
        if (request()->ajax()) {
            $this->repository->update($request->validated(), $payment);
            return response()->json(['success' => true]);
        }

        return response('This endpoint only supports AJAX requests.', 400);
    }

    public function generateTable(Client $client, Property $property)
    {
        $html = view('admin.crm.client.payments.table', ['property' => $property])->render();
        $nextPayment = $property->nextPaymentAfterToday();

        $additionalData = [
            'latestPayment' => $nextPayment->due_date,
            'latestAmount' => number_format($nextPayment->amount, 2, '.', ' ').' zł',
        ];

        return response()->json([
            'html' => $html,
            'data' => $additionalData
        ]);
    }

    public function destroy(PropertyPayment $payment)
    {
        $payment->delete();
        return response()->json(['success' => 'Payment deleted successfully.']);
    }
}
