<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\aptitude;
use App\experiencia;
use App\formacion;
use App\otro;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function curriculum()
    {
        $user = User::first();
        return view('Admin/cv', compact('user'));
    }

    /**
     * 
     * 
     */
    public function uploadApt(Request $request){
        $apt = new aptitude();
        $apt->user_id = auth()->user()->id;
        $apt->name = $request->name;
        $apt->description = $request->descr;
        $apt->save();
    }

    /**
     * 
     * 
     */
    public function uploadFor(Request $request){
        $for = new formacion();
        $for->user_id = auth()->user()->id;
        $for->name = $request->name;
        $for->description = $request->descr;
        $for->save();
    }

    /**
     * 
     * 
     */
    public function uploadExp(Request $request){
        $exp = new experiencia();
        $exp->user_id = auth()->user()->id;
        $exp->name = $request->name;
        $exp->description = $request->descr;
        $exp->save();
    }

    /**
     * 
     * 
     */
    public function uploadDet(Request $request){
        $det = new otro();
        $det->user_id = auth()->user()->id;
        $det->name = $request->name;
        $det->description = $request->descr;
        $det->save();
    }

    /**
     * 
     * 
     */
    public function deleteApt(Request $request){
        aptitude::find($request->id)->delete();
        
    }

    /**
     * 
     * 
     */
    public function deleteFor(Request $request){
        formacion::find($request->id)->delete();
    }

    /**
     * 
     * 
     */
    public function deleteExp(Request $request){
        experiencia::find($request->id)->delete();
    }

    /**
     * 
     * 
     */
    public function deleteDet(Request $request){
        otro::find($request->id)->delete();
    }
}
