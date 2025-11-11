<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Invoices;
use Illuminate\Support\Facades\DB;
use App\Charts\InvoiceStatusBarChart;
use App\Charts\InvoiceStatusPieChart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   public function index()
{
     $count_all = Invoices::count();
        $count1 = Invoices::where('Value_Status', 1)->count();
        $count2 = Invoices::where('Value_Status', 2)->count();
        $count3 = Invoices::where('Value_Status', 3)->count();

        $pct1 = $count_all ? ($count1 / $count_all * 100) : 0;
        $pct2 = $count_all ? ($count2 / $count_all * 100) : 0;
        $pct3 = $count_all ? ($count3 / $count_all * 100) : 0;

        $data = [$pct2, $pct1, $pct3]; // order: unpaid, paid, partially paid

        $barChart = new InvoiceStatusBarChart($data);
        $pieChart = new InvoiceStatusPieChart($data);

        return view('home', compact('barChart', 'pieChart'));

}
}
