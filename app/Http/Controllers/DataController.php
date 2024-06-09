<?php

namespace App\Http\Controllers;
use App\Models\Data;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Service\WhatsappNotificationService;

class DataController extends Controller
{
    public function showLatestData($deviceId)
    {
        $latestData = Data::where('device_id', $deviceId)->orderBy('created_at', 'desc')->first();

        if ($latestData) {
            return response()->json([
                "message" => "Berhasil menampilkan data terakhir",
                "data" => $latestData
            ], 200);
        } else {
            return response()->json([
                "message" => "Data tidak ditemukan",
            ], 404);
        }
    }

    public function web_index()
    {
        $data['title'] = 'Sensor';
        $data['breadcrumbs'] []=[
            'title'=>'Dashboard',
            'url'=>route('dashboard')
        ];
        $data['breadcrumbs'] []=[
            'title'=>'Sensor',
            'url'=>'sensor.index'
        ];

        $devices = Device::orderBy('id')->get();
        $data['device'] = $devices;

        return view('pages.sensor',$data);
    }

    public function getChartData($deviceId)
    {
        // Ambil data berdasarkan device_id
        $data = Data::where('device_id', $deviceId)->get();

        // Format data untuk chart
        $formattedData = [
            'categories' => [],
            'values' => []
        ];

        foreach ($data as $item) {
            $formattedData['categories'][] = $item->created_at->format('Y-m-d H:i:s');
            $formattedData['values'][] = json_decode($item->data, true);
        }

        return response()->json($formattedData);
    }

    public function showDevices()
    {
        // Ambil data dari device_id 1 sampai 4
        $devicesData = Data::whereIn('device_id', [1, 2, 3, 4])->get();

        // Pisahkan data berdasarkan device_id
        $devices = [
            1 => $devicesData->where('device_id', 1),
            2 => $devicesData->where('device_id', 2),
            3 => $devicesData->where('device_id', 3),
            4 => $devicesData->where('device_id', 4),
        ];

        return view('pages.dashboard', compact('devices'));
    }

    // public function web_show(string $id){
    //     return view('device',[
    //         "title" => "device",
    //         "device" => Device::find($id),
    //         "data" => Data::where('device_id',$id)->orderBy('created_at','DESC')->get()
    //     ]);
    // }

    public function index()
    {
        return Data::all();
    }

    public function store(Request $request)
    {
        $data = new Data;
        $data->device_id = $request->input('device_id');
        $data->data = $request->input('data');
        $data->save();

        if (Device::where('id', $request->device_id)->exists()){
            $device = Device::find($request->device_id);
            $device->value = $request->data;
            $device->save();
        }

        $thirdDevice = Device::find(3); // Asumsikan device_id ketiga adalah 3
        if ($thirdDevice) {
            $nilaiSensor = $thirdDevice->value;
        } else {
            $nilaiSensor = null; // atau atur default value sesuai kebutuhan
        }

        WhatsappNotificationService::notifikasiKebocoranGasMassal($nilaiSensor);

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
