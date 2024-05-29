<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Led;
use App\Models\User;

class LedController extends Controller
{
    public function index()
    {
        return Led::all();
    }

    public function store(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $led = new Led;
        $led->nama_led = $request->nama_led;
        $led->user_id = $user->id;
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
