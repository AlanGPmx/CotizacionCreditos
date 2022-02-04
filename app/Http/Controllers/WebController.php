<?php

namespace App\Http\Controllers;

use App\Models\Web;
use NumberFormatter;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Deadlines2Pay;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $results = Products::where('sku', $request->q)->orWhere(DB::raw('lower(name)'), 'like', '%' . strtolower($request->q) . '%')->where('active', 1)->get();
            $weeks = Deadlines2Pay::where('allow', 1)->get();
            return view('dashboard')->with('results', $results)->with('weeks', $weeks);
        } else {
            return view('dashboard');
        }
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
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function show(Web $web)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function edit(Web $web)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Web $web)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function destroy(Web $web)
    {
        //
    }

    /**
     * Calcular el pago puntual y normal según las semanas elegidas y el producto 
     */
    public function calc(Request $request)
    {
        $prod = Products::find($request->idProd);
        $deadline2pay = Deadlines2Pay::find($request->idWeeks);

        //Calculo
        $data['original']['price'] = $prod->price;
        $data['original']['standarPay'] = (($prod->price * $deadline2pay->standarRate) + $prod->price) / $deadline2pay->number;
        $data['original']['punctualPay'] = (($prod->price * $deadline2pay->punctualRate) + $prod->price) / $deadline2pay->number;

       /* //Formato
        $data['original']['price'] = NumberFormatter::create('es_MX', NumberFormatter::DECIMAL)->format($data['original']['price']);
        $data['original']['standarPay'] = NumberFormatter::create('es_MX', NumberFormatter::DECIMAL)->format($data['original']['standarPay']);
        $data['original']['punctualPay'] = NumberFormatter::create('es_MX', NumberFormatter::DECIMAL)->format($data['original']['punctualPay']);


        //El producto tiene descuento?
         if (!is_null($prod->discount)) {
            $prod->price = ($prod->typeDiscount == 1) ? $prod->price - ($prod->price * ($prod->discount/100)) : $prod->discount;
            //Calculo
            $data['final']['price'] = $prod->price;
            $data['final']['standarPay'] = (($prod->price * $deadline2pay->standarRate) + $prod->price) / $deadline2pay->number;
            $data['final']['punctualPay'] = (($prod->price * $deadline2pay->punctualRate) + $prod->price) / $deadline2pay->number;

            //Formato
            $data['final']['price'] = NumberFormatter::create('es_MX', NumberFormatter::DECIMAL)->format($data['final']['price']);
            $data['final']['standarPay'] = NumberFormatter::create('es_MX', NumberFormatter::DECIMAL)->format($data['final']['standarPay']);
            $data['final']['punctualPay'] = NumberFormatter::create('es_MX', NumberFormatter::DECIMAL)->format($data['final']['punctualPay']);
        } */

        return $data;
    }
}
