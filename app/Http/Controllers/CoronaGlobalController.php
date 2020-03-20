<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoronaGlobal;

class CoronaGlobalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coronaGlobalCases = CoronaGlobal::all();

        return view('coronas/global/index', compact('coronaGlobalCases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coronas/global/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'country_name' => 'required|max:255',
            'cases' => 'required|numeric',
            'deaths' => 'required|numeric',
            'recovered' => 'required|numeric'
        ]);
        $show = CoronaGlobal::create($validatedData);
   
        return redirect('/coronas_global')->with('success', 'Corona Case is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coronaGlobalCase = CoronaGlobal::findOrFail($id);

        return view('coronas/global/edit', compact('coronaGlobalCase'));
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
        $validatedData = $request->validate([
            'country_name' => 'required|max:255',
            'cases' => 'required|numeric',
            'deaths' => 'required|numeric',
            'recovered' => 'required|numeric'
        ]);
        CoronaGlobal::whereId($id)->update($validatedData);

        return redirect('/coronas_global')->with('success', 'Global Corona Case Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coronaGlobalCase = CoronaGlobal::findOrFail($id);
        $coronaGlobalCase->delete();

        return redirect('/coronas_global')->with('success', 'Global Corona Case Data is successfully deleted');
    }
}
