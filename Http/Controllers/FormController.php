<?php

namespace HexGad\Forms\Http\Controllers;

use HexGad\Forms\Models\Form;
use HexGad\Forms\Http\DataTables\FormsDataTable;
use HexGad\Forms\Http\Requests\StoreFormsRequest;
use HexGad\Forms\Http\Requests\UpdateFormsRequest;
use App\Exceptions\ApiException;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param FormsDataTable $datatable
     * @return Renderable|JsonResponse
     */
    public function index(FormsDataTable $datatable): Renderable|JsonResponse
    {
        return $datatable->render('forms::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('forms::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFormsRequest $request
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function store(StoreFormsRequest $request): JsonResponse
    {
        if($form = Form::create($request->validated()))
            return response()->json($form);

        throw new ApiException;
    }

    /**
     * Show the specified resource.
     *
     * @param Form $form
     *
     * @return Renderable
     */
    public function show(Form $form): Renderable
    {
        return view('forms::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Form $form
     *
     * @return Renderable
     */
    public function edit(Form $form): Renderable
    {
        return view('forms::edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFormsRequest $request
     * @param Form $form
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function update(UpdateFormsRequest $request, Form $form): JsonResponse
    {
        if($form->update($request->validated()))
            return response()->json($form);

        throw new ApiException;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Form $form
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function destroy(Form $form): JsonResponse
    {
        if($form->delete())
            return response()->json($form);

        throw new ApiException;
    }
}
