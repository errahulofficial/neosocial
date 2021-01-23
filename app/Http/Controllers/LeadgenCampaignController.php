<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeadgenCampaign;
use Redirect;
use Auth;
use Validate;
use DateTimeZone;
use DateTime;
use App\EmailSequence;
use App\User;
use Session;

class LeadgenCampaignController extends Controller
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
        $leads = LeadgenCampaign::where('user_id', Auth::user()->id)->get();
        return view('leadgen-campaign', compact('leads'));
    }

    public function addleadgen()
    {
        return view('add-leadgen-campaign');
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
        $leadgen = new LeadgenCampaign();
        if($request->input('business_type') == 'local'){
            $leadgen->b_type = filter_var($request->input('business_type'), FILTER_SANITIZE_STRING);
            $leadgen->b_name = filter_var($request->input('l_bus_name'), FILTER_SANITIZE_STRING);
            $leadgen->category = filter_var($request->input('l_bus_category'), FILTER_SANITIZE_STRING);
            $leadgen->phone = filter_var($request->input('l_bus_phone'), FILTER_SANITIZE_STRING);
            $leadgen->address = filter_var($request->input('l_bus_address'), FILTER_SANITIZE_STRING);
            $leadgen->city = filter_var($request->input('l_bus_city'), FILTER_SANITIZE_STRING);
            $leadgen->state = filter_var($request->input('l_bus_state'), FILTER_SANITIZE_STRING);
            $leadgen->zip = filter_var($request->input('l_bus_zip'), FILTER_SANITIZE_STRING);
            $leadgen->website = filter_var($request->input('l_bus_website'), FILTER_SANITIZE_STRING);
            $leadgen->contact_fname = filter_var($request->input('l_bus_fname'), FILTER_SANITIZE_STRING);
            $leadgen->contact_lname = filter_var($request->input('l_bus_lname'), FILTER_SANITIZE_STRING);
            $leadgen->contact_title = filter_var($request->input('l_bus_title'), FILTER_SANITIZE_STRING);
            $leadgen->contact_email = filter_var($request->input('l_bus_con_email'), FILTER_SANITIZE_STRING);
            $leadgen->contact_phone = filter_var($request->input('l_bus_con_phone'), FILTER_SANITIZE_STRING);
        }  
        else if($request->input('business_type') == 'online'){
            $leadgen->b_type = filter_var($request->input('business_type'), FILTER_SANITIZE_STRING);
            $leadgen->b_name = filter_var($request->input('o_bus_name'), FILTER_SANITIZE_STRING);
            $leadgen->category = filter_var($request->input('o_bus_category'), FILTER_SANITIZE_STRING);
            $leadgen->niche = filter_var($request->input('o_bus_niche'), FILTER_SANITIZE_STRING);
            $leadgen->website = filter_var($request->input('o_bus_website'), FILTER_SANITIZE_STRING);
            $leadgen->contact_fname = filter_var($request->input('o_bus_fname'), FILTER_SANITIZE_STRING);
            $leadgen->contact_lname = filter_var($request->input('o_bus_lname'), FILTER_SANITIZE_STRING);
            $leadgen->contact_title = filter_var($request->input('o_bus_title'), FILTER_SANITIZE_STRING);
            $leadgen->contact_email = filter_var($request->input('o_bus_con_email'), FILTER_SANITIZE_STRING);
            $leadgen->contact_phone = filter_var($request->input('o_bus_con_phone'), FILTER_SANITIZE_STRING);
        }  
        
        $leadgen->experience_type = filter_var($request->input('experience_type'), FILTER_SANITIZE_STRING);
        if($request->input('experience_type') == '1'){
            $leadgen->experience_descp = filter_var($request->input('exp_descp'), FILTER_SANITIZE_STRING);
        }
        if($request->input('experience_type') == '2'){
            $leadgen->relation_with_customer = filter_var($request->input('relation_with_customer'), FILTER_SANITIZE_STRING);
            $leadgen->person_name = filter_var($request->input('person_name'), FILTER_SANITIZE_STRING);
            $leadgen->person_endorsement = filter_var($request->input('person_endorsement'), FILTER_SANITIZE_STRING);
        }
		$leadgen->buyer_type = filter_var($request->input('buyer_type'), FILTER_SANITIZE_STRING);
        $leadgen->user_id = Auth::user()->id;
        $leadgen->save();
        $profile = User::where('id',Auth::user()->id)->first();
        $time = date('Y-m-d H:i:s',time());
        for($i = 1; $i <= 5; $i++){
            if($request->input('email'.$i.'onoff') == '1'){
                $email_seq = new EmailSequence();
                $email_content = $request->input('email'.$i.'content');
                $email_content = str_replace('[POC Company Name]',$leadgen->b_name , $email_content);
                $email_content = str_replace('[POC City]',$leadgen->city , $email_content);
                $email_content = str_replace('[POC First Name]',$leadgen->contact_fname , $email_content);
                $email_content = str_replace('[POC Last Name]',$leadgen->contact_lname , $email_content);
                $email_content = str_replace('[POC Category]',$leadgen->category , $email_content);
                $email_content = str_replace('[Business Type]',$leadgen->b_type , $email_content);
                $email_content = str_replace('[POC Website]',$leadgen->website , $email_content);
                $email_content = str_replace('[Customer Type]',$leadgen->buyer_type , $email_content);
                $email_content = str_replace('[Case Study Link]','' , $email_content);
                $email_content = str_replace('[Agency Name]',$profile->company_name , $email_content);
                $email_content = str_replace('[Agency Signature]',$profile->company_name , $email_content);
                $email_content = str_replace('[Agency Phone]',$profile->company_phone , $email_content);
                $email_content = str_replace('[Agency Email]',$profile->email, $email_content);
                $email_content = str_replace('[Agent Name]',$profile->contact_name , $email_content);
                $email_content = str_replace('[Your Great Experience]',$leadgen->experience_descp , $email_content);
                $email_content = str_replace('[City]',$leadgen->city , $email_content);
                $email_content = str_replace('[1st Category]',$leadgen->category , $email_content);
                $email_content = str_replace('[Case Study]',"" , $email_content);
                $email_content = str_replace('[Relationship]',$leadgen->relation_with_customer , $email_content);
                $email_content = str_replace('[Relationship Name]',$leadgen->person_name , $email_content);
                $email_content = str_replace('[Endorsement]',$leadgen->person_endorsement , $email_content);
                $email_content = str_replace('[Profile Stats]',"", $email_content);
                
                $email_subject = $request->input('email'.$i.'subject');
                $email_subject = str_replace('[Buyer Type]',$leadgen->buyer_type , $email_subject);
                $email_subject = str_replace('[1st Category]',$leadgen->category , $email_subject);
                
                $email_seq->email_template = $email_content;
                $email_seq->subject = $email_subject;
                $email_seq->send_to = $leadgen->contact_email;
                $skip = $request->input('email'.$i.'number') .' '. $request->input('email'.$i.'day');
                $email_seq->send_schedule = date('Y-m-d H:i:s', strtotime('+'.$skip . $time));
                $email_seq->leadgen_campaign_id = $leadgen->id;
                $email_seq->save();

            }
        }
        
        Session::flash('success', 'Successfully Created');
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function leadsocialsetup($id)
    {
        $inId = $id;
        return view('lead-social', compact('inId'));
    }

    public function lead_social(Request $request)
    {
        $leadgen = LeadgenCampaign::where('id', $request->input('lead_id'))->first();
        if ($leadgen != null) {
            $leadgen->fb_page = $request->input('fb_page');
            $leadgen->save();
            Session::flash('success', 'Successfully Created');
            return redirect('/leadgen-campaign/customize/'.$request->input('lead_id'));
        }
        else{
            Session::flash('error', 'Failed to save Facebook URL. Try Again!');
            return redirect()->back();
        }
    }


    public function leadcustomize($id)
    {
        $inId = $id;
        return view('lead-customize', compact('inId'));
    }

    public function lead_customize(Request $request)
    {
        $leadgen = LeadgenCampaign::where('id', $request->input('lead_id'))->first();
        if ($leadgen != null) {
            $leadgen->experience_type = $request->input('experience_type');
            $leadgen->experience_descp = $request->input('experience_descp');
            $leadgen->niche = $request->input('niche');
            $leadgen->buyer_type = $request->input('buyer_type');
            $leadgen->save();
            Session::flash('success', 'Successfully Created');
            return redirect('/leadgen-campaign/email-setup/'.$request->input('lead_id'));
        }
        else{
            Session::flash('error', 'Failed to save Facebook URL. Try Again!');
            return redirect()->back();
        }
    }


    public function leademailsetup($id)
    {
        $inId = $id;
        $email1 = file_get_contents(resource_path('views/email1.txt'));
        $email2 = file_get_contents(resource_path('views/email2.txt'));
        $email3 = file_get_contents(resource_path('views/email3.txt'));
        $email4 = file_get_contents(resource_path('views/email4.txt'));
        $email5 = file_get_contents(resource_path('views/email5.txt'));
        $email = [$email1, $email2, $email3, $email4, $email5];
       
        $days = ['1'=>'1','2'=>'2','3'=>'3','4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '10'=>'10', '14'=>'14', '21'=>'21'];
        $hours = ['1'=>'1','2'=>'2','3'=>'3','4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7','8'=>'8','9'=>'9', '10'=>'10', '11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21','22'=>'22', '23'=>'23'];
        $minutes = ['0'=>'0','1'=>'1','5'=>'5','10'=>'10', '15'=>'15', '20'=>'20', '25'=>'25','30'=>'30','35'=>'35', '40'=>'40', '45'=>'45','50'=>'50','55'=>'55','60'=>'60'];
        return view('lead-email', compact('inId', 'email', 'days', 'hours', 'minutes'));
    }

    public function leademailsave(Request $request)
    {
        $this->validate($request, [
            'lead_id' => 'required|max:200',
			            
        ]);

        $lead = LeadgenCampaign::where('id', $request->input('lead_id'))->first();
        $profile = User::where('id', Auth::user()->id)->first();

        for($i=0; $i<5; $i++){
            $e_save = new EmailSequence();
            $e_save->subject = $request->input('subject-'.$i);
            $e_save->active_status = $request->input('active_status-'.$i);
            $e_save->leadgen_campaign_id = $request->input('lead_id');
            $date = time();
            //dd(date('c',strtotime('+2 days',$date)));
            $e_save->send_schedule = date('c',strtotime('+'.$request->input('numbers-'.$i).' '.$request->input('hr-min-'.$i) ,$date));
            $temp = $request->input('message'.$i);
            $temp = str_replace('[POC First Name]',$lead->contact_fname, $temp);
            $temp = str_replace('[POC Last Name]',$lead->contact_lname, $temp);
            $temp = str_replace('[POC Company Name]',$lead->b_name, $temp);
            $temp = str_replace('[POC City]',$lead->city, $temp);
            $temp = str_replace('[POC Category]',$lead->category, $temp);
            $temp = str_replace('[POC Website]',$lead->website, $temp);
            $temp = str_replace('[Customer Type]',$lead->buyer_type, $temp);
            $temp = str_replace('[Case Study Link]',$lead->fb_page, $temp);
            $temp = str_replace('[Your Great Experience]',$lead->experience_descp, $temp);
            $temp = str_replace('[Agency Name]',$profile->company_name, $temp);
            $temp = str_replace('[Agent Name]',$profile->contact_name, $temp);
            $temp = str_replace('[Agency Email]',$profile->email, $temp);
            $temp = str_replace('[Agency Phone]',$profile->company_phone, $temp);
            $temp = str_replace('[Agency Signature]',$profile->company_name, $temp);
            $temp = str_replace('[Business Type]',$lead->b_type, $temp);
            $e_save->email_template = $temp;
            $e_save->save();
            
        }
        Session::flash('success', 'Campaign Successfully');
            return redirect()->back();
    }


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leadgen = LeadgenCampaign::where('id', $id)->first();
        if($leadgen != null){
            Session::flash('success', 'Successfully Deleted');
            $leadgen->delete();
        }
        return redirect()->back();
    }
}
