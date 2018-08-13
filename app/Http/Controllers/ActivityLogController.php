<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Hyn\Tenancy\Environment;
use \Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activityLogs = Activity::all();
        return view('backend.users.activity-log', ['activityLogs'=>$activityLogs]);
    }

}
