<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientesController extends Controller
{

    //Monta o array de arrays dos clientes
    private $clientes = array(
        array('id'=>0, 'nome' => 'Matheus'),
        array('id'=>1, 'nome' => 'Marcelus'),
        array('id'=>3, 'nome' => 'Tiago')
    );


    public function __construct()
    {
        //Verifica a existencia dos arrays dentro da session, caso não tenha os salva
        $clientes = session('clientes');
        if (!isset($clientes)) session(['clientes' => $this->clientes]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = session('clientes');
        return view('clientes.index', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $nome = $request->client_name;
        $clientes = session('clientes');
        $id = end($clientes)['id'] + 1;
        $dados = array('id'=>$id,'nome'=>$nome);
        array_push($clientes,$dados);
        session(['clientes' => $clientes]);
        return view('clientes.index', compact(['clientes']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes =  session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $clientes =  session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];


        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $clientes =  session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes[$index]['nome'] = $request->client_name;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $clientes =  session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes,$index,1);
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }


    // Retorna o index a ser excluido ou editadoa partir do id
    private function getIndex($value, $array)
    {
        $retunr = array_column($array, 'id');
        $index = array_search($value, $retunr);
        return $index;
    }
}
