<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Config;

class BarController extends Controller
{

    public function index()
    {
        $collection = collect(Config::get('stores.list'));

        $collection->transform(function ($item, $key) {
            $item['position']['latitude'] = (float) $item['position']['latitude'];
            $item['position']['longitude'] = (float) $item['position']['longitude'];
            return $item;
        });

        return [
            'stat' => 'ok',
            'data' => $collection,
        ];
    }
}
