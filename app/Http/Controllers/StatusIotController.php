<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusIot;

class StatusIotController extends Controller
{
      public function index()
    {
        $data = StatusIot::get()->all();

        return view('statusiot.index', compact('data'));
    }

    public function create()
    {
        return view('statusiot.create');
    }

    public function store(Request $request)
    {
        $data = new StatusIot();
        $data->name = $request->name;
        $data->status = $request->status;
        $data->jenis = $request->jenis;
        $data->save();

        return redirect('/status-iot')->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = StatusIot::find($id);
        return view('statusiot.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = StatusIot::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->jenis = $request->jenis;
        $data->save();

        return redirect('/status-iot')->with('success','Data berhasil diperbaharui');
    }

    public function destroy($id)
    {
        $data = StatusIot::find($id);
        $data->delete();
    }
}
