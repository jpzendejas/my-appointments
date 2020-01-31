<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
use DB;

class ChartController extends Controller
{
    public function appointments(){
    $monthlyCounts = Appointment::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(1) as count'))->groupBy('month')->get()->toArray();
    $counts = array_fill(0,12,0);
    foreach ($monthlyCounts as $key => $monthlyCount) {
      $index = $monthlyCount['month']-1;
      $counts[$index] = $monthlyCount['count'];
    }
    // dd($counts);
      return view('charts.appointments', compact('counts'));
    }
}
