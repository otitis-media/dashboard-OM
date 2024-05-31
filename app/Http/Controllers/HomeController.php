<?php

namespace App\Http\Controllers;

use App\Models\dataOM;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    return view('home.index');
  }

  public function history()
  {
    $data = dataOM::all(); // Retrieve all data from the data_o_m_s table

    return view('history.index', ['data' => $data]); // Pass the data to the view
  }

  public function delete($id)
  {
    $data = dataOM::find($id); // Find the data by ID
    $data->delete(); // Delete the data

    return redirect()->route('history'); // Redirect to the history route
  }
}
