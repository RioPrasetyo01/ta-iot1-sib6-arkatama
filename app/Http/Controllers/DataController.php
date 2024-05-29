<?php

namespace App\Http\Controllers;
use App\Models\Data;
use App\Models\Device;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return Data::all();
    }

    public function store(Request $request)
    {
        $data = new Data;
        $data->user_id = $request->input('user_id');
        $data->device_id = $request->input('device_id');
        $data->data = $request->input('data');
        $data->save();

        // if (Device::where('id', $request->device_id)->exists()){
        //     $device = Device::find($request->device_id);
        //     $device->data = $request->data;
        //     $device->save();
        // }

        return response()->json([
            "message" => "Berhasil menambahkan data",
            "data" => $data
        ], 201);
    }

    public function show(string $id)
    {
        $data = Data::findOrFail($id);

        return response()->json([
            "message" => "Berhasil menampilkan data",
            "data" => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Data::findOrFail($id);
        $data->user_id = $request->input('user_id');
        $data->device_id = $request->input('device_id');
        $data->data = $request->input('data');
        $data->save();

        return response()->json([
            "message" => "Berhasil mengupdate data",
            "data" => $data
        ], 201);
    }

    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return response()->json([
            "message" => "Berhasil menghapus data",
            "data" => $data
        ], 201);
    }
}
