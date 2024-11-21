<?php

namespace App\Http\Controllers\Admin\Developro\Investment;

use App\Helpers\TemplateTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\InvestmentFormRequest;
use App\Models\City;
use App\Models\EmailTemplate;
use App\Models\Gallery;
use App\Models\Investment;
use App\Models\InvestmentTemplates;
use App\Models\User;
use App\Notifications\SupervisorNotification;
use App\Repositories\InvestmentRepository;
use App\Services\InvestmentService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// CMS

class IndexController extends Controller
{
    private $repository;
    private $service;

    public function __construct(InvestmentRepository $repository, InvestmentService $service)
    {
        //        $this->middleware('permission:investment-list|investment-create|investment-edit|investment-delete', [
        //            'only' => ['index','store']
        //        ]);
        //        $this->middleware('permission:investment-create', [
        //            'only' => ['create','store']
        //        ]);
        //        $this->middleware('permission:investment-edit', [
        //            'only' => ['edit','update']
        //        ]);
        //        $this->middleware('permission:investment-delete', [
        //            'only' => ['destroy']
        //        ]);

        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        $user = Auth::user();
        $investments = $this->repository->allSortBy('status', 'ASC');
        $role = Role::find(13);

        if ($user && $user->hasRole($role)) {
            $filteredInvestments = $investments;
        } else {
            $filteredInvestments = $investments->filter(function ($investment) use ($user) {
                $permissionName = 'view-investment-' . $investment->id;
                return $user->hasPermissionTo($permissionName);
            });
        }

        return view('admin.developro.investment.index', ['list' => $filteredInvestments]);
    }

    public function create()
    {
        // template_type = 20 => template oferty
        $templates = EmailTemplate::where('user_id', auth()->id())->where('meta', 'LIKE', '%"template_type":"' . TemplateTypes::OFFER . '"%')->get()->pluck('name', 'id')->toArray();
        $emptyInvestment = Investment::make();
        $investmentTemplates = InvestmentTemplates::make();
        $investmentTemplates->investment()->associate($emptyInvestment);

        $templatesForOffer = $this->getEmailTemplates(TemplateTypes::OFFER);
        $templatesForEmail = $this->getEmailTemplates(TemplateTypes::EMAIL);
        $cities = $this->prepareCitiesForSelect(City::all());


        return view('admin.developro.investment.form', [
            'users' => [],
            'selected' => ['' => 'Brak'],
            'cardTitle' => 'Dodaj inwestycje',
            'backButton' => route('admin.developro.investment.index'),
            'selectedOfferTemplate' => null,
            'investmentTemplates' => $investmentTemplates,
            'offerTemplates' => ['' => 'Brak'] + $templatesForOffer,
            'emailTemplates' => ['' => 'Brak'] + $templatesForEmail,
            'cities' => $cities,
            'galleries' => $this->getGalleryList()
        ])->with('entry', $emptyInvestment);
    }
    private function getGalleryList()
    {
        $galleries = Gallery::all();
        return $galleries->pluck('name', 'id')->prepend('Wybierz galerię', '');
    }

    public function store(InvestmentFormRequest $request)
    {

        $investment = $this->repository->create($request->validated());

        $validatedData = $request->validated();

        if (array_key_exists('investmentTemplates', $validatedData)) {
            $investmentTemplates = InvestmentTemplates::make($validatedData['investmentTemplates']);
            $investmentTemplates->investment()->associate($investment);
            $investmentTemplates->save();
        }

        if ($request->hasFile('file')) {
            $this->service->uploadThumb($request->name, $request->file('file'), $investment);
        }

        $this->repository->createPermissionName($investment->id);

        return redirect(route('admin.developro.investment.index'))->with('success', 'Inwestycja zapisana');
    }

