<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Libraries\Store;

use Config;

// use App\Http\Requests\BookingRequest;
// use App\Events\CreateBooking;

// use App\Booking;
// use App\Classified;
// use App\Client;
// use App\Payment;
// use App\ClassifiedAction;
// use Input;
// use Event;
// use App\Events\Booking as BookingChange;
// use Config;
// use App\Library\DateFunctions;
// use App\Library\EmailSender;

class MainController extends Controller
{

    public function index()
    {
        $data['stores'] = Config::get('stores.list');
        return view('site.index', $data);
    }

    public function discover()
    {
        $data['stores'] = Config::get('stores.list');
        return view('site.discover', $data);
    }

    public function storeview($key)
    {
        $data['stores'] = Config::get('stores.list');
        $data['store'] = Store::get($key);

        if(isset($data['store'])) {
            return view('site.single', $data);
        }

        abort(404);
    }

}
