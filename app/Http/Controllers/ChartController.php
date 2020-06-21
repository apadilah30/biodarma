<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monitoring;
use DB;

class ChartController extends Controller
{
    public function index()
    {
		//setting header to json
		header('Content-Type: application/json');
		$suhu = Monitoring::all()->pluck('time');
		// $time = Monitoring::all()->pluck('time');

		$data = array();

		foreach ($suhu as $row) {
		  $data[] = (string)$row;
		}
		// $data2 = array();
		// foreach ($time as $t) {
		// 	$data2 = (string) $t;
		// }

		print json_encode($data);
	}

    public function load()
    {
    	return view('Experiment.index');
    }
}

