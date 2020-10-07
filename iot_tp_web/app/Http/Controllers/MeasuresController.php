<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Measure;

class MeasuresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measures = Measure::select('timestamp', 'value')->get();
    
        return $measures;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Measure  $serie
     * @return \Illuminate\Http\Response
     */
    public function show(Measure $measure)
    {
        return $measure;
    }
}
