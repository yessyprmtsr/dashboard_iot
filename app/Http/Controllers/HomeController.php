<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusIot;
use App\Models\KetinggianAir;
use App\Models\Spillway;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tahun = date('Y');
        $jam   = '';
        $hari  = '';
        if (isset(request()->tahun)) {
            $tahun = request()->tahun;
        }
        if (isset(request()->jam)) {
            $jam = (int) request()->jam;
        }
        if (isset(request()->hari)) {
            $hari = request()->hari;
        }
        $statusiot     = StatusIot::get()->all();
        $ketinggianAir = StatusIot::where('jenis', 'Ketinggian Air')->get()->all();
        $spillway      = StatusIot::where('jenis', 'Spillway')->get()->all();

        return view('home',compact('statusiot','tahun','jam','hari', 'ketinggianAir', 'spillway'));
    }

    public function getLatestKetinggianAir(Request $request, $limit)
    {
        $data = KetinggianAir::where('sensor_id', $request->sensor_id)
            ->limit($limit)
            ->orderBy('created_at', 'DESC')
            ->get()->all();

        foreach ($data as $key => $value) {
            $data[$key]['label'] = date('d M y - H:i:s', strtotime($value->created_at));
        }

        $data = array_reverse($data);

        return response()->json($data);
    }

    public function getLatestSpillway(Request $request)
    {
        $data = Spillway::where('spillway_id', $request->sensor_id)
            ->orderBy('created_at', 'DESC')
            ->first();
        return response()->json($data);
    }
}
