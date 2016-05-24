<?php

class Api_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		$output['version'] = '1.0';
		$output['data'] = array();

		return Response::json($output);
	}

	public function get_stores()
	{
		$token = Input::get('token');
		$callback = Input::get('callback');

		if(Api::authorized($token))
		{
			$stores = Stores::get();

			$output['status'] = 200;
			$output['data'] = $stores;
		} else {
			$output['status'] = 403;
			$output['message'] = 'FORBIDDEN';
			$output['data'] = array();
		}

		if($callback == '') {
			return Response::json($output);
		} else {
			return $callback . '(' . json_encode($output) . ');';
		}
	}

	public function get_store($key)
	{
		$token = Input::get('token');
		$callback = Input::get('callback');

		if(Api::authorized($token))
		{
			$store = Store::get($key);

			$store['areaCAPS'] = Doo::capitalize($store['area']);

			$output['status'] = 200;
			$output['data'] = $store;
		} else {
			$output['status'] = 403;
			$output['message'] = 'FORBIDDEN';
			$output['data'] = array();
		}

		if($callback == '') {
			return Response::json($output);
		} else {
			return $callback . '(' . json_encode($output) . ');';
		}
	}

}
