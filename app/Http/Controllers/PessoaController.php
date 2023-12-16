<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Models\Pessoa;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Client\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $pessoas = Pessoa::query()->orderBy("id",'desc')->paginate(15);
        return view("index", compact("pessoas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Application
    {
        return view("create_pessoa");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePessoaRequest $request
     * @return RedirectResponse
     */
    public function store(StorePessoaRequest $request): RedirectResponse
    {

        $request->authorize();
        $request->validate($request->rules());

        Pessoa::query()->create($request->post());
        return redirect()->route("pessoas.index")->with("success","Cadastro registrado com sucesso.");
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        Validator::make(['id' => $id], ["id" => 'required']);
        $pessoa = Pessoa::query()->where("id", $id)->first();

    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Pessoa $pessoa): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Application
    {
        return view("edit_pessoa",compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePessoaRequest $request
     * @param Pessoa $pessoa
     * @return RedirectResponse
     */
    public function update(UpdatePessoaRequest $request, Pessoa $pessoa): RedirectResponse
    {
        $request->validate( (new UpdatePessoaRequest())->rules() );
        $pessoa->fill( $request->post() )->save();

        return redirect()->route("pessoas.index")->with("success","Registro criado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pessoa $pessoa
     * @return RedirectResponse
     */
    public function destroy(Pessoa $pessoa): RedirectResponse
    {
        $pessoa->delete();
        return redirect()->route("pessoas.index")->with("success","Registro removido com sucesso");
        //
    }
}
