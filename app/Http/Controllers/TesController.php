<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App;

class TesController extends Controller
{
     // export PDF
    public function index()
    {
      return view('tes.index');
    }
}
