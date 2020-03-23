<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoronaGlobalStoreRequest;
use App\Http\Requests\CoronaGlobalUpdateRequest;
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
     * @param  \App\Http\Requests\CoronaGlobalStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoronaGlobalStoreRequest $request)
    {
        $corona = new CoronaGlobal([
            'country_name' => $request->country_name,
            'cases' => $request->cases,
            'deaths' => $request->deaths,
            'recovered' => $request->recovered
        ]);
        $corona->save();

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
     * @param  \App\Http\Requests\CoronaGlobalUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoronaGlobalUpdateRequest $request, $id)
    {
        $updateData = [
            'country_name' => $request->country_name,
            'cases' => $request->cases,
            'deaths' => $request->deaths,
            'recovered' => $request->recovered
        ];
        CoronaGlobal::whereId($id)->update($updateData);

        return redirect('/coronas_global')->with('success', 'Corona Case Data is successfully updated');
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

        return redirect('/coronas_global')->with('success', 'Corona Case Data is successfully deleted');
    }
}
