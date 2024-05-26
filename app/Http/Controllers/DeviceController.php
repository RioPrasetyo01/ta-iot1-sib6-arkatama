<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\User;
class DeviceController extends Controller
{
    public function index()
    {
        return Device::all();
    }

    public function store(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $device = new Device;
        $device->nama_device = $request->nama_device;
        $device->user_id = $user->id;
        $device->value = $request->value;
        $device->save();

        return response()->json([
            "message" => "Device telah ditambahkan."
        ], 201);
    }

    public function show($id)
    {
        $device = Device::findOrFail($id);
        return response()->json($device);
    }

    public function update(Request $request, string $id)
    {
        $device = Device::findOrFail($id);
        $device->device_name = $request->input('nama_device');
        $device->value = $request->input('value');
        $device->save();

        return response()->json([
            "message"=> "Device telah diupdate."
        ], 201);
    }

    public function destroy(string $id)
    {
        $device = Device::findOrFail($id);
        $device->delete();

        return response()->json([
            "message"=> "Device telah dihapus."
        ], 201);
    }
}
