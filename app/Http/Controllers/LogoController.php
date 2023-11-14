<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $logo = Logo::all();
        return view('manager.setting.setting', ['logo' => $logo]);
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
    public function update(Request $request)
    {
        //
        $logo = new Logo($request->all());
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'img';
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $logo->logo = $fileName;
        }
        $logo->save();
        return redirect()->route('logo.index')->with('success', 'Upload Logo !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function uploadLogo(Request $request)
    {
        
    }
}
