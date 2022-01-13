<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $year = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $monthly_user = DB::table('users')
            ->select(DB::raw('count(id) as total'), DB::raw('MONTH(created_at) as month'))
            ->groupBy('month')
            ->get();

        foreach ($monthly_user as $key) {
            $year[$key->month - 1] = $key->total;
        }

        $year1 = ['2022', '2023'];

        $user = [];
        foreach ($year1 as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"), $value)->count();
        }

        // dd($user);

        return view('dashboard')->with('year', $year)->with('user', $user)->with('year1', $year1);
    }
}
