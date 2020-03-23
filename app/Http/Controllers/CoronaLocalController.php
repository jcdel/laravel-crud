<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoronaLocalStoreRequest;
use App\Http\Requests\CoronaLocalUpdateRequest;
use App\CoronaLocal;
use App\CoronaGlobal;

class CoronaLocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coronaLocalCases = CoronaLocal::all();

        return view('coronas/local/index', compact('coronaLocalCases'));
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
     * @param  \App\Http\Requests\CoronaLocalStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoronaLocalStoreRequest $request)
    {
        $corona =  new CoronaLocal([
            'corona_global_id' => $request->corona_global_id,
            'age' => $request->age,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'hospital_name' => $request->hospital_name,
            'status' => $request->status,
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
        $coronaLocalCases = CoronaLocal::where('corona_global_id', $id)->paginate(3);
        
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
     * @param  \App\Http\Requests\CoronaLocalUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoronaLocalUpdateRequest $request, $id)
    {
        $updateData = [
            'age' => $request->age,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'hospital_name' => $request->hospital_name,
            'status' => $request->status
        ];
        CoronaLocal::whereId($id)->update($updateData);

        return redirect('/coronas_global/')->with('success', 'Corona Case Data is successfully updated');
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

        return redirect('/coronas_global')->with('success', 'Corona Case Data is successfully deleted');
    }
}
