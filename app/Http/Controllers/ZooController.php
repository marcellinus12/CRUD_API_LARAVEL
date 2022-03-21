<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Cage;
use Illuminate\Http\Request;

class ZooController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $animal = Animal::all();
        // return response()->json($animal);

        $cages = Cage::with('animals')->get();
        return response()->json([
            'code' => 200,
            'status' => 'true',
            'message' => 'Success get all cage',
            'data' => $cages
        ]);
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
         
        $cage = Cage::create([
            'nameCage' => $request->nameCage,
            'descriptionCage' => $request->descriptionCage
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'true',
            'message' => 'Success get all cage',
            'data' => $cage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cage $cage)
    {
        $cage = Cage::where('id', $cage->id)->with('animals')->first();
        return response()->json([
            'code' => 200,
            'status' => 'true',
            'message' => 'Success get cage with id: '.$cage->id,
            'data' => $cage
        ]);
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
    public function update(Request $request, Cage $cage)
    {
        $cage->update([
            'nameCage' => $request->nameCage,
            'descriptionCage' => $request->descriptionCage
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'true',
            'message' => 'Success update cage with id: '.$cage->id,
            'data' => $cage
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cage $cage)
    {
        $cage->delete();

        return response()->json([
            'code' => 200,
            'status' => 'true',
            'message' => 'Success delete cage with id: '.$cage->id,
            'data' => $cage
        ]);
    }
}
