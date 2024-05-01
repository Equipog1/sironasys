<?php

namespace App\Http\Controllers;

use App\Models\providers;
use Illuminate\Http\Request;

class PROVEDORESCONTROLLER extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PROVEDORES ::latest()->paginate(5);

        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'provedor_name'          =>  'required',
            'provedor_email'         =>  'required|email|unique:PROVEDORES',
        ]);

        
        $provedor = new provedor ;

        $provedor->provedor_name = $request->PROVEDORES_name;
        $provedor->provedor_email = $request->PROVEDORES_email;
        $provedor->provedor_gender = $request->PROVEDORES_gender;

        $PROVEDOR->save();

        return redirect()->route('PROVEDORES.index')->with('success', 'PROVEDORES Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PROVEDORES   $PROVEDORES
     * @return \Illuminate\Http\Response
     */
    public function show(PROVEDORES $PROVEDORES)
    {
        return view('show', compact('PROVEDORES'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PROVEDORES   $student
     * @return \Illuminate\Http\Response
     */
    public function edit(PROVEDORES  $PROVEDORES)
    {
        return view('edit', compact('PROVEDORES '));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $PROVEDORES 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PROVEDORES  $PROVEDORES)
    {
        $request->validate([
            'PROVEDORES_name'      =>  'required',
            'PROVEDORES_email'     =>  'required|email',
            
        ]);
  
       
        $PROVEDORES = PROVEDORES::find($request->hidden_id);

        $PROVEDORES->PROVEDORES_name = $request->PROVEDORES_name;

        $PROVEDORES->PROVEDORES_email = $request->PROVEDORES_email;

        $PROVEDORES->save();

        return redirect()->route('PROVEDORES.index')->with('success', 'PROVEDORES Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PROVEDORES  $PROVEDORES
     * @return \Illuminate\Http\Response
     */
    public function destroy(PROVEDORES  $PROVEDORES )
    {
        $PROVEDORES->delete();

        return redirect()->route('PROVEDORES.index')->with('success', 'PROVEDORES Data deleted successfully');
    }
}