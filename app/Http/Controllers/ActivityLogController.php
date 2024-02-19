<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    
    public function index(){    

        $activityLogs = Activity::orderBy('created_at', 'desc')->get();
        return view('logs.logging', compact('activityLogs'));
        
    }

    public function showDetails($id){

        $details = Activity::findOrFail($id);
        return view('logs.log-details', compact('details'));


    }

}
