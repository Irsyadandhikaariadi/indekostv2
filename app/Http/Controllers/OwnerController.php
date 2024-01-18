<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\PendapatanOwnerChart;

class OwnerController extends Controller
{
    //
    public function index()
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for ($month = 1; $month <= 5; $month++) {
            $date = Carbon::createFromDate($currentYear, $currentMonth, 1);
            $yearMonth = $date->isoFormat('MMMM');

            $color = ($month == $currentMonth) ? 'blue' : 'green';

            $grafikData = Transaksi::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->pluck('nominal_owner')->sum();


            $grafikDataCollection[] = [
                'year' => $currentYear,
                'month' => $yearMonth,
                'color' => $color,
                'data' => $grafikData,
            ];

            // "$grafikData";

            $currentMonth++;
            if ($currentMonth > 12) {
                $currentMonth = 1;
                $currentYear++;
            }
        }

        $data = array_values($grafikDataCollection);


        // dd($data);

        return view('owner.dashboard', compact('data'));
    }
}
