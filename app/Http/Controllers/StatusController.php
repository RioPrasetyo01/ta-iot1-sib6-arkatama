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
        $status-> led_id = $request -> led_id;
        $status-> status = $request -> status;
        $status->save();

        if (Led::where('id', $request->led_id)->exists()){
            $led = Led::find($request->led_id);
            $led->status = $request->status;
            $led->save();
        }

        return response()->json([
            "message" => "Device telah ditambahkan."
        ], 201);
    }

    public function show(string $id)
    {
        return Status::where('led_id',$id)->orderBy('created_at','DESC')->get();
    }
}
