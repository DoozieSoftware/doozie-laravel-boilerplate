<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $year = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $year1 = ['2022', '2023'];

        $user = [];
        foreach ($year1 as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"), $value)->count();
        }

        return view('dashboard')->with('year', $year)->with('user', $user)->with('year1', $year1);
    }
}
