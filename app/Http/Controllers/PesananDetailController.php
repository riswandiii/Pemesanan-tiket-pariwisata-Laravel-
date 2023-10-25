<?php

namespace App\Http\Controllers;

use App\Models\PesananDetail;
use App\Http\Requests\StorePesananDetailRequest;
use App\Http\Requests\UpdatePesananDetailRequest;

class PesananDetailController extends Controller
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
     * @param  \App\Http\Requests\StorePesananDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesananDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PesananDetail $pesananDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PesananDetail $pesananDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesananDetailRequest  $request
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesananDetailRequest $request, PesananDetail $pesananDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesananDetail $pesananDetail)
    {
        //
    }
}
