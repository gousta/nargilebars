<?php

class Stores {

    public static function get()
    {
        $stores = DB::table('stores')->get();

        for($i=0; $i < count($stores); $i++) {

            $stores[$i]['position'] = json_decode($stores[$i]['position'], true);
            $stores[$i]['areaCAPS'] = Doo::capitalize($stores[$i]['area']);
        }

        return $stores;
    }
}
