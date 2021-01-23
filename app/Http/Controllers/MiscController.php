<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\SetupMail;
use App\User;
use App\SocialConnection;
use Session;
use Mail;
use App\Mail\EmailSend;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Auth;

class MiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $mid)
    {
    	$clicked = SetupMail::where('id', $mid)->first();
        $clicked->clicked_on = date('Y-m-d H:i:s', time());
        $clicked->save();
        $business = Business::where('id', $id)->first();
        $facebook = SocialConnection::where('business_id', $id)->where('name', 'Facebook')->first();
        $twitter = SocialConnection::where('business_id', $id)->where('name', 'Twitter')->first();
        $insta = SocialConnection::where('business_id', $id)->where('name', 'Instagram')->first();
        $google = SocialConnection::where('business_id', $id)->where('name', 'Google Business')->first();
        return view('add-social', compact('business', 'facebook', 'twitter', 'insta', 'google'));
    }

    public function fbDelete($id)
    {
        $social = SocialConnection::where('name', 'Facebook')->where('business_id', $id)->first();
        
        if ($social != null) {
            $business = Business::where('id', $id)->first();
            $business->hasfb = false;
            $business->save();
            Session::flash('success', 'Successfully Deleted');
            $social->delete();
        }
        return redirect()->back();
    }


    public function instaDelete($id)
    {
        $social = SocialConnection::where('name', 'Instagram')->where('business_id', $id)->first();
        
        if ($social != null) {
            $business = Business::where('id', $id)->first();
            $business->hasinsta = false;
            $business->save();
            Session::flash('success', 'Successfully Deleted');
            $social->delete();
        }
        return redirect()->back();
    }


    public function twitterDelete($id)
    {
        $social = SocialConnection::where('name', 'Twitter')->where('business_id', $id)->first();
        
        if ($social != null) {
            $business = Business::where('id', $id)->first();
            $business->hastw = false;
            $business->save();
            Session::flash('success', 'Successfully Deleted');
            $social->delete();
        }
        return redirect()->back();
    }


    public function googleDelete($id)
    {
        $social = SocialConnection::where('name', 'Google Business')->where('business_id', $id)->first();
        
        if ($social != null) {
            $business = Business::where('id', $id)->first();
            $business->hasgb = false;
            $business->save();
            Session::flash('success', 'Successfully Deleted');
            $social->delete();
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mailSend(Request $request , $bid)
    {
        if(Auth::check()){
            $agency = User::where('id', Auth::user()->id)->first();
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $b_id = $request->input('bus_id');
            $subject = $request->input('subject');
            $cc = $request->input('ccto');
            $sendto = $request->input('sendto');
            $business = Business::where('id', $b_id)->first();
            
            $mail_status = new SetupMail();
            $mail_status->sendto = $sendto;
            $mail_status->ccto = $cc;
            $mail_status->subject = $subject;
            $mail_status->fname = $fname;
            $mail_status->lname = $lname;
            $mail_status->business_id = $b_id;
            $mail_status->save();
                
            $data_base[0]['body'] = $request->input('mail_body');
            $vars = array(
                '[Contact First Name]'       =>  $business->contact_fname,
                '[Agency Phone number]'        =>  $agency->company_phone,
                '[Agency email]'        =>  $agency->email,
                '[Agency owner name]'       =>  $agency->contact_name,
                '<a href="'.url('/social-setup/'.$b_id).'"'       =>  '<a href="'.url('/social-setup/'.$b_id.'/'.$mail_status->id).'"',
                '<img src="'.asset('/img/blank.png').'"'   =>  '<img src="'.asset('/img/blank.png?id='.$mail_status->id).'"');
            $mailBodyData =  strtr($data_base[0]['body'], $vars);
            $TestMail = new \stdClass();
            $TestMail->emailSubject = $subject;
            $TestMail->mailBodyData = $mailBodyData;

            $update_email = SetupMail::where('id',$mail_status->id)->first();
            $update_email->content =  $mailBodyData;
            $update_email->sent_on =  date('Y-m-d H:i:s', time());
            $update_email->save();
            
            if($cc != ''){
            	Mail::to($sendto)->cc($cc)->send(new EmailSend($TestMail));
            }
            else{
            	Mail::to($sendto)->send(new EmailSend($TestMail));
            }
            Session::flash('success', 'Successfully Sent');
            return  redirect('/business/'.$b_id.'/setup#custom-tabs-three-social');;
        }
    }
    
    
    
     public function invitEmailOpen()
    {
    	$id = $_GET['id'];
        $open = SetupMail::where('id', $id)->first();
        $open->opened_on = date('Y-m-d H:i:s', time());
        $open->save();
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
        //
    }
}
