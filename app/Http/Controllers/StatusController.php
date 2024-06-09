<?php

namespace App\Http\Controllers;
use App\Models\Status;
use App\Models\Led;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return Status::all();
    }

    public function store(Request $request)
    {
        $status = new Status;
        $status->led_id = $request->input('led_id');
        $status->status = $request->input('status');
        $status->save();

        if (Led::where('id', $request->led_id)->exists()){
            $led = Led::find($request->led_id);
            $led->status = $request->status;
            $led->save();
        }

        return response()->json([
            "message" => "Berhasil menambahkan data",
            "data" => $status
        ], 201);
    }

    public function show(string $id)
    {
        $status = Status::findOrFail($id);

        return response()->json([
            "message" => "Berhasil menampilkan data",
            "data" => $status
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);
        $status->device_id = $request->input('led_id');
        $status->status = $request->input('status');
        $status->save();

        return response()->json([
            "message" => "Berhasil mengupdate data",
            "data" => $status
        ], 201);
    }

    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return response()->json([
            "message" => "Berhasil menghapus data",
            "data" => $status
        ], 201);
    }
}
