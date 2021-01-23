<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\SocialConnection;
use App\Posts;
use App\Business;
use App\Graph;
use Image;
use File;

class LogDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $twresult = '';
        $p_data = [];
        $curr_date = date('Y-m-d H:i', time());
        $posts = Posts::whereMonth('posting_time', date('m'))->where('check_posted', false)->get();;
        foreach ($posts as $post) {
            $business = Business::where('id', $post->business)->get();
            foreach ($business as $busin) {
                date_default_timezone_set($busin->time_zone);
                $timestamp = strtotime($post->posting_time);
                date_default_timezone_set('UTC');
                $utcDateTime = date("Y-m-d H:i", $timestamp);
                $logo = '';
                $new_img = '';
                $fname = time().'.png';
        
                if ($curr_date == $utcDateTime) {
                    
                    if($post->logo_active == true && $busin->business_logo != ''){
                        
                        if(Image::make(asset('/'.$post->img_dir . '/' . $post->image))->height() < 400 ){
                            $new_img = Image::make(public_path($post->img_dir . '/' . $post->image))->resize(410, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }
                        else if(Image::make(asset('/'.$post->img_dir . '/' . $post->image))->width() < 300 ){
                            $new_img = Image::make(public_path($post->img_dir . '/' . $post->image))->resize(null, 310, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }
                        else{
                            $new_img = Image::make(public_path($post->img_dir . '/' . $post->image));
                        }

                        if($post->logo_type == 'Light Logo'){
                            $logo = Image::make(public_path('business-logo/'.$busin->business_logo))->resize(100, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $logo->opacity(50);
                        }
                        else if($post->logo_type == 'Dark Logo'){
                            $logo = Image::make(public_path('business-logo/'.$busin->business_logo))->resize(100, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $logo->greyscale();
                        }
                        else{
                            $logo = Image::make(public_path('business-logo/'.$busin->business_logo))->resize(100, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }
                        if($post->logo_position != ''){
                            $new_img->insert($logo, $post->logo_position, 10, 10);
                        }
                        else{
                            $new_img->insert($logo, 'bottom-right', 10, 10);
                        }

                        $new_img->save(public_path('post-thumbs/'.$fname)); 
                    }

                    if ($busin->hasfb != '0' && $post->fb_share_active != '0') {
                        try {
                            $social_fb = SocialConnection::where('business_id', $busin->id)->where('name', 'Facebook')->first();
                            $fb_token = $social_fb->token;
                            if($new_img != ''){
                                $p_image = asset('post-thumbs/'.$fname);
                            }
                            else if ($post->image_link == '') {
                                $p_image = asset('/'.$post->img_dir . '/' . $post->image);
                            } else {
                                $p_image = $post->image_link;
                            }
                            $client = new Client();
                            $body = $client->post('https://graph.facebook.com/v7.0/'.$social_fb->uid.'/photos', [
                        'query' => [
                            'message' => $post->post . ' ' . $post->post_link,
                            'url' => $p_image,
                            'link' => $post->post_link,
                            'caption' => $post->title,
                            'description' => $post->element,
                            'access_token' => $fb_token,
                        ]
                    ])->getBody();
                            $result = \GuzzleHttp\json_decode($body, 1);
                        } catch (Exception $e) {
                            $result = 'Message: ' .$e->getMessage();
                        }
                    }

                    if ($busin->hastw != '0' && $post->tw_share_active != '0') {
                        try {
                            $social_tw = SocialConnection::where('business_id', $busin->id)->where('name', 'Twitter')->first();
                            $tw_token = $social_tw->token;
                            $tw_secret = $social_tw->token_secret;
                            $p_status = $post->post;
                            if($new_img != ''){
                                $p_image = public_path('post-thumbs/'.$fname);
                            }
                            else {
                                $p_image = public_path($post->img_dir . '/' . $post->image);
                            }
                            $twitter = new TwitterOAuth(env('TWITTER_APP_ID'), env('TWITTER_APP_SECRET'), $tw_token, $tw_secret);
                            $media = $twitter->upload('media/upload', array('media' => $p_image));
                            $status = $twitter->post("statuses/update", ["status" => $p_status,'media_ids'  => $media->media_id_string]);
                        } catch (Exception $e) {
                            $status= 'Message: ' .$e->getMessage();
                        }
                    }
                    
                    if ($busin->hasinsta != '0' && $post->in_share_active != '0') {
                        $en_key = "NEOSOCIAL";
                        $en_iv = 'neosocial.neodev';
                        $ciphering = "AES-128-CTR";
                        $social_in = SocialConnection::where('business_id', $busin->id)->where('name', 'Instagram')->first();
                        $in_token = $social_in->token;
                        $username = $social_in->uid;
                        if($new_img != ''){
                            $p_image = public_path('post-thumbs/'.$fname);
                        }
                        else {
                            $p_image = public_path('/'.$post->img_dir . '/' . $post->image);
                        }
                        $password = base64_decode(openssl_decrypt ($in_token, $ciphering, $en_key, '0', $en_iv));
                        $debug = true;
                        $truncatedDebug = false;
                        $photoFilename = $p_image;
                        $captionText =  $post->post;
                        $ig = new \InstagramAPI\Instagram($debug, $truncatedDebug, [
		            'storage'    => 'mysql',
		            'dbhost'     => env('DB_HOST'),
		            'dbname'     => env('DB_DATABASE'),
		            'dbusername' => env('DB_USERNAME'),
		            'dbpassword' => env('DB_PASSWORD'),
		            'dbtablename'=> "sp_instagram_sessions"
		        ]);

                        try {
                            $ig->login($username, $password);
                        } catch (\Exception $e) {
                            \Log::info('Something went wrong: '.$e->getMessage());
                            
                        }

                        try {
                            $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename);
                            $ig->timeline->uploadPhoto($photo->getFile(), ['caption' => $captionText]);
                        } catch (\Exception $e) {
                           \Log::info('Something went wrong : '.$e->getMessage());
                        }
                    }

                    if ($busin->hasgb != '0' && $post->gb_share_active != '0') {
                        $social_gb = SocialConnection::where('business_id', $busin->id)->where('name', 'Google Business')->get();
                    
                        foreach ($social_gb as $gb) {
                            $gb_token = $gb->token;
                            $gb_token_secret = $gb->token_secret;
                            $gb_uid = $gb->uid;
                        }
                        $scopes = [
                        'https://www.googleapis.com/auth/plus.business.manage'
                    ];
                        $form_data = ['form_params' => array(
                        'grant_type' => 'refresh_token',
                        'client_id' => env('GOOGLE_CLIENT_ID'),
                        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                        'redirect_uri' => env('GOOGLE_REDIRECT'),
                        'refresh_token' => $gb_token_secret,
                        'scope' => $scopes,
                    )];
                        $client = new Client();
                        $response = $client->post('https://www.googleapis.com/oauth2/v4/token', $form_data);

                        $access_token = \GuzzleHttp\json_decode($response->getBody(), true)['access_token'];
                        if($new_img != ''){
                            $p_image = asset('post-thumbs/'.$fname);
                        }
                        else if ($post->image_link == '') {
                            $p_image = asset('/'.$post->img_dir . '/' . $post->image);
                        } else {
                            $p_image = $post->image_link;
                        }
                        $post_data = array(
                        'name' => $post->post,
                        'searchUrl' => $post->post_link,
                        'summary' => $post->post,
                        'media' => array(
                            'mediaFormat' => 'PHOTO',
                            'sourceUrl' => $p_image
                            )
                        );
                       
                        try {
                            $client_post = new Client();
                            $response_post = $client_post->post('https://mybusiness.googleapis.com/v4/'.$gb_uid.'/localPosts', [
                        'json' => $post_data,
                        'headers' => [
                            'Authorization' => 'Bearer '.$access_token,
                            'client_id' => env('GOOGLE_CLIENT_ID'),
                            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                        ],
                    ]);
                    
                            $location_post = \GuzzleHttp\json_decode($response_post->getBody(), true);
                        } catch (Exception $e) {
                            $location_post = 'Message: ' .$e->getMessage();
                        }
                    }
                    \Log::info("i am online at ". date('r',time()));
                    $post_update = Posts::where('id', $post->id)->first();
	            $post_update->check_posted = true;
	            $post_update->save();
	            
	             $graph = Graph::first();
            if(date('Y-m-d',strtotime($graph->updated_at)) == date('Y-m-d')){
                $show_data = explode(',',$graph->total_graph);
                $last = array_pop($show_data);
                $incre = $last + 1;
                array_push($show_data, $incre);
                $graph->total_graph = implode($show_data);
                $graph->save();
            }
            else{
                $show_data = explode(',',$graph->total_graph);
                $last = array_shift($show_data);
                array_push($show_data, 1);
                $graph->total_graph = implode($show_data);
                $graph->save();
            }
                }
            }
            
        }
        
    }
    
}
