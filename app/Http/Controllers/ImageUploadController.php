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
    $filePath = 'otitis-media/' . $file->getClientOriginalName(); // Adjust folder path as needed

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
      return response()->json(['message' => 'Image uploaded successfully!'], 200);
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
}
