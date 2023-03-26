<?php

namespace App\Http\Controllers;

use App\Models\pemasok;
use App\Http\Requests\StorepemasokRequest;
use App\Http\Requests\UpdatepemasokRequest;

class PemasokController extends Controller
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
     * @param  \App\Http\Requests\StorepemasokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepemasokRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(pemasok $pemasok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepemasokRequest  $request
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepemasokRequest $request, pemasok $pemasok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(pemasok $pemasok)
    {
        //
    }
}
