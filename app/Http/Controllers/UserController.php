<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\WebsiteUpdates;
use DataTables;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $data = User::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $url = url('users/' . $row->id);
                    $btn .= '<a href="' . $url . '" class="btn btn-xs btn-primary">View</a> ';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->first();
        $username = $user->name;
        $websiteupdates_data = WebsiteUpdates::select('website_updates.name')->LeftJoin('projects','website_updates.project_id','=','projects.id')->where('website_updates.user_id',$user->id)->groupBy('website_updates.name')->get()->toArray();

        $users = [];
        foreach ($websiteupdates_data as $key => $value) {
            $users[$value['name']] = WebsiteUpdates::select(DB::raw("SUM(hours) as total_hours"),'users.name as username')->leftJoin('projects','website_updates.project_id','=','projects.id')->LeftJoin('users','website_updates.user_id','=','users.id')->where('website_updates.name',$value['name'])->groupBy('users.name')->get()->toArray(); 
        }
        return view('view',compact('users','username'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function summary(Request $request)
    {
        $project_summary_name = $request->input('project');
        $data = WebsiteUpdates::select('users.name as username','task','hours')->leftJoin('users','website_updates.user_id','=','users.id')->leftJoin('projects','website_updates.project_id','=','projects.id')->where('website_updates.name',$project_summary_name)->get()->toArray();
        return view('summary',compact('data','project_summary_name'));
    }
}
