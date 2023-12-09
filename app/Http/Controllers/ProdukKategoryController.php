<?php

namespace App\Http\Controllers;

use App\Models\ProdukKategory;
use App\Http\Requests\StoreProdukKategoryRequest;
use App\Http\Requests\UpdateProdukKategoryRequest;

class ProdukKategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreProdukKategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukKategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukKategory  $produkKategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukKategory $produkKategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukKategory  $produkKategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukKategory $produkKategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukKategoryRequest  $request
     * @param  \App\Models\ProdukKategory  $produkKategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdukKategoryRequest $request, ProdukKategory $produkKategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukKategory  $produkKategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukKategory $produkKategory)
    {
        //
    }
}
