<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientesController extends Controller
{

    private $clientes = array(
        array('id'=>0, 'nome' => 'Matheus'),
        array('id'=>1, 'nome' => 'Marcelus'),
        array('id'=>3, 'nome' => 'Tiago')
    );


    public function __construct()
    {
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
        $clientes = $this->clientes;
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
    }


    private function getIndex($id, $clientes)
    {
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        return $index;
    }
}
