<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $setting = Setting::find(1);
        return view('manager.setting.setting',['setting'=> $setting]);
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

        $request->validate([
            'title1' => 'required',
            'title2' => 'required',
            'title3' => 'required',
            'description' => 'required',
        ]);
        $setting = new Setting($request->all());
        $setting = Setting::find(1);
        $setting->title1 = $request->input('title1');
        $setting->title2 = $request->input('title2');
        $setting->title3 = $request->input('title3');
        $setting->description = $request->input('description');
        $setting->save();
        return redirect()->route('setting.index')->with('success', 'Sửa thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
