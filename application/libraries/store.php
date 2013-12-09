<?php

class Store {

    public static function get($key)
    {
        $store = DB::table('stores')->where('key', '=', $key)->first();

        if($store['id']) {
            $store['position'] = json_decode($store['position'], true);
            return $store;
        } else {
            return false;
        }
    }
}
