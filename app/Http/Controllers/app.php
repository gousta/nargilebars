<?php

class App_Controller extends Base_Controller {

    public function action_index()
    {
        return Response::error('404');
    }

    public function action_deploy($task = null)
    {
        if(Input::get('pw') == 'mishakel')
        {
            /*
            |--------------------------------------------------------------------------
            | Force remove tables if ?reset=1
            |--------------------------------------------------------------------------
            */
            if(Input::get('reset') == 1) {
                if(Schema::exists('stores')) {
                    Schema::drop('stores');
                    echo 'Table "stores" is now deleted!<br/>';
                }
            }

            /*
            |--------------------------------------------------------------------------
            | TABLE: stores
            |--------------------------------------------------------------------------
            */
            if(!Schema::exists('stores'))
            {
                Schema::table('stores', function($table)
                {
                    $table->create();
                    $table->increments('id');
                    $table->string('key', 25);
                    $table->string('position', 255);
                    $table->string('title', 100);
                    $table->text('content')->nullable();
                    $table->string('address', 100);
                    $table->string('area', 100);
                    $table->string('region', 50);
                    $table->integer('likes')->default(0);
                    $table->integer('views')->default(0);
                    $table->string('zip', 5);
                    $table->string('phone', 20)->nullable();
                    $table->string('icon', 80);
                    $table->boolean('pro');
                });

                echo 'Table "stores" created successfully!<br/>';
            } else {
                echo 'Table "stores" exists.<br/>';
            }
        } else {
            echo 'Not allowed.';
        }
    }

    public function action_origin()
    {
        if(Input::get('pw') == 'mishakel')
        {
            $stores = Config::get('stores.list');

            foreach ($stores as $store)
            {
                DB::table('stores')->insert(array(
                    'key' => $store['key'],
                    'position' => json_encode($store['position']),
                    'title' => $store['title'],
                    'content' => $store['content'],
                    'address' => $store['address']['street'],
                    'area' => $store['address']['area'],
                    'region' => $store['address']['region'],
                    'zip' => str_replace(' ', '', $store['address']['zip']),
                    'phone' => $store['phone'],
                    'icon' => $store['icon'],
                    'pro' => 0,
                ));
            }

            echo 'Origin has been deployed.';
        } else {
            echo 'Not allowed.';
        }
    }
}
