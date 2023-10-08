<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Barang;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function index(Type $var = null)
    {
        $data = Barang::all();

        return $this->data['data'] = $data;
    }
    public function show($id = null)
    {
        $mod = Barang::find($id);
        return response()->json([
            'data' => $mod
        ]);

    }
}
