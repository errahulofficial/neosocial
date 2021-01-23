<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use Validate;
use DateTimeZone;
use App\Business;
use App\SocialConnection;
use Session;
use App\Group;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = Group::where('user_id', Auth::user()->id)->get();
        $business = Business::where('user_id', Auth::user()->id)->pluck('b_name', 'id');
        return view('group', compact('group','business'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addgroup()
    {
        $data = Business::where('user_id', Auth::user()->id)->pluck('b_name', 'id');
        return view('addgroup', compact('data'));
    }

    public function ajaxGrp($id)
    {
        $grp = Group::where('id', $id)->pluck('business')->first();
        $grp = explode(',', $grp);
        // $data =[];
        // $social =[];
        // $grp = Group::where('id', $id)->first();
        // if ($grp != null) {
        //     $g_bus = explode(',', $grp->business);
        //     foreach ($g_bus as $key => $gb) {
        //         $social[$key] = SocialConnection::where('business_id', $gb)->get();
        //         $data[$key] = Business::where('business.user_id', Auth::user()->id)->where('business.id', $gb)->leftjoin('posts', 'posts.user_id', 'business.user_id')->where('posts.business', 'like', '%'.$gb.'%')->orWhere('posts.business', 'like', '%,'.$gb.'%')->orWhere('posts.business', 'like', '%'.$gb.',%')->orderby('posts.updated_at', 'DESC')->take('1')
        //         ->select(
        //             'business.id as b_id',
        //             'business.b_name as b_name',
        //             'business.address as b_address',
        //             'posts.id as pid',
        //             'posts.posting_time as posting_time'
        //         )->get();
        //         if ($data[$key]) {
        //             $data[$key] = Business::where('business.user_id', Auth::user()->id)->where('business.id', $gb)->leftjoin('posts', 'posts.user_id', 'business.user_id')->orderby('posts.updated_at', 'DESC')->distinct()->take('1')
        //                 ->select(
        //                     'business.id as b_id',
        //                     'business.b_name as b_name',
        //                     'business.address as b_address',
        //                     'posts.id as pid',
        //                     'posts.posting_time as posting_time'
        //                 )->get();
        //         }
        //     }
        // }
        
        return array($grp);
    }

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
        $this->validate($request, [
            'name' => 'required|max:45',
            'color' => 'required|max:45',
            'icon_link' => 'required|max:200',
            'business' => 'required|max:1000',
                       
        ]);
        $new_bus ='';
        $flip_bus = $request->input('business');
        $group = new Group();
        $group->name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
        $group->color = filter_var($request->input('color'), FILTER_SANITIZE_STRING);
        $group->icon_link = filter_var($request->input('icon_link'), FILTER_SANITIZE_STRING);
        $group->business = implode(',', $flip_bus);
        $group->no_business = count($request->input('business'));
        $group->user_id = Auth::user()->id;

        Session::flash('success', 'Successfully Created');
        $group->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:45',
            'color' => 'required|max:45',
            'icon_link' => 'required|max:200',
            'business' => 'required|max:1000',
                       
        ]);
        $new_bus ='';
        $flip_bus = $request->input('business');
        $group = Group::where('id', $id)->first();
        $group->name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
        $group->color = filter_var($request->input('color'), FILTER_SANITIZE_STRING);
        $group->icon_link = filter_var($request->input('icon_link'), FILTER_SANITIZE_STRING);
        $group->business = implode(',', $flip_bus);
        $group->no_business = count($request->input('business'));
        $group->user_id = Auth::user()->id;

        Session::flash('success', 'Successfully Updated');
        $group->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::where('id', $id)->first();
        if ($group != null) {
            Session::flash('success', 'Successfully Deleted');
            $group->delete();
        }
        return redirect()->back();
    }
}
