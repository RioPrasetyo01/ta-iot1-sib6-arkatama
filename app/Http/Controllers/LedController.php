<?php

namespace App\Http\Controllers;

use App\Models\Led;
use Illuminate\Http\Request;

class LedController extends Controller
{
    public function getChartData($Id)
    {
        // Ambil data berdasarkan device_id
        $status = Led::where('id', $Id)->get();

        // Format data untuk chart
        $formattedData = [
            'values' => []
        ];

        foreach ($status as $item) {
        $formattedData['values'][] = json_decode($item->status, true);
        }

        return response()->json($formattedData);
    }

    function webIndex(){
        $data['title'] = 'Led Control';
        $data['breadcrumbs'] []=[
            'title'=>'Dashboard',
            'url'=>route('dashboard')
        ];
        $data['breadcrumbs'] []=[
            'title'=>'Led Control',
            'url'=>'led.index'
        ];

        $leds = Led::orderBy('nama_led')->get();
        $data['leds'] = $leds;

        return view('pages.led',$data);
    }

    function webStore(Request $request, $id){
        $led = Led::findOrFail($id);
        $led->status = $request->status;
        $led->save();

        return response()->json(['message' => 'LED status updated successfully']);
    }

    public function index()
    {
        return Led::all();
    }

    public function store(Request $request)
    {
        $led = new Led;
        $led->nama_led = $request->nama_led;
        $led->pin=$request->pin;
        $led->status = $request->status;
        $led->save();

        return response()->json([
            "message" => "Berhasil menambahkan device",
            "data" => $led
        ], 201);
    }

    public function show($id)
    {
        $led = Led::findOrFail($id);
        return response()->json([
            "message" => "Berhasil menampilkan data device",
            "data" => $led
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $led = Led::findOrFail($id);

        $led->nama_led = $request->input('nama_led');
        $led->pin = $request->input('pin');
        $led->status = $request->input('status');
        $led->save();

        return response()->json([
            "message"=> "Berhasil mengupdate device.",
            "data" => $led
        ], 201);
    }

    public function destroy(string $id)
    {
        $led = Led::findOrFail($id);
        $led->delete();

        return response()->json([
            "message"=> "Device telah dihapus.",
            "data" => $led
        ], 201);
    }
}
