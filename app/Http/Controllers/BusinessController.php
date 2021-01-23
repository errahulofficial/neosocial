<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialPlatform;
use App\ImageGallery;
use App\SocialConnection;
use App\SetupMail;
use App\Posts;
use Redirect;
use Auth;
use Validate;
use DateTimeZone;
use App\Business;
use Session;

class BusinessController extends Controller
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
        $business = Business::where('user_id', Auth::user()->id)->get();
        foreach($business as $bus){
            $facebook[$bus->id] = SocialConnection::where('business_id', $bus->id)->where('name', 'Facebook')->first();
            $twitter[$bus->id] = SocialConnection::where('business_id', $bus->id)->where('name', 'Twitter')->first();
            $insta[$bus->id] = SocialConnection::where('business_id', $bus->id)->where('name', 'Instagram')->first();
            $google[$bus->id] = SocialConnection::where('business_id', $bus->id)->where('name', 'Google Business')->first();
       
        }
       
        return view('business', compact('business', 'facebook', 'twitter', 'insta', 'google'));
    }

    public function addbusiness()
    {
        $timezones = array(
            'Pacific/Midway'       => "(GMT-11:00) Midway Island",
            'US/Samoa'             => "(GMT-11:00) Samoa",
            'US/Hawaii'            => "(GMT-10:00) Hawaii",
            'US/Alaska'            => "(GMT-09:00) Alaska",
            'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
            'America/Tijuana'      => "(GMT-08:00) Tijuana",
            'US/Arizona'           => "(GMT-07:00) Arizona",
            'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
            'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
            'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
            'America/Mexico_City'  => "(GMT-06:00) Mexico City",
            'America/Monterrey'    => "(GMT-06:00) Monterrey",
            'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
            'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
            'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
            'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
            'America/Bogota'       => "(GMT-05:00) Bogota",
            'America/Lima'         => "(GMT-05:00) Lima",
            'America/Caracas'      => "(GMT-04:30) Caracas",
            'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
            'America/La_Paz'       => "(GMT-04:00) La Paz",
            'America/Santiago'     => "(GMT-04:00) Santiago",
            'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
            'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
            'Greenland'            => "(GMT-03:00) Greenland",
            'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
            'Atlantic/Azores'      => "(GMT-01:00) Azores",
            'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
            'Africa/Casablanca'    => "(GMT) Casablanca",
            'Europe/Dublin'        => "(GMT) Dublin",
            'Europe/Lisbon'        => "(GMT) Lisbon",
            'Europe/London'        => "(GMT) London",
            'Africa/Monrovia'      => "(GMT) Monrovia",
            'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
            'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
            'Europe/Berlin'        => "(GMT+01:00) Berlin",
            'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
            'Europe/Brussels'      => "(GMT+01:00) Brussels",
            'Europe/Budapest'      => "(GMT+01:00) Budapest",
            'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
            'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
            'Europe/Madrid'        => "(GMT+01:00) Madrid",
            'Europe/Paris'         => "(GMT+01:00) Paris",
            'Europe/Prague'        => "(GMT+01:00) Prague",
            'Europe/Rome'          => "(GMT+01:00) Rome",
            'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
            'Europe/Skopje'        => "(GMT+01:00) Skopje",
            'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
            'Europe/Vienna'        => "(GMT+01:00) Vienna",
            'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
            'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
            'Europe/Athens'        => "(GMT+02:00) Athens",
            'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
            'Africa/Cairo'         => "(GMT+02:00) Cairo",
            'Africa/Harare'        => "(GMT+02:00) Harare",
            'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
            'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
            'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
            'Europe/Kiev'          => "(GMT+02:00) Kyiv",
            'Europe/Minsk'         => "(GMT+02:00) Minsk",
            'Europe/Riga'          => "(GMT+02:00) Riga",
            'Europe/Sofia'         => "(GMT+02:00) Sofia",
            'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
            'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
            'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
            'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
            'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
            'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
            'Europe/Moscow'        => "(GMT+03:00) Moscow",
            'Asia/Tehran'          => "(GMT+03:30) Tehran",
            'Asia/Baku'            => "(GMT+04:00) Baku",
            'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
            'Asia/Muscat'          => "(GMT+04:00) Muscat",
            'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
            'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
            'Asia/Kabul'           => "(GMT+04:30) Kabul",
            'Asia/Karachi'         => "(GMT+05:00) Karachi",
            'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
            'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
            'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
            'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
            'Asia/Almaty'          => "(GMT+06:00) Almaty",
            'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
            'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
            'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
            'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
            'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
            'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
            'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
            'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
            'Australia/Perth'      => "(GMT+08:00) Perth",
            'Asia/Singapore'       => "(GMT+08:00) Singapore",
            'Asia/Taipei'          => "(GMT+08:00) Taipei",
            'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
            'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
            'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
            'Asia/Seoul'           => "(GMT+09:00) Seoul",
            'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
            'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
            'Australia/Darwin'     => "(GMT+09:30) Darwin",
            'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
            'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
            'Australia/Canberra'   => "(GMT+10:00) Canberra",
            'Pacific/Guam'         => "(GMT+10:00) Guam",
            'Australia/Hobart'     => "(GMT+10:00) Hobart",
            'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
            'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
            'Australia/Sydney'     => "(GMT+10:00) Sydney",
            'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
            'Asia/Magadan'         => "(GMT+12:00) Magadan",
            'Pacific/Auckland'     => "(GMT+12:00) Auckland",
            'Pacific/Fiji'         => "(GMT+12:00) Fiji",
        );
        return view('addbusiness', compact('timezones'));
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

        $business = new Business();
        if ($request->input('business_type') == 'local') {
            $business->b_type = filter_var($request->input('business_type'), FILTER_SANITIZE_STRING);
            $business->b_name = filter_var($request->input('l_bus_name'), FILTER_SANITIZE_STRING);
            $business->category = filter_var($request->input('l_bus_category'), FILTER_SANITIZE_STRING);
            $business->phone = filter_var($request->input('l_bus_phone'), FILTER_SANITIZE_STRING);
            $business->address = filter_var($request->input('l_bus_address'), FILTER_SANITIZE_STRING);
            $business->city = filter_var($request->input('l_bus_city'), FILTER_SANITIZE_STRING);
            $business->state = filter_var($request->input('l_bus_state'), FILTER_SANITIZE_STRING);
            $business->zip = filter_var($request->input('l_bus_zip'), FILTER_SANITIZE_STRING);
            $business->website = filter_var($request->input('l_bus_website'), FILTER_SANITIZE_STRING);
            $business->contact_fname = filter_var($request->input('l_bus_fname'), FILTER_SANITIZE_STRING);
            $business->contact_lname = filter_var($request->input('l_bus_lname'), FILTER_SANITIZE_STRING);
            $business->contact_title = filter_var($request->input('l_bus_title'), FILTER_SANITIZE_STRING);
            $business->contact_email = filter_var($request->input('l_bus_con_email'), FILTER_SANITIZE_STRING);
            $business->contact_phone = filter_var($request->input('l_bus_con_phone'), FILTER_SANITIZE_STRING);
        }
        if ($request->input('business_type') == 'online') {
            $business->b_type = filter_var($request->input('business_type'), FILTER_SANITIZE_STRING);
            $business->b_name = filter_var($request->input('o_bus_name'), FILTER_SANITIZE_STRING);
            $business->category = filter_var($request->input('o_bus_category'), FILTER_SANITIZE_STRING);
            $business->niche = filter_var($request->input('o_bus_niche'), FILTER_SANITIZE_STRING);
            $business->website = filter_var($request->input('o_bus_website'), FILTER_SANITIZE_STRING);
            $business->contact_fname = filter_var($request->input('o_bus_fname'), FILTER_SANITIZE_STRING);
            $business->contact_lname = filter_var($request->input('o_bus_lname'), FILTER_SANITIZE_STRING);
            $business->contact_title = filter_var($request->input('o_bus_title'), FILTER_SANITIZE_STRING);
            $business->contact_email = filter_var($request->input('o_bus_con_email'), FILTER_SANITIZE_STRING);
            $business->contact_phone = filter_var($request->input('o_bus_con_phone'), FILTER_SANITIZE_STRING);
        }
        $business->fb_monthly_goals = filter_var($request->input('fb_monthly_share'), FILTER_SANITIZE_STRING);
        $business->tw_monthly_goals = filter_var($request->input('tw_monthly_share'), FILTER_SANITIZE_STRING);
        $business->in_monthly_goals = filter_var($request->input('in_monthly_share'), FILTER_SANITIZE_STRING);
        $business->gb_monthly_goals = filter_var($request->input('gb_monthly_share'), FILTER_SANITIZE_STRING);
        $business->auto_schedule_days = $request->input('monday').','.$request->input('tuesday').','.$request->input('wednesday').','.$request->input('thrusday').','.$request->input('friday').','.$request->input('saturday').','.$request->input('sunday');
        $business->auto_schedule_time_start = filter_var($request->input('start_time'), FILTER_SANITIZE_STRING);
        $business->auto_schedule_time_end = filter_var($request->input('end_time'), FILTER_SANITIZE_STRING);
        $business->max_post = filter_var($request->input('max_post'), FILTER_SANITIZE_STRING);
        $business->time_zone = filter_var($request->input('time_zone'), FILTER_SANITIZE_STRING);
        
        $business->user_id = Auth::user()->id;
        
        Session::flash('success', 'Successfully Created');
        $business->save();
        $insertId = $business->id;
        return redirect('/business/add?id='.$insertId.'#custom-tabs-three-social');
    }


    // public function monthly_goal_form($id)
    // {
    //     $timezonelist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
    //     $inId = $id;
    //     $social_platform = SocialPlatform::get();
    //     return view('add-monthlygoals', compact('social_platform', 'inId', 'timezonelist'));
    // }

    // public function monthly_goal(Request $request)
    // {
    //     $business = Business::where('id', $request->input('b_id'))->first();
    //     $socialplatform = SocialPlatform::get();
    //     for ($i=1; $i<=$socialplatform->count(); $i++) {
    //         $m_goals[] = $request->input('monthly_goal-'.$i);
    //         $p_goals[] = 0;
    //     }
    //     if ($business != null) {
    //         $business->monthly_goal = implode(',', $m_goals);
    //         $business->posted_goals = implode(',', $p_goals);
    //         $business->auto_schedule_days = filter_var($request->input('monday').','.$request->input('tuesday').','.$request->input('wednesday').','.$request->input('thrusday').','.$request->input('friday').','.$request->input('saturday').','.$request->input('sunday'), FILTER_SANITIZE_STRING);
    //         $business->auto_schedule_time_start = filter_var($request->input('start_time_hr').':'.$request->input('start_time_min').' '.$request->input('start_time_am'), FILTER_SANITIZE_STRING);
    //         $business->auto_schedule_time_end = filter_var($request->input('end_time_hr').':'.$request->input('end_time_min').' '.$request->input('end_time_am'), FILTER_SANITIZE_STRING);
    //         $business->max_post = filter_var($request->input('max_post'), FILTER_SANITIZE_STRING);
    //         $business->time_zone = filter_var($request->input('time_zone'), FILTER_SANITIZE_STRING);
    //     }
    //     Session::flash('success', 'Successfully Created');
    //     $business->save();
    //     return redirect('/business/set-social/'.$request->input('b_id'));
    // }

    public function social_form($id)
    {
        $inId = $id;
        $social_platform = SocialPlatform::get();
        return view('add-social-setup', compact('social_platform', 'inId'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajaxBus($id)
    {
        $social = SocialConnection::where('business_id', $id)->get();
        $data = Business::where('business.user_id', Auth::user()->id)->where('business.id', $id)->leftjoin('posts', 'posts.user_id', 'business.user_id')->where('posts.business', 'like', '%'.$id.'%')->orWhere('posts.business', 'like', '%,'.$id.'%')->orWhere('posts.business', 'like', '%'.$id.',%')->orderby('posts.updated_at', 'DESC')->take('1')
        ->select(
            'business.id as b_id',
            'business.b_name as b_name',
            'business.address as b_address',
            'posts.id as pid',
            'posts.posting_time as posting_time'
        )->get();
        if (count($data) == 0) {
            $data = Business::where('business.user_id', Auth::user()->id)->where('business.id', $id)->leftjoin('posts', 'posts.user_id', 'business.user_id')->orderby('posts.updated_at', 'DESC')->take('1')
        ->select(
            'business.id as b_id',
            'business.b_name as b_name',
            'business.address as b_address',
            'posts.id as pid',
            'posts.posting_time as posting_time'
        )->get();
        }
        return array($data, $social);
    }

    public function show($id)
    {
    $emails = SetupMail::where('business_id', $id)->orderBy('sent_on', 'desc')->get();
        $business = Business::where('id', $id)->first();
        $upcoming_posts = Posts::where('business', $id)->where('check_posted',false)->whereDate('posting_time', '>=', date('Y-m-d', time()))->orderBy('posting_time', 'asc')->get();
        $log_posts = Posts::where('business', $id)->where('check_posted',true)->whereDate('posting_time', '<=', date('Y-m-d', time()))->orderBy('posting_time', 'desc')->get();
        $socials = SocialConnection::where('business_id', $id)->get();
        $images = ImageGallery::where('user_id', Auth::user()->id)->get();
        return view('view-business', compact('business', 'upcoming_posts', 'socials', 'log_posts', 'images' , 'emails' ));
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
    public function all_schedule()
    {
        $post = [];
        $fb = [];
        $tw = [];
        $in = [];
        $gb = [];
        $pc = 0;
        $business = Business::where('user_id', Auth::user()->id)->get();
        $posts = Posts::whereDate('posting_time', '>=',date('Y-m-d'))->whereMonth('posting_time',date('m'))->get();
        foreach($business as $bus){
            $pp = Posts::whereMonth('posting_time',date('m'))->whereYear('posting_time',date('Y'))->where('business', $bus->id)->orderBy('posting_time', 'asc')->get();
            for($i=1; $i<=date('t');$i++){
                foreach($pp as $p){
                    if(date('j', strtotime($p->posting_time)) == $i){; 
                        if(array_key_exists($bus->id, $post) && array_key_exists($i, $post[$bus->id])){
                            $post[$bus->id][$i] = $post[$bus->id][$i] + 1;
                        }
                        else{
                            $post[$bus->id][$i] =  1;
                        }
                        $fb[$bus->id][$i] = $p->fb_share_active;
                        $tw[$bus->id][$i] = $p->tw_share_active;
                        $in[$bus->id][$i] = $p->in_share_active;
                        $gb[$bus->id][$i] = $p->gb_share_active;
                        
                    }
                }
            }
        }
       
        return view('post-scheduling', compact('business', 'posts', 'post', 'fb', 'tw', 'in', 'gb'));
    }
    public function view_schedule($id)
    {
        $business = Business::where('id', $id)->first();
        $posts = Posts::where('business', 'like', $id)->orWhere('business', 'like', '%'.$id.',%')->orWhere('business', 'like', '%,'.$id.'%')->get();
        $socialplatform = SocialPlatform::get();
        
        return $posts;
    }
    public function posting_schedule(Request $request, $id)
    {
        $business = Business::where('id', $id)->first();
        $socialplatform = SocialPlatform::get();
        for ($i=1; $i<=$socialplatform->count(); $i++) {
            $m_goals[] = $request->input('m_goal-'.$i);
        }
        $business->monthly_goal = implode(',', $m_goals);
        $business->save();
        Session::flash('success', 'Successfully Updated');
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $business = Business::where('id', $id)->first();
        if ($request->input('business_type') == 'local') {
            $business->b_type = filter_var($request->input('business_type'), FILTER_SANITIZE_STRING);
            $business->b_name = filter_var($request->input('l_bus_name'), FILTER_SANITIZE_STRING);
            $business->category = filter_var($request->input('l_bus_category'), FILTER_SANITIZE_STRING);
            $business->phone = filter_var($request->input('l_bus_phone'), FILTER_SANITIZE_STRING);
            $business->address = filter_var($request->input('l_bus_address'), FILTER_SANITIZE_STRING);
            $business->city = filter_var($request->input('l_bus_city'), FILTER_SANITIZE_STRING);
            $business->state = filter_var($request->input('l_bus_state'), FILTER_SANITIZE_STRING);
            $business->zip = filter_var($request->input('l_bus_zip'), FILTER_SANITIZE_STRING);
            $business->website = filter_var($request->input('l_bus_website'), FILTER_SANITIZE_STRING);
            $business->contact_fname = filter_var($request->input('l_bus_fname'), FILTER_SANITIZE_STRING);
            $business->contact_lname = filter_var($request->input('l_bus_lname'), FILTER_SANITIZE_STRING);
            $business->contact_title = filter_var($request->input('l_bus_title'), FILTER_SANITIZE_STRING);
            $business->contact_email = filter_var($request->input('l_bus_con_email'), FILTER_SANITIZE_STRING);
            $business->contact_phone = filter_var($request->input('l_bus_con_phone'), FILTER_SANITIZE_STRING);
        }
        if ($request->input('business_type') == 'online') {
            $business->b_type = filter_var($request->input('business_type'), FILTER_SANITIZE_STRING);
            $business->b_name = filter_var($request->input('o_bus_name'), FILTER_SANITIZE_STRING);
            $business->category = filter_var($request->input('o_bus_category'), FILTER_SANITIZE_STRING);
            $business->niche = filter_var($request->input('o_bus_niche'), FILTER_SANITIZE_STRING);
            $business->website = filter_var($request->input('o_bus_website'), FILTER_SANITIZE_STRING);
            $business->contact_fname = filter_var($request->input('o_bus_fname'), FILTER_SANITIZE_STRING);
            $business->contact_lname = filter_var($request->input('o_bus_lname'), FILTER_SANITIZE_STRING);
            $business->contact_title = filter_var($request->input('o_bus_title'), FILTER_SANITIZE_STRING);
            $business->contact_email = filter_var($request->input('o_bus_con_email'), FILTER_SANITIZE_STRING);
            $business->contact_phone = filter_var($request->input('o_bus_con_phone'), FILTER_SANITIZE_STRING);
        }
        Session::flash('success', 'Successfully Created');
        $business->save();
        return redirect()->back();
    }
    
    public function updateMG(Request $request){
        $bus = $request->input('bid');
        $fb = $request->input('fb_goal');
        $tw = $request->input('tw_goal');
        $in = $request->input('in_goal');
        $gb = $request->input('gb_goal');
        $business = Business::where('id', $bus)->first();
        $business->fb_monthly_goals = $fb;
        $business->tw_monthly_goals = $tw;
        $business->in_monthly_goals = $in;
        $business->gb_monthly_goals = $gb;
        $business->save();
        Session::flash('success', 'Successfully Updated');
        return redirect()->back();

    }
    
    public function logo(Request $request){

        $folderPath = public_path('business-logo/');
        if($request->old != ''){
            $oldfile = $folderPath . $request->old;
            \File::delete($oldfile);
        }
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $f_name = uniqid() . '.png';
        $file = $folderPath . $f_name ;

        file_put_contents($file, $image_base64);
        
        $business = Business::where('id', $request->bid)->first();
        $business->business_logo = $f_name;
        $business->save();
        Session::flash('success', 'Successfully Uploaded');
        return response()->json(['success'=>'Successfully Uploaded']);
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business = Business::where('id', $id)->first();
        
        $post= Posts::where('business', $id)->get();
        if ($business != null) {
            Session::flash('success', 'Successfully Deleted');
            $business->socialconnection()->delete();
            $business->delete();
            $post->each->delete();
        }
        return redirect()->back();
    }
}
