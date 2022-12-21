<?php

namespace App\Http\Controllers;

use App\Models\expereince;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use App\Models\Person;
use App\Http\Controllers\PersonController;

class ExpereinceController extends Controller
{use HasApiTokens;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexbyconsultation($spec)
    {
        return expereince::where('Specialises',$spec)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
  $a= expereince::create($request->all());
       $user=Auth::user();
        $mm=$user->id;
        $n= Person::find($mm)->id;
    $v=Person::find($n);

    $v-> update(['expert_id'=> $n]);

      return $v;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function expert(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expereince  $expereince
     * @return \Illuminate\Http\Response
     */
    public function show(expereince $expereince)
    {
        //
    }

    public function search($name)
    {


        $experts =Person:: whereNotNull('expert_id')->get();

        $last= Person::    whereNotNull('expert_id')-> where('first_name','like','%'.$name.'%')->get();

        $first=  Person::  whereNotNull('expert_id')-> where('last_name','like','%'.$name.'%')->get();



        return [$last,$first];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expereince  $expereince
     * @return \Illuminate\Http\Response
     */
    public function edit(expereince $expereince)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\expereince  $expereince
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, expereince $expereince)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expereince  $expereince
     * @return \Illuminate\Http\Response
     */
    public function destroy(expereince $expereince)
    {
        //
    }
}
