<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Session;
class ViewController extends Controller
{
    public function view()
    {
        $data = Analytics::fetchTopBrowsers(Period::days(30));
        $dataCount = count($data);
        $browser = array();
        $sessions = array();

        $color = array();
        $totalsessions = 0;
        for ($i = 0; $i< $dataCount; $i++)
        {
            $totalsessions += $data[$i]['sessions'];
        }
        $totalThis = array();
        if(!session('color'))
        {
            for ($i = 0; $i< $dataCount; $i++)
            {
                $browser[] = $data[$i]['browser'];
                $sessions[] = $data[$i]['sessions'];
                $color[] = sprintf("#%06x",rand(0,16777215));
                session()->set('color', $color[]);
                $totalThis[] = (round($data[$i]['sessions']/$totalsessions, 2)*100)."%";
            }
        }
        else
        {
            for ($i = 0; $i< $dataCount; $i++)
            {
                $browser[] = $data[$i]['browser'];
                $sessions[] = $data[$i]['sessions'];
                $totalThis[] = (round($data[$i]['sessions']/$totalsessions, 2)*100)."%";
            }
        }



        $chartjs = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels($browser)
            ->datasets([
                [
                    'backgroundColor' => session()->get('color'),
                    'data' => $sessions
                ]
            ])
            ->options([
                    'tooltip' => 'enable'
            ]);

        return view('data')
            ->with('data', $data->all())
            ->with('browser', $browser)
            ->with('sessions', $sessions)
            ->with('chartjs', $chartjs);
        //return view('data',['data' => $data]);
    }

}
