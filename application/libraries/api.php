<?php

class Api {

    public static function authorized($token)
    {
        return ($token == '533fc185bfa5bf1a0b7584bcff990823') ? true:false;
    }
}
