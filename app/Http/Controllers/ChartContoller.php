<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Charts;
class ChartContoller extends Controller
{
    public function index()
    {
    	$users = Ticket::where(Db::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
                    $chart = Charts::database($users, 'bar', 'highcharts')
                    ->title("Monthly new Register Ticket")
                    ->elementLabel("Total Ticket")
                    ->dimensions(1000, 500)
                    ->responsive(false)
                    ->groupByMonth(date('Y'), true);


          return view('pages.chart',compact('chart'));
    }
}


// Charts::create('line', 'highcharts')
//     ->title('My nice chart')
//     ->elementLabel('My nice label')
//     ->labels(['First', 'Second', 'Third'])
//     ->values([5,10,20])
//     ->dimensions(1000,500)
//     ->responsive(false);