    public function edit(int $id)
    {
        $role = Role::find(12);
        if ($role) {
            $users = User::role($role->name)->get()->pluck('name', 'id');
        } else {
            $users = collect(); // Empty collection if the role is not found
        }


        $templatesForOffer = $this->getEmailTemplates(TemplateTypes::OFFER);
        $templatesForEmail = $this->getEmailTemplates(TemplateTypes::EMAIL);
        $offer = $this->repository->find($id);
        $cities = $this->prepareCitiesForSelect(City::all());

        return view('admin.developro.investment.form', [
            'entry' => $offer,
            'cardTitle' => 'Edytuj inwestycję',
            'backButton' => route('admin.developro.investment.index'),
            'users' => $users,
            'selected' => [],
            'offerTemplates' => ['' => 'Brak'] + $templatesForOffer,
            'emailTemplates' => ['' => 'Brak'] + $templatesForEmail,
            'investmentTemplates' => $offer->investmentTemplates()->first(),
            'selectedOfferTemplate' => $offer->template_id,
            'cities' => $cities,
            'galleries' => $this->getGalleryList()
        ]);
    }

    private function prepareCitiesForSelect(Collection $cities){
        $citiesArray = [
            '' => 'Brak'
        ];
        foreach($cities as $city){
            $citiesArray[$city->id] = $city->name;
        }
        return $citiesArray;
    }

    public function templates(int $id)
    {
        $templates = [
            'template_send_thanks' => 'Email - Podziękowanie za wysłanie formularza',
            'template_offer_mail' => 'Email - Z ofertą',
            'template_offer_reminder' => 'Email - Przypomnienie o przesłanej ofercie',
            'template_open_day' => 'Email - Zaproszenie na dzień otwarty',
            'template_preliminary_agreement' => 'Email - Zaproszenie na podpisanie umowy przedwstępnej',
            'template_local_review' => 'Email - Zaproszenie na przegląd lokalu',
            'template_local_pickup' => 'Email - Zaproszenie na odbiór lokalu',
            'template_transfer_of_ownership' => 'Email - Zaproszenie na podpisanie umowy przeniesienia własności',
            'template_tenant_changes' => 'Email - Informacja o zmianach lokatorskich',
            'template_documents_for_credit' => 'Email - Informacja o dokumentach potrzebnych do uzyskania kredytu',
            'template_invoices' => 'Email - Faktury i rozliczenia',
            'template_documents' => 'Email - Przesyłane dokumenty np po odbiorze, umowie',
            'template_special_offers' => 'Email - Oferty specjalne',
            'template_meeting_invitation' => 'Email - Zaproszenie na spotkanie',
            'template_meeting_reminder' => 'Email - Przypominajka o spotkaniu',
            'template_offer_expiration' => 'Email - Wygaśnięcie oferty',
        ];

        $emailTemplates = [0 => 'Brak'] + $this->getEmailTemplates(TemplateTypes::EMAIL);
        $offerTemplates = [0 => 'Brak'] + $this->getEmailTemplates(TemplateTypes::OFFER);
        $investmentTemplates = $this->repository->find($id)->investmentTemplates()->first();
        $cardTitle = 'Szablony inwestycji: ' . $this->repository->find($id)->name;
        $filteredTableRows = array_filter($investmentTemplates->getAttributes(), function ($value, $key) {
            $ignoreKeys = ['id', 'investment_id', 'created_at', 'updated_at', 'template_offer'];
            return !in_array($key, $ignoreKeys);
        }, ARRAY_FILTER_USE_BOTH);





        $tableRows = array_map(function ($value, $key) use ($templates) {
            $emailTemplateObj  = EmailTemplate::find($value);
            if ($emailTemplateObj) {
                $emailTemplate = $emailTemplateObj->status;
            } else {
                $emailTemplate = false;
            }

            return [
                'field' => $key,
                'name' => $templates[$key],
                'template_id' => $value,
                'template_name' => $emailTemplateObj->name ?? '-',
                'template_status' => $emailTemplate
            ];
        }, $filteredTableRows, array_keys($filteredTableRows));



        $templateId = $investmentTemplates->id;


        return view('admin.developro.investment.templates', compact('emailTemplates', 'offerTemplates', 'investmentTemplates', 'cardTitle', 'tableRows', 'templateId'));
    }


