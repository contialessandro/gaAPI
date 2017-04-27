<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
class ViewController extends Controller
{
    public function view()
    {
        $data = Analytics::fetchTopBrowsers(Period::days(14));
        $data = (array) $data;

        return view('data',['data' => $data]);
    }

}
