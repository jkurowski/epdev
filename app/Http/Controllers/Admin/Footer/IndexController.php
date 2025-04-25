<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// CMS
use App\Repositories\FooterRepository;
use App\Http\Requests\FooterFormRequest;
use App\Models\Footer;

class IndexController extends Controller
{
    private FooterRepository $repository;

    public function __construct(FooterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('admin.footer.index', ['list' => $this->repository->allSortBy('sort', 'ASC')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.form', [
            'cardTitle' => 'Dodaj moduł',
            'backButton' => route('admin.footer.index')
        ])->with('entry', Footer::make());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FooterFormRequest $request)
    {
        $validatedData = $request->validated();
        $this->repository->create($validatedData);
        return redirect(route('admin.footer.index'))->with('success', 'Nowy moduł dodany');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.footer.form', [
            'entry' => Footer::find($id),
            'cardTitle' => 'Edytuj moduł',
            'backButton' => route('admin.footer.index')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FooterFormRequest $request, int $id)
    {
        $entry = $this->repository->find($id);
        $this->repository->update($request->validated(), $entry);
        return redirect(route('admin.footer.index'))->with('success', 'Moduł zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }

    public function sort(Request $request)
    {
        $this->repository->updateOrder($request->get('recordsArray'));
    }
}
