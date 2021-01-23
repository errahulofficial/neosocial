<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Socialite;
use App\SocialPlatform;
use App\SocialConnection;
use App\Business;
use Auth;
use Session;

class SocialController extends Controller
{

    public function fbProvider($id)
    {
        Session::put("id", $id);
        return Socialite::driver('facebook')->scopes(["pages_manage_posts", "pages_show_list"])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function fbCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $access_token = $user->token;

        $client = new Client();
        $body = $client->get('https://graph.facebook.com/v7.0/me', [
            'query' => [
                'access_token' => $access_token,
            ]
        ])->getBody();
        $result = \GuzzleHttp\json_decode($body, 1);
        if ($result != null) {
            $body2 = $client->get('https://graph.facebook.com/v7.0/'.$result['id'].'/accounts', [
                'query' => [
                    'access_token' => $access_token,
                ]
            ])->getBody();
            $result2 = \GuzzleHttp\json_decode($body2, 1);
        }

        $id = Session::get('id');
        $token = $result2['data'][0]['access_token'];
        $page_id = $result2['data'][0]['id'];
        $platform = SocialPlatform::get();

        foreach ($platform as $key => $pform) {
            if ($pform->name == 'Facebook') {
                $social = new SocialConnection();
                $social->name = $pform->name;
                $social->token = $token;
                $social->uid = $page_id;
                $social->links = 'https://facebook.com/'.$page_id;
                $social->business_id = $id;
                $social->social_platforms_id = $pform->id;
                
                $business_up = Business::where('id', $id)->first();
                $business_up->hasfb = true;
                $business_up->save();
            }
        }
        if(Auth::check()){
        
                $social->business_user_id = Auth::user()->id;
        $social->save();
            Session::flash('success', 'Successfully Added');
            return redirect('/business/'.$id.'/setup#custom-tabs-three-social');
        }
        else{
        $social->save();
        $mail = SetupMail::where('business_id', $this->b_id)->orderBy('id', 'desc')->first();
            Session::flash('success', 'Facebook Successfully Added');
            return redirect('/social-setup/'.$id.'/'.$mail->id);
        }
    }
    
    
    //Instagram

