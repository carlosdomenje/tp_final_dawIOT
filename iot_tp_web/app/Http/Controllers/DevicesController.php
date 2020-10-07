<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\Device;

class DevicesController extends Controller
{
    /**
     * Mostramos el listado de dispositivos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        /* Los paso a la vista como parametro */
        return view('devices.index');
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
        
        Device::create([
            'name' => request('name'),
            'mac' => request('mac'),
            'dev_id' => request('dev_id'),
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        return view('devices.show', [
            'device' => $device
        ]);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        return view('devices.edit', [
            'device' => $device
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Device $device)
    {
        $device->update([
            'name' => request('name'),
            'dev_id' => request('dev_id'),
            'mac' => request('mac'),
        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
       $device->delete();
       return redirect()->route('home');
    }
}
