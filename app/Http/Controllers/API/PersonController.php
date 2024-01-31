<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = Person::all();
        return $persons;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person = Person::create($request->all());
        return $person;
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Person
    {
        $person = Person::find($id);
        if(is_null($person)){
            return response()->json(["message" => "Nem található person(személy) az alábbi azonosítóval: $id"],404);
        }
        return $person;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $person = Person::find($id);
        if(is_null($person)){
            return response()->json(["message" => "Nem található person(személy) az alábbi azonosítóval: $id"],404);
        }
        $person->fill($request->all());
        $person->save();
        return $person;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $person = Person::find($id);
        if(is_null($person)){
            return response()->json(["message" => "Nem található person(személy) az alábbi azonosítóval: $id"],404);
        }       
        $person->delete();
        return response()->noContent();
    }
}
