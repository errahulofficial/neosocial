<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Graph;
use App\SocialConnection;
use App\SocialPlatform;
use App\Posts;
use App\User;
use Auth;
use Session;

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
        $fb_count = 0;
        $tw_count = 0;
        $in_count = 0;
        $gb_count = 0;
        $business_count = [];
        $bustrack = [];
        $month = date('m', time());
        $days = date('t', time());
        $business = Business::where('user_id', Auth::user()->id)->get();
        $social = SocialConnection::where('business_user_id', Auth::user()->id)->get();
        $platform = SocialPlatform::get();
        $posts = Posts::where('user_id', Auth::user()->id)->get();
        $sch_post = Posts::where('user_id', Auth::user()->id)->get();
               
        foreach ($business as $bs) {
            $id = $bs->id;
            $business_count[] = Business::where('business.user_id', Auth::user()->id)->where('business.id', $id)->rightJoin('posts', function ($join) use ($id, $month) {
                $join->on('business.user_id', '=', 'posts.user_id')->where('posts.business', $id)->orderby('posts.updated_at', 'DESC');
            })->select(
                'business.id as b_id',
                'business.b_name as b_name',
                'business.address as b_address',
                'posts.id as pid',
                'posts.posting_time as posting_time',
                'posts.fb_share_active as fb_active',
                'posts.tw_share_active as tw_active',
                'posts.gb_share_active as gb_active',
                'posts.in_share_active as in_active'
            )->get();
        }
        $business_count = json_decode(json_encode($business_count));
        $graph = [];
        // dd($business_count);
        foreach ($business as $key => $business_ex) {
            foreach ($business_count[$key] as $bus_count) {
                if (date('m', strtotime($bus_count->posting_time)) == date('m', time())) {
                    if ($bus_count->b_id == $business_ex->id) {
                        $bustrack[$business_ex->id][] = $bus_count;
                    }
                    if ($bus_count->fb_active != 0) {
                        $fb_count++;
                    }
                    if ($bus_count->tw_active != 0) {
                        $tw_count++;
                    }
                    if ($bus_count->in_active != 0) {
                        $in_count++;
                    }
                    if ($bus_count->gb_active != 0) {
                        $gb_count++;
                    }
                }
            }
            $fb[] = $fb_count;
            $fb_count = 0;
            $tw[] = $tw_count;
            $tw_count = 0;
            $in[] = $in_count;
            $in_count = 0;
            $gb[] = $gb_count;
            $gb_count = 0;

            
        }
        $graphs = Graph::first();
        $graph = explode(',',$graphs->total_graph);
        return view('home', compact('business', 'social', 'posts', 'platform', 'bustrack', 'month','gb','in','tw','fb', 'days', 'graph'));
    }

    public function setting()
    {
        return view('setting');
    }
    public function setUpdate(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->company_name = $request->input('c_name');
        $user->company_address = $request->input('c_address');
        $user->company_city = $request->input('c_city');
        $user->company_state = $request->input('c_state');
        $user->company_zip = $request->input('c_zip');
        $user->company_country = $request->input('c_country');
        $user->website = $request->input('website');
        $user->company_phone = $request->input('c_phone');
        $user->contact_name = $request->input('con_name');
        $user->contact_phone = $request->input('con_phone');
        $user->save();
        Session::flash('success', 'Successfully Updated');
        return redirect()->back();
    }
}
