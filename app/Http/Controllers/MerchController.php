<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merch;

class MerchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \Response::json(Merch::all(), 200);
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

        return \Response::json(["id" => $merch->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $merch = Merch::find($id);
        if(is_null($merch)) {
            return \Response::json(['message' => 'not found'], 404);
        } else {
            return \Response::json($merch, 200);
        }
    }

    /**
     * Update the specified resource in storage.
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
        if(is_null($merch)) {
            return \Response::json(['message' => 'not found'], 404);
        } else {
            $merch->description = $request->input('description');
            $merch->type = $request->input('type');
            $merch->condition = $request->input('condition');
            $merch->band_id = $request->input('band_id');
            $merch->save();

            return \Response::json(['message' => 'updated'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $merch = Merch::find($id);
        if(is_null($merch)) {
            return \Response::json(['message' => 'not found'], 404);
        } else {
            $merch->delete(); 
            return \Response::json(['message' => 'deleted'], 200);
        }
    }
}
