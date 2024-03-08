<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Entrepreneur;
use App\Models\Quiz;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $data = [
            'userCount' => User::count(),
            'articleCount' => Article::count(),
            'tourCount' => Tour::count(),
            'entrepreneurCount' => Entrepreneur::count(),
            'quizCount' => Quiz::count(),
        ];

        return view('dashboard.dashboard', $data, [
            'title' => "Dashboard"
        ]);
    }
}
