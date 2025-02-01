<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $obras = Obra::all();
        return view('obras.index', compact('obras'));
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
    public function show(obra $obra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(obra $obra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, obra $obra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(obra $obra)
    {
        //
    }
}
