<?php

namespace App\Http\Controllers;

use App\Models\dataOM;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{

	public function upload(Request $request)
  {
    // Validate the request
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    // Get the uploaded file
    $file = $request->file('image');
    date_default_timezone_set('Asia/Jakarta');
$filePath = 'otitis-media/' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
    // Read file content
    $fileContent = file_get_contents($file->getRealPath());
    // Make the request to Supabase Storage
    $client = new Client();
    $response = $client->post(env('SUPABASE_URL') . '/storage/v1/object/' . env('SUPABASE_BUCKET') . '/' . $filePath, [
      'headers' => [
        'Authorization' => 'Bearer ' . env('SUPABASE_KEY'),
        'Content-Type' => 'application/octet-stream'
      ],
      'body' => $fileContent
    ]);
    if ($response->getStatusCode() === 200) {
      $dataOM = new dataOM();
      $dataOM->judul = 'Title';
      $dataOM->date = now();
      $dataOM->deskripsi = 'Captured from Omedscope';
      $dataOM->gambar = $filePath;
      $dataOM->prediksi = 'Non-OM';
      $dataOM->save();
      return response()->json(['message' => $dataOM->prediksi], 200);
    } else {
      return response()->json(['message' => 'Failed to upload image!'], $response->getStatusCode());
    }
  }

  public function addGambar(Request $request)
  {
    // Validate the request
    $request->validate([
      'judul' => 'required|string',
      'deskripsi' => 'required|string',
      'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Get the uploaded file
    $file = $request->file('gambar');
    date_default_timezone_set('Asia/Jakarta');
    $filePath = 'otitis-media/' . date('YmdHis') . '.' . $file->getClientOriginalExtension(); // Adjust folder path as needed

    // Read file content
    $fileContent = file_get_contents($file->getRealPath());

    // dd($request->all());

    // Make the request to Supabase Storage
    $client = new Client();
    $response = $client->post(env('SUPABASE_URL') . '/storage/v1/object/' . env('SUPABASE_BUCKET') . '/' . $filePath, [
      'headers' => [
        'Authorization' => 'Bearer ' . env('SUPABASE_KEY'),
        'Content-Type' => 'application/octet-stream'
      ],
      'body' => $fileContent
    ]);

    $prediksi = (string) rand(0, 4);
    if ($prediksi == 0)
      $prediksi = "Normal";

    if ($response->getStatusCode() === 200) {
      // Save the image details to the database
      $dataOM = new dataOM();
      $dataOM->judul = $request->input('judul');
      $dataOM->date = now();
      $dataOM->deskripsi = $request->input('deskripsi');
      $dataOM->gambar = $filePath;
      $dataOM->prediksi = $prediksi;
      $dataOM->save();

      return redirect()->back()->with('success', 'Sukses menambahkan gambar');
    } else {
      return redirect()->back()->with('error', 'Gagal menambahkan gambar!');
    }
  }
	public function upload1(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the uploaded file
        $file = $request->file('image');

        date_default_timezone_set('Asia/Jakarta');
        $filePath = 'otitis-media/' . date('YmdHis') . '.' . $file->getClientOriginalExtension();

        // Read file content
        $fileContent = file_get_contents($file->getRealPath());

        // Make the request to Supabase Storage
        $client = new Client();
        $response = $client->post(env('SUPABASE_URL') . '/storage/v1/object/' . env('SUPABASE_BUCKET') . '/' . $filePath, [
            'headers' => [
                'Authorization' => 'Bearer ' . env('SUPABASE_KEY'),
                'Content-Type' => 'application/octet-stream'
            ],
            'body' => $fileContent
        ]);

        if ($response->getStatusCode() === 200) {
            // Attempt to get prediction from Flask app
            $prediction = $this->getPredictionFromFlask($file);

            $dataOM = new dataOM();
            $dataOM->judul = 'Title';
            $dataOM->date = now();
            $dataOM->deskripsi = 'Captured from Omedscope';
            $dataOM->gambar = $filePath;
            $dataOM->prediksi = $prediction['result'];
            $dataOM->save();

            return response()->json([
                'message' => $dataOM->prediksi,
                'confidence' => $prediction['confidence']
            ], 200);
        } else {
            return response()->json(['message' => 'Failed to upload image!'], $response->getStatusCode());
        }
    }

    private function getPredictionFromFlask($file)
    {
        $client = new Client();
        $defaultPrediction = [
            'result' => 'Normal',
            'confidence' => 0.0
        ];

        try {
            $response = $client->post('http://localhost:5000/predict', [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen($file->getRealPath(), 'r'),
                        'filename' => $file->getClientOriginalName()
                    ]
                ]
            ]);

            if ($response->getStatusCode() === 200) {
                $result = json_decode($response->getBody(), true);
                return [
                    'result' => $result['result'],
                    'confidence' => $result['confidence']
                ];
            }
        } catch (RequestException $e) {
            // Log the error if needed
            // \Log::error('Failed to get prediction from Flask app: ' . $e->getMessage());
        }

        return $defaultPrediction;
    }
}
