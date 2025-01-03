<?php

namespace Modules\Videos\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Videos\Http\Requests\RequestStoreVideo;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('videos::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['teste' => 'teste']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestStoreVideo $request)
    {
        
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('videos::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('videos::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
