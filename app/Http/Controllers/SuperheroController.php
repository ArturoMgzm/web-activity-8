<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superhero;


class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superheroes = Superhero::all(); 

        return view('Superhero.index', compact('superheroes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Superhero.create'); 
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
            'real_name' => 'required|max:75', 
            'superhero_name' => 'required|max:75', 
            'photo' => 'required',
            'additional_info' => 'required',
          ]); 
          Superhero::create($validatedData); 
        
          return redirect('/Superhero')->with('success', 'Superhero is successfully saved'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $superhero = Superhero::findOrFail($id); 

        return view('Superhero.show', compact('superhero')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superhero = Superhero::findOrFail($id); 

        return view('Superhero.edit', compact('superhero')); 
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
            'real_name' => 'required|max:75', 
            'superhero_name' => 'required|max:75', 
            'photo' => 'required',
            'additional_info' => 'required',
          ]); 
          Superhero::whereId($id)->update($validatedData); 
        
          return redirect('/Superhero')->with('success', 'Superhero data is successfully updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $superhero = Superhero::findOrFail($id); 
        $superhero->delete(); 
    
        return redirect('/Superhero')->with('success', 'Superhero data is successfully deleted'); 
    }
}
