<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ImportHistory;

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
        $users = User::where('role', User::ROLE_USER)->count();
        $monthlyData = User::getMonthlyUsersRegistered();
        $usersMonthlyData = json_encode($monthlyData['users']);
        $categories = json_encode($monthlyData['month']);
        $userPieChartData = User::getActiveInactiveCount();
        $importCount = ImportHistory::count();
        return view('home',compact("users","usersMonthlyData","categories","userPieChartData","importCount"));
    }
}
