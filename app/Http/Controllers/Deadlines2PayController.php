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
        return view('application.deadline2pay.index');
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
        //
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
    public function edit(Deadlines2Pay $deadlines2Pay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deadlines2Pay  $deadlines2Pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deadlines2Pay $deadlines2Pay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deadlines2Pay  $deadlines2Pay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deadlines2Pay $deadlines2Pay)
    {
        //
    }
}
