<?php

namespace App\Http\Controllers\backController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CitypageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin/city-page/index");
    }

    public function getdata(){


    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        //
    }
}