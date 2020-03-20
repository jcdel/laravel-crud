<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoronaLocal;

class CoronaLocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coronas/local/create');
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
            'corona_global_id' => 'required|numeric',
            'name' => 'required|string',
            'age' => 'required|numeric',
            'sex' => 'required|string',
            'address' => 'required|string',
            'nationality' => 'required|string',
            'hospital_name' => 'required|string'
        ]);
        $show = CoronaLocal::create($validatedData);
   
        return redirect('/coronas_local/index')->with('success', 'Corona Case is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coronaLocalCases = CoronaLocal::where('corona_global_id', $id)->paginate(5);

        return view('coronas/local/index', compact('coronaLocalCases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coronaLocalCase = CoronaLocal::findOrFail($id);

        return view('coronas/local/edit', compact('coronaLocalCase'));
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
            'name' => 'required|string',
            'age' => 'required|numeric',
            'sex' => 'required|string',
            'address' => 'required|string',
            'nationality' => 'required|string',
            'hospital_name' => 'required|string'
        ]);
        CoronaLocal::whereId($id)->update($validatedData);

        return redirect('/coronas_local/index')->with('success', 'Corona Case Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coronalocalCase = CoronaLocal::findOrFail($id);
        $coronalocalCase->delete();

        return redirect('/coronas_local')->with('success', 'Corona Case Data is successfully deleted');
    }
}
