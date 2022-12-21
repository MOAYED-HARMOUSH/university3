<?php

namespace App\Http\Controllers;

use App\Models\Consultations;
use App\Models\wallet;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class ConsultationsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makeConsultation(Request $request)
    {$mo=$request->person_expert_id;

        $user=Auth::user();
        $mn=$user->id;
        if($mo==$mn){
            return 'cant consulute yourself donkey';
        }
        else
        return Consultations::create( [
        'title'=> $request->title,
        'content'=>$request->content,
        'isfinished'=>$request->isfinished,
        'rate'=>$request->rate,
        'cost'=>$request->cost,
        'Specialises'=>$request->Specialises,
        'person_id'=> $mn,
        'person_expert_id'=>$mo

        ]);
 $iss=Consultations::get('isfinished');
        if($iss==true)
        {
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function show(Consultations $consultations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultations $consultations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultations $consultations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultations $consultations)
    {
        //
    }
}
