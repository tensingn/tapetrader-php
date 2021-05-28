<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merch;

class MerchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Merch::all();
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
        $this->validate($request, [
            'description' => 'required',
            'type' => 'required',
            'condition' => 'required',
            'band_id' => 'required',
        ]);

        $merch = new Merch;
        $merch->description = $request->input('description');
        $merch->type = $request->input('type');
        $merch->condition = $request->input('condition');
        $merch->band_id = $request->input('band_id');
        $merch->save();

        return 'created';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Merch::find($id);
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
        $this->validate($request, [
            'description' => 'required',
            'type' => 'required',
            'condition' => 'required',
            'band_id' => 'required',
        ]);

        $merch = Merch::find($id);
        $merch->description = $request->input('description');
        $merch->type = $request->input('type');
        $merch->condition = $request->input('condition');
        $merch->band_id = $request->input('band_id');
        $merch->save();

        return 'updated';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merch = Merch::find($id);
        $merch->delete(); 
        return 'deleted';
    }
}