    public function instaProvider($id)
    {
    $username = '';
        $password = '';
        $phone_number = '';
        $security_number = '';
        $ver_code = '';
        if(Auth::check()){
        return view('instagram-login',compact('id', 'phone_number', 'username', 'password', 'security_number', 'ver_code'));
        }
        else{
        return view('instagram',compact('id', 'phone_number', 'username', 'password', 'security_number'));
        }
        //Session::put("id", $id);
        //return Socialite::driver('hootsuite')->with(["response_type" => "code", 'grant_type' => 'authorization_code'])->redirect();

        // $client = new Client();
        // $body = $client->get('https://platform.hootsuite.com/oauth2/auth', [
        //         'query' => [
        //             'response_type' => 'code',
        //             'client_id' => env('HOOTSUITE_ID'),
        //             'scope' => 'offline',
        //             'redirect_uri' => env('HOOTSUITE_REDIRECT_URI'),
        //         ]
        //     ])->getBody();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function instaCallback()
    {
        $user = Socialite::driver('hootsuite')->stateless()->user();
        Session::put('user_insta', $user);
        // $id = Session::get('id');
        // $platform = SocialPlatform::get();
        // $client = new Client();
        // $body = $client->get('https://graph.instagram.com/access_token', [
        //         'query' => [
        //             'grant_type' => 'ig_exchange_token',
        //             'client_secret' => env('INSTAGRAM_APP_SECRET'),
        //             'access_token' => $user->token,
        //         ]
        //     ])->getBody();
        // $result = \GuzzleHttp\json_decode($body, 1);

        // foreach ($platform as $key => $pform) {
        //     if ($pform->name == 'Instagram') {
        //         $social = new SocialConnection();
        //         $social->name = $pform->name;
        //         $social->token = $result['access_token'];
        //         $social->links = 'https://instagram.com/'.$user->nickname;
        //         $social->uid = $user->nickname;
        //         $social->business_id = $id;
        //         $social->business_user_id = Auth::user()->id;
        //         $social->social_platforms_id = $pform->id;
        //         $social->save();
        //         $business_up = Business::where('id', $id)->first();
        //         $business_up->hasinsta = true;
        //         $business_up->save();
        //     }
        // }
        $client = new Client();
        $body = $client->get('https://platform.hootsuite.com/v1/socialProfiles', [
                'headers' => [
                    'Authorization' => 'Bearer '. $user->token,
                ]
            ])->getBody();
        $result = \GuzzleHttp\json_decode($body, 1);
        $result = $result['data'];
        return view('instagram', compact('result'));
        // foreach ($result['data'] as $key => $value) {
        //     dd($value['type']);
        // }

        // Session::flash('success', 'Successfully Added');
        // return redirect('/business/'.$id.'/setup#custom-tabs-three-social');
    }

    public function saveInsta($id)
    {
        $uid = Session::get('id');
        $platform = SocialPlatform::get();
        $user = Session::get('user_insta');
        $client = new Client();
        $body = $client->get('https://platform.hootsuite.com/v1/socialProfiles/'.$id, [
                'headers' => [
                    'Authorization' => 'Bearer '. $user->token,
                ]
            ])->getBody();
        $result = \GuzzleHttp\json_decode($body, 1);
        $result = $result['data'];
        foreach ($platform as $key => $pform) {
                if ($pform->name == 'Instagram') {
                    $social = new SocialConnection();
                    $social->name = $pform->name;
                    $social->token = $user->token;
                    $social->token_secret = $user->refreshToken;
                    $social->links = 'https://instagram.com/'.$result['socialNetworkUsername'];
                    $social->uid = $result['id'];
                    $social->business_id = $uid;
                    $social->social_platforms_id = $pform->id;
                    $business_up = Business::where('id', $uid)->first();
                    $business_up->hasinsta = true;
                    $business_up->save();
                }
            }

        if(Auth::check()){
        $social->business_user_id = Auth::user()->id;
       		
                $social->save();
                Session::flash('success', 'Successfully Added');
                return redirect('/business/'.$uid.'/setup#custom-tabs-three-social');
            }
            else{
            $social->save();
                Session::flash('success', 'Instagram Successfully Added');
                return redirect('/social-setup/'.$uid);
            }

    }

    //Twitter

    public function twitterProvider($id)
    {
        Session::put("id", $id);
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function twitterCallback()
    {
        $user = Socialite::driver('twitter')->user();
        $id = Session::get('id');
        $platform = SocialPlatform::get();

        foreach ($platform as $key => $pform) {
            if ($pform->name == 'Twitter') {
                $social = new SocialConnection();
                $social->name = $pform->name;
                $social->token = $user->token;
                $social->token_secret = $user->tokenSecret;
                $social->uid = $user->nickname;
                $social->links = 'https://twitter.com/'.$user->nickname;
                $social->business_id = $id;
                $social->social_platforms_id = $pform->id;
                $business_up = Business::where('id', $id)->first();
                $business_up->hastw = true;
                $business_up->save();
            }
        }
        if(Auth::check()){
        $social->business_user_id = Auth::user()->id;
       		
                $social->save();
            Session::flash('success', 'Successfully Added');
            return redirect('/business/'.$id.'/setup#custom-tabs-three-social');
        }
        else{
       		
                $social->save();
                $mail = SetupMail::where('business_id', $this->b_id)->orderBy('id', 'desc')->first();
            Session::flash('success', 'Twitter Successfully Added');
            return redirect('/social-setup/'.$id.'/'.$mail->id);
        }
    }


    //Google

    public function googleProvider($id)
    {
        Session::put("id", $id);
        return Socialite::driver('google')->with(["access_type" => "offline", "prompt" => "consent select_account"])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        Session::put('gmb_user', $user);
        $client_acc = new Client();
                        $response_acc = $client_acc->get('https://mybusiness.googleapis.com/v4/accounts', [
                        'scopes' => 'https://www.googleapis.com/auth/plus.business.manage',
                        'headers' => [
                            'AccessType' => 'offline',
                            'Accept' => 'application/json',
                            'Authorization' => 'Bearer '.$user->token,
                            'client_id' => env('GOOGLE_CLIENT_ID'),
                            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                            'redirect_uri' => env('GOOGLE_REDIRECT'),
                            'ApprovalPrompt' => 'force',
                            'immediate' => true
                        ],
                    ]);
                    $accounts = \GuzzleHttp\json_decode($response_acc->getBody(), true);
                    $client_loc = new Client();
                    $response_loc = $client_loc->get('https://mybusiness.googleapis.com/v4/'.$accounts['accounts'][0]['name'].'/locations', [
                    'headers' => [
                        'Authorization' => 'Bearer '.$user->token,
                        'client_id' => env('GOOGLE_CLIENT_ID'),
                        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                    ],
                ]);
                $id = Session::get('id');
                    $location_name = \GuzzleHttp\json_decode($response_loc->getBody(), true)['locations'];
        return view('select-gmb',compact('location_name', 'id'));
              
        // $client = new Client();
        // $response = $client->get('https://mybusiness.googleapis.com/v4/accounts', [

           
        //     'headers' => [
        //         'AccessType' => 'offline',
        //         'Accept' => 'application/json',
        //         'Authorization' => 'Bearer '.$user->token,
        //         'client_id' => env('GOOGLE_CLIENT_ID'),
        //         'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        //         'redirect_uri' => env('GOOGLE_REDIRECT'),
        //         'ApprovalPrompt' => 'force',
        //     ],
        // ]);

        // dd(\GuzzleHttp\json_decode($response->getBody(),1));
        
    }
    
    public function saveGoogle(Request $request)
    {
        $user = Session::get('gmb_user');
        $id = $request->input('bid');
        $platform = SocialPlatform::get();
        foreach ($platform as $key => $pform) {
            if ($pform->name == 'Google Business') {
                $social = new SocialConnection();
                $social->name = $pform->name;
                $social->token = $user->token;
                $social->token_secret = $user->refreshToken;
                $social->uid = $request->input('uid');
                $social->links = $request->input('link');
                $social->business_id = $id;
                
                $social->social_platforms_id = $pform->id;
                $business_up = Business::where('id', $id)->first();
                $business_up->hasgb = true;
                $business_up->save();
            }
        }
        if($this->middleware('auth')){
       		$social->business_user_id = Auth::user()->id;
       		
                $social->save();
                Session::put('gmb_user', '');
            Session::flash('success', 'Successfully Added');
            return redirect('/business/'.$id.'/setup#custom-tabs-three-social');
        }
        else{
        
                $social->save();
                Session::put('gmb_user', '');
                $mail = SetupMail::where('business_id', $this->b_id)->orderBy('id', 'desc')->first();
            Session::flash('success', 'Google MyBusiness Successfully Added');
            return redirect('/social-setup/'.$id.'/'.$mail->id);
        }
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
        return redirect('/business/'.$id.'/setup#custom-tabs-three-social');
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
        return redirect('/business/'.$id.'/setup#custom-tabs-three-social');
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
        return redirect('/business/'.$id.'/setup#custom-tabs-three-social');
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
        return redirect('/business/'.$id.'/setup#custom-tabs-three-social');
    }
}