    public function getTemplates(Request $request)
    {
        $validated = $request->validate([
            'investment_template_id' => 'required|exists:investment_templates,id',
            'field_name' => 'required|string',
        ]);

        $investmentTemplates = InvestmentTemplates::find($validated['investment_template_id']);

        if (!$investmentTemplates) {
            return response()->json([
                'status' => 'error',
                'message' => 'Szablon inwestycji nie został znaleziony'
            ]);
        }
        $templateId = $investmentTemplates->getAttribute($validated['field_name']);
        $emailTemplateObj  = EmailTemplate::find($templateId);


        $templateName = $emailTemplateObj->name ?? false;
        $templateStatus = $emailTemplateObj->status ?? false;


        return response()->json([
            'status' => 'success',
            'data' => [
                'template_name' => $templateName,
                'template_id' => $templateId,
                'template_status' => $templateStatus
            ]
        ]);
    }

    public function updateTemplates(Request $request)
    {

        $validated = $request->validate([
            'investment_template_id' => 'required|exists:investment_templates,id',
            'field_name' => 'required|string',
            'template_id' => 'string|nullable',
            'template_status' => 'required|boolean',
        ]);

        $investmentTemplates = InvestmentTemplates::find($validated['investment_template_id']);
        $investmentTemplates->setAttribute($validated['field_name'], $validated['template_id']);
        $investmentTemplates->save();

        $emailTemplateObj  = EmailTemplate::find($validated['template_id']);
        if ($emailTemplateObj) {
            $emailTemplateObj->status = $validated['template_status'];
            $emailTemplateObj->save();
        }

        return redirect()->back()->with('success', 'Szablon inwestycji zaktualizowany');
    }



    private function getEmailTemplates(string $templateType)
    {
        return EmailTemplate::where('user_id', auth()->id())
            ->get()
            ->filter(function ($template) use ($templateType) {
                if ($template->meta) {
                    $meta = $template->meta;
                    if (isset($meta['template_type']) && $meta['template_type'] === $templateType) {
                        return $template;
                    }
                }
            })
            ->pluck('name', 'id')
            ->toArray();
    }

    public function update(InvestmentFormRequest $request, int $id)
    {

        $investment = $this->repository->find($id);


        $this->repository->update($request->validated(), $investment);

        if ($request->hasFile('file')) {
            $this->service->uploadThumb($request->name, $request->file('file'), $investment, true);
        }

        $this->repository->addPermissionToSupervisor($investment->id, $request->input('users', []));

        $this->repository->sendMessageToInvestmentSupervisors($investment, 'Zmiana ustawień inwestycji');

        $validatedData = $request->validated();

        if (array_key_exists('investmentTemplates', $validatedData)) {
            // Update associated investment templates
            $investmentTemplates = $investment->investmentTemplates()->first();

            if ($investmentTemplates) {
                $investmentTemplates->update($validatedData['investmentTemplates']);
            } else {
                $investmentTemplates = InvestmentTemplates::make($validatedData['investmentTemplates']);
                $investmentTemplates->investment()->associate($investment);
                $investmentTemplates->save();
            }
        }

        return redirect(route('admin.developro.investment.index'))->with('success', 'Inwestycja zaktualizowana');
    }

    public function log(Investment $investment)
    {
        return view('admin.developro.investment.log', ['investment' => $investment]);
    }
    public function events(Investment $investment)
    {
        return view('admin.developro.investment.events', ['investment' => $investment]);
    }
    public function eventtable(Investment $investment, Request $request)
    {
        return $this->repository->getEventsAsTable($investment, $request);
    }
    public function datatable(Investment $investment, Request $request)
    {
        return $this->repository->getDataTable($investment, $request->input('minDate'), $request->input('maxDate'));
    }
    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json(['status' => 'deleted'], 201);
    }
}
