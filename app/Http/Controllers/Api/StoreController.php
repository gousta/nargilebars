<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Config;

class StoreController extends Controller
{

    public function index()
    {
        return [
            'stat' => 'ok',
            'data' => Config::get('stores.list'),
        ];
    }
}
