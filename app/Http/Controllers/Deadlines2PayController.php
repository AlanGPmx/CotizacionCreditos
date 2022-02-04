<?php

namespace App\Http\Controllers;

use App\Models\Deadlines2Pay;
use Illuminate\Http\Request;

class Deadlines2PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deadlines2pay = Deadlines2Pay::all();
        return view('application.deadline2pay.index')->with('deadlines2pay', $deadlines2pay);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.deadline2pay.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deadline2pay = new Deadlines2Pay;
        $deadline2pay->number = $request->number;
        $deadline2pay->standarRate = $request->standarRate;
        $deadline2pay->punctualRate = $request->punctualRate;
        $deadline2pay->allow = ($request->allow == 'on') ? true : false;
        $deadline2pay->save();

        return redirect()->back()->with('message', 'El plazo se ha añadido con éxito.')->with('type', 'alert-success')->with('icon', 'fa-check-circle');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deadlines2Pay  $deadlines2Pay
     * @return \Illuminate\Http\Response
     */
    public function show(Deadlines2Pay $deadlines2Pay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deadlines2Pay  $deadlines2Pay
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deadline2pay = Deadlines2Pay::find($id);
        return view('application.deadline2pay.edit')->with('deadline2pay', $deadline2pay);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deadlines2Pay  $deadlines2Pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $deadline2pay = Deadlines2Pay::find($id);
        $deadline2pay->number = $request->number;
        $deadline2pay->standarRate = $request->standarRate;
        $deadline2pay->punctualRate = $request->punctualRate;
        $deadline2pay->allow = ($request->allow == 'on') ? true : false;
        $deadline2pay->save();

        return redirect()->back()->with('message', 'El plazo se ha modificó con éxito.')->with('type', 'alert-success')->with('icon', 'fa-check-circle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deadlines2Pay  $deadlines2Pay
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deadline2pay = Deadlines2Pay::find($id);
        $wasDeleted = $deadline2pay->delete();

        return ($wasDeleted) ? 1 : 0;
    }

    /**
     * Update status 'Active' from resource
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $deadline2pay = Deadlines2Pay::find($request->id);
        $deadline2pay->allow = $request->newStatus;
        $wasSaved = $deadline2pay->save();
        return ($wasSaved) ? 1 : 0;
    }

}
