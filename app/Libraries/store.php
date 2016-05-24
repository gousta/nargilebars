<?php

namespace App\Libraries;

use Config;

class Store {

    public static function get($key)
    {
        $stores = Config::get('stores.list');

        foreach ($stores as $store) {
            if(isset($store['key']) && $store['key'] == $key) {
                return $store;
            }
        }

        return null;
    }
}
