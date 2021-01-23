<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Posts;
use App\User;
use App\Business;
use App\HootsuitePosts;
use App\Group;
use App\SocialPlatform;
use App\SocialConnection;
use App\ImageGallery;
use DateTime;
use App\PostPackage;
use File;
use Session;
use Auth;
use Image;

class PostController extends Controller
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
        $post = Posts::get();
        return response()->json($post);
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
    
    public function addsingle()
    {
        $post_time = [];
        $business =  Business::where('user_id', Auth::user()->id)->get();
        foreach ($business as $busin) {
            $post_time[$busin->id] = Posts::where('user_id', Auth::id())->where('business', $busin->id)->orderBy('posting_time', 'desc')->first();

            if ($post_time[$busin->id] == null || strtotime($post_time[$busin->id]->posting_time) < time()) {
                $post_time[$busin->id]['posting_time'] = date('Y-m-d 
                
                ', time());
            } else {
                $post_time[$busin->id]['posting_time'] = $post_time[$busin->id]->posting_time;
            }
        }
        $b_data =  Business::where('user_id', Auth::user()->id)->pluck('b_name', 'id');
        $g_data =  Group::where('user_id', Auth::user()->id)->pluck('name', 'id');
        $imgs =  ImageGallery::where('user_id', Auth::user()->id)->get();
        $socon = SocialConnection::where('business_user_id', Auth::user()->id)->get();
        $social = SocialPlatform::get();
        return view('add-single-post', compact('social', 'b_data', 'g_data', 'imgs', 'socon', 'business', 'post_time'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageStore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                                   
        ]);
        $file = $request->file('image');
        $folder_name = date('Ymd') . '_' . mt_rand(1000, 990000);
        File::makeDirectory(public_path() . '/post_images/'. $folder_name, 0777, true);
        $destinationPath = ('post_images/'. $folder_name);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);
        $imagename = $string . '.' . $file->getClientOriginalExtension();
        $save_img = Image::make($file->getRealPath());
        $save_img->save($destinationPath . '/' . $imagename, 100);

        $img_gallery = new ImageGallery();
        $img_gallery->image = $imagename;
        $img_gallery->img_dir = $destinationPath;
        $img_gallery->category = 'image';
        $img_gallery->user_id = Auth::user()->id;
        $img_gallery->save();
        return redirect()->back();
    }
    
    public function store(Request $request)
    {
      $this->validate($request, [
            'post' => 'required|max:300',
            'image' => 'required_without:image_select|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_select' => 'required_without:image',
            'business'=>'required_without:group',
            'group'=>'required_without:business',
                                   
        ]);
        $post_id = '';
        $image_path = '';
        $imagename = '';
        $destinationPath = '';
        $image_link = '';
        if($request->file('image') != ''){
          $file = $request->file('image');
        $folder_name = date('Ymd') . '_' . mt_rand(1000, 990000);
        File::makeDirectory(public_path() . '/post_images/'. $folder_name, 0777, true);
        $destinationPath = ('post_images/'. $folder_name);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);
        $imagename = $string . '.' . $file->getClientOriginalExtension();
        $save_img = Image::make($file->getRealPath());
        $save_img->save($destinationPath . '/' . $imagename, 100);

        $img_gallery = new ImageGallery();
        $img_gallery->image = $imagename;
        $img_gallery->img_dir = $destinationPath;
        $img_gallery->category = 'image';
        $img_gallery->user_id = Auth::user()->id;
        $img_gallery->save();
        $img =  ImageGallery::where('id', $img_gallery->id)->first();
        if ($img != null) {
            $imagename = $img->image;
            $destinationPath = $img->img_dir;
            $image_link = asset('/'.$destinationPath.'/'.$imagename);
            $image_path = public_path($destinationPath.'/'.$imagename);
        }
        }
        $image =  ImageGallery::where('id', $request->input('image_select'))->first();
        if ($image != null) {
            $imagename = $image->image;
            $destinationPath = $image->img_dir;
            $image_link = asset('/'.$destinationPath.'/'.$imagename);
            $image_path = public_path($destinationPath.'/'.$imagename);
        }
        if ($request->input('group') == '') {
            $busi = $request->input('business');
        } else {
            $group = Group::where('id', $request->input('group'))->first();
            $busi = explode(',', $group->business);
        }
        
        //$image_header = get_headers($image_link, 1);
        $profile = User::where('id', Auth::user()->id)->first();
        $post = $request->input('post');
        $post = str_replace("[Company Name]", $profile->company_name, $post);
        $post = str_replace("[Owner's Name]", $profile->contact_name, $post);
        $post = str_replace('[Phone Number]', $profile->company_phone, $post);
        $post = str_replace('[Address]', $profile->company_address, $post);
        $post = str_replace('[Niche]', $profile->niche, $post);
        foreach ($busi as $key => $bus) {
            $post_data = new Posts();
            $post_data->post = $post;
            $post_data->image = $imagename;
            $post_data->img_dir = $destinationPath;
            $post_data->image_link = $image_link;
            $post_data->fb_share_active = $request->input('fb_share');
            $post_data->tw_share_active = $request->input('tw_share');
            $post_data->gb_share_active = $request->input('gb_share');
            $post_data->in_share_active = $request->input('in_share');
            $post_data->logo_active = $request->input('logo_active');
            $post_data->logo_type = $request->input('logo_type');
            $post_data->logo_position = $request->input('logo_position');
       
            $post_data->schedule_status = $request->input('schedule_status'.$bus);
            $post_data->post_status = $request->input('post_status'.$bus);
            if ($request->input('date') != '' && $request->input('time') != '') {
                $posting_time = date('Y-m-d H:i:s', strtotime($request->input('date') .' '. $request->input('time')));
            } else {
                $posting_time = date('Y-m-d H:i:s', strtotime($request->input('date_schedule'.$bus) . ' ' . $request->input('time_schedule'.$bus)));
            }
            // $newdate = new DateTime($posting_time);
            $post_data->posting_time =  $posting_time;
            $post_data->business = $bus;
            $post_data->user_id = Auth::user()->id;
            if ($request->input('post_package_id') == '') {
                $post_data->post_package_id = 0;
            }
            $post_data->save();
            
        }
        Session::flash('success', 'Successfully Scheduled');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addmultiple()
    {
        $post_time = [];
        $business =  Business::where('user_id', Auth::user()->id)->get();
        foreach ($business as $busin) {
            $post_time[$busin->id] = Posts::where('user_id', Auth::id())->where('business', $busin->id)->orderBy('posting_time', 'desc')->first();
        }
        $b_data =  Business::where('user_id', Auth::user()->id)->pluck('b_name', 'id');
        $g_data =  Group::where('user_id', Auth::user()->id)->pluck('name', 'id');
        $pack_data =  PostPackage::where('user_id', Auth::user()->id)->pluck('name', 'id');
        $imgs =  ImageGallery::where('user_id', Auth::user()->id)->get();
        $socon = SocialConnection::where('business_user_id', Auth::user()->id)->get();
        $social = SocialPlatform::get();
        return view('add-multiple-post', compact('social', 'b_data', 'g_data', 'imgs', 'socon', 'business', 'pack_data', 'post_time'));
    }
    
    public function addmultipost(Request $request)
    {
        $image_path = '';
        $image_link = '';
        $image_header = '';
        $this->validate($request, [
            'group' => 'required|max:10024',
            'business' => 'required|max:10024'
                                   
        ]);
        $img_get = '';
        if ($request->input('group') != null) {
            $grp = Group::where('id', $request->input('group'))->first();
            $grp_ids = explode(',', $grp->business);
        } else {
            $grp_ids = [];
        }
        if ($request->input('business') != null) {
            $busid = $request->input('business');
        } else {
            $busid = [];
        }
        $bus = array_merge($busid, $grp_ids);
        $bus = array_values(array_unique($bus));
     
        foreach ($bus as $busin) {
            if ($request->input('customFile') != '') {
                $package = Session::get('file');
                foreach ($package as $index => $pack) {
                    if ($index !=0) {
                        $post = new Posts();
                        $post->post = $request->input('post'.$index);
                        if ($request->input('image_select'.$index) != '0' && $request->input('image_select'.$index) != '') {
                            $img_g = ImageGallery::where('id', $request->input('image_select'.$index))->first();
                            $post->image = $img_g->image;
                            $post->img_dir = $img_g->img_dir;
                            $img_get = asset('/'.$img_g->img_dir.'/'.$img_g->image);
                            $image_link = asset('/'.$img_g->img_dir.'/'.$img_g->image);
                            $image_path = public_path($img_g->img_dir.'/'.$img_g->image);
                           // $image_header = get_headers($image_link, 1);
                        } elseif ($request->input('img_link'.$index) != null) {
                            $img_get = $request->input('img_link'.$index);
                            $folder_name = date('Ymd') . '_' . mt_rand(1000, 990000);
                            File::makeDirectory(public_path() . '/post_images/'. $folder_name, 0777, true);
                            $destinationPath = ('post_images/'. $folder_name);
                            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $pin = mt_rand(1000000, 9999999)
                                . mt_rand(1000000, 9999999)
                                    . $characters[rand(0, strlen($characters) - 1)];
                            $string = str_shuffle($pin);
                            $imagename = $string . '.' . pathinfo($img_get, PATHINFO_EXTENSION);
                            file_put_contents($destinationPath."/".$imagename,file_get_contents($img_get));
                            $post->image = $imagename;
                            $post->img_dir = $destinationPath;
                            $image_link = asset('/'.$destinationPath.'/'.$imagename);
                            $image_path = public_path($destinationPath.'/'.$imagename);
                            //$image_header = get_headers($image_link, 1);
                        }
                        $post->image_link = $image_link ;
                        $post->fb_share_active = $request->input('option1-'.$index);
                        $post->tw_share_active = $request->input('option2-'.$index);
                        $post->in_share_active = $request->input('option3-'.$index);
                        $post->gb_share_active = $request->input('option4-'.$index);
                        $post->logo_active = $request->input('my-checkbox') == 'on' ? 1 : 0;
                        $post->logo_type = $request->input('logo_type'.$index);
                        $post->logo_position = $request->input('logo_position'.$index);
                        if ($request->input('date'.$index) != null  || $request->input('time'.$index != null)) {
                            $ptime = $request->input('date'.$index) . ' ' . $request->input('time'.$index);
                            $ptime = date("Y-m-d H:i:s", strtotime($ptime));
                        } else {
                            $ptime = $request->input('date_schedule'.$busin.'-'.$index) . ' ' . $request->input('time_schedule'.$busin.'-'.$index);
                            $ptime = date("Y-m-d H:i:s", strtotime($ptime));
                        }
                        $post->posting_time = $ptime;
                        $post->schedule_status = $request->input('schedule_status'.$busin);
                        $post->post_status = $request->input('post_status'.$busin);
                        $post->business = $busin;
                        $post->user_id = Auth::user()->id;
                        $post->post_package_id = 0;
                        $post->save();
                       
                    }
                }
            } else {
                $package = Posts::where('post_package_id', $request->input('package'))->get();
                foreach ($package as $index => $pack) {
                    $post = new Posts();
                    $post->post = $request->input('post'.$pack->id);
                    if ($request->input('image_select'.$pack->id) != '0' && $request->input('image_select'.$pack->id) != '') {
                        $img_g = ImageGallery::where('id', $request->input('image_select'.$pack->id))->first();
                        $img_get = asset('/'.$img_g->img_dir.'/'.$img_g->image);
                        $post->image = $img_g->image;
                        $post->img_dir = $img_g->img_dir;
                        $image_link = asset('/'.$img_g->img_dir.'/'.$img_g->image);
                        $image_path = public_path($img_g->img_dir.'/'.$img_g->image);
                        $image_header = get_headers($image_link, 1);
                    } elseif ($request->input('img_link'.$pack->id) != null) {
                        $img_get = $request->input('img_link'.$pack->id);
                        $folder_name = date('Ymd') . '_' . mt_rand(1000, 990000);
                        File::makeDirectory(public_path() . '/post_images/'. $folder_name, 0777, true);
                        $destinationPath = ('post_images/'. $folder_name);
                        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $pin = mt_rand(1000000, 9999999)
                            . mt_rand(1000000, 9999999)
                                . $characters[rand(0, strlen($characters) - 1)];
                        $string = str_shuffle($pin);
                        $imagename = $string . '.' . pathinfo($img_get, PATHINFO_EXTENSION);
                        file_put_contents($destinationPath."/".$imagename,file_get_contents($img_get));
                        $post->image = $imagename;
                        $post->img_dir = $destinationPath;
                        $image_link = asset('/'.$destinationPath.'/'.$imagename);
                        $image_path = public_path($destinationPath.'/'.$imagename);
                        $image_header = get_headers($image_link, 1);
                    }
                    $post->image_link = $image_link ;
                    $post->fb_share_active = $request->input('option1-'.$pack->id);
                    $post->tw_share_active = $request->input('option2-'.$pack->id);
                    $post->in_share_active = $request->input('option3-'.$pack->id);
                    $post->gb_share_active = $request->input('option4-'.$pack->id);
                    $post->logo_active = $request->input('my-checkbox') == 'on' ? 1 : 0;
                    $post->logo_type = $request->input('logo_type'.$pack->id);
                    $post->logo_position = $request->input('logo_position'.$pack->id);
                    if ($request->input('date'.$pack->id) != null  || $request->input('time'.$pack->id != null)) {
                        $ptime = $request->input('date'.$pack->id) . ' ' . $request->input('time'.$pack->id);
                        $ptime = date("Y-m-d H:i:s", strtotime($ptime));
                    } else {
                        $ptime = $request->input('date_schedule'.$busin.'-'.$index) . ' ' . $request->input('time_schedule'.$busin.'-'.$index);
                        $ptime = date("Y-m-d H:i:s", strtotime($ptime));
                    }
                    $post->posting_time = $ptime;
                    $post->schedule_status = $request->input('schedule_status'.$busin);
                    $post->post_status = $request->input('post_status'.$busin);
                    $post->business = $busin;
                    $post->user_id = Auth::user()->id;
                    $post->post_package_id = 0;
                    $post->save();
                    
                }
            }
        }
        Session::flash('success', 'Successfully Scheduled');
        return redirect()->back();
    }
    // public function schedulemultiple($id)
    // {
    //     $social = SocialPlatform::get();
    //     $posts = Posts::where('post_package_id', $id)->where('user_id', Auth::user()->id)->get();
    //     return view('schedule-multiple', compact('social', 'posts'));
    // }

    // public function schedulemultipost(Request $request, $id)
    // {
    //     $posts = Posts::where('post_package_id', $id)->where('user_id', Auth::user()->id)->get();
    //     foreach ($posts as $post) {
    //         $share_on = [];
        
    //         $socialplatform = SocialPlatform::get();
    //         for ($i=1; $i<=$socialplatform->count(); $i++) {
    //             $share_on[] = $request->input('share-'.$i.'-'.$post->id);
    //         }

    //         $p = Posts::where('id', $post->id)->first();
    //         $p->logo_type = $request->input('logo_type-'.$post->id);
    //         $p->logo_position = $request->input('logo_position-'.$post->id);
    //         $p->share_active = implode(',', $share_on);
    //         $p->logo_active = $request->input('logo_active-'.$post->id);
    //         $p->schedule_status = $request->input('schedule_status-'.$post->id);
    //         $p->post_status = $request->input('post_status-'.$post->id);

    //         $p->posting_time = $request->input('date-'.$post->id) .' '. $request->input('time_hr-'.$post->id) .' '. $request->input('time_min-'.$post->id) .':'. $request->input('time_am-'.$post->id)  ;
    //         $p->save();
    //     }
    //     Session::flash('success', 'Successfully scheduled');
    //     return redirect()->back();
    // }
    
    public function destroy_package($id)
    {
        $package = PostPackage::where('id', $id)->get();
        $package->each->delete();
        $posts = Posts::where('post_package_id', $id)->get();
        $posts->each->delete();
        
        Session::flash('success', 'Successfully Deleted');
        return redirect()->back();
    }

    public function ajaxAddPackage(Request $request)
    {
      $package = new PostPackage();
      $package->name = $request->input('newpack');
      $package->post_count = 0;
      $package->description = "";
      $package->user_id = Auth::user()->id;
      $package->save();
      $pak = [];
      $arr = ['0'=>'- Select Package -'];
      $p_package = PostPackage::where('user_id', Auth::user()->id)->get();
      foreach($p_package as $pack){
          $pak[$pack->id] = $pack->name;
      }
      $package = $arr + $pak;
      return ['package'=>$package, 'success'=> 'Successfully Added'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function csvFormat(Request $request)
    {
        //$fl = $request->file('customFile');
        //echo file_get_contents($_FILES['file']['tmp_name']);
        //$image_name = $id.$product_image->getClientOriginalName();
      
        $this->validate($request, [
        'file' => 'required|file|max:10024'
                               
    ]);

        $table = '';
        $dataa = [];
        $firstCol = [];
        $secondCol = [];
        $file = $_FILES['file']['tmp_name'];
        if (($handle = fopen($file, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $dataa[] = json_encode($data);
                $firstCol[] = json_decode($dataa[0]);
            }
            $secondCol[] = json_decode($dataa[1]);
            Session::put('file', $dataa);
            for ($i=0;$i<count($firstCol[0]);$i++) {
                $table = $table.'<tr class="alert">
              <td>'.$firstCol[0][$i].'</td>
              <td>'.$secondCol[0][$i].'</td>
              <td>
                <i class="fas fa-arrow-right text-primary"></i>
              </td>
              <td>
                <div class="form-group">

                  <select name="select'.$i.'" class="form-control select2bs4" id="select'.$i.'" style="width: 100%;">
                    <option selected="selected" value="'.$firstCol[0][$i].'">'.$firstCol[0][$i].'</option>
                    <option value="content_link">Content Link</option>
                    <option value="elements">Elements</option>
                    <option value="image_link">Image Link</option>
                    <option value="message">Message</option>
                    <option value="logo">Logo</option>
                    <option value="position">Position</option>
                    <option value="date_time">Date Time</option>
                    <option value="category">Category</option>
                    <option value="type">Type</option>
                    <option value="header">Header</option>
                    <option value="#">#</option>
                  </select>
                </div>
              </td>

            </tr>
            <script>  var optionValues =[];
            $("#select'.$i.' option").each(function(){
            if($.inArray(this.value, optionValues) >-1){
                $(this).remove()
            }else{
                optionValues.push(this.value);
            }
            });</script>';
            }
        }
        return $table;
    }


    public function filetoprev()
    {
        return Session::get('file');
    }

    public function fileprev(Request $request, $busid, $grpid)
    {
        $append = '';
        $upload = '';
        $tabs = '';
        $tabContent = '';
        $business = '';
        $post_time = [];
        if ($grpid != '0') {
            $grp = Group::where('id', $grpid)->first();
            $grp_ids = explode(',', $grp->business);
        } else {
            $grp_ids = [];
        }
        if ($busid != '0') {
            $busid = explode(',', $busid);
        } else {
            $busid = [];
        }
        $bus = array_merge($busid, $grp_ids);
        $bus = array_values(array_unique($bus));
        $socials = SocialConnection::where('business_user_id', Auth::user()->id)->get();
        $imgs =  ImageGallery::where('user_id', Auth::user()->id)->get();
        foreach ($bus as $key => $business) {
            $result[$business] = Business::where('id', $business)->get();
        }
        foreach ($result as $k => $busin) {
            $post_time[$k] = Posts::where('user_id', Auth::id())->where('business', $k)->orderBy('posting_time', 'desc')->first();
            if ($post_time[$k] == null || strtotime($post_time[$k]->posting_time) < time()) {
                $post_time[$k]['posting_time'] = date('Y-m-d H:i:s', time());
                $inc[$k] = 0;
            } else {
                $post_time[$k]['posting_time'] = $post_time[$k]->posting_time;
                $inc[$k] = 0;
            }
        }

        $posta = [];
        $res = explode(',', $request->get('data'));
        $posts = Session::get('file');
        foreach ($posts as $index => $post) {
            if ($index != 0) {
                $business = '';
                $upload = '';
                $active = '';
                $actshow = '';
                $postarr = json_decode($post);
                for ($i=0;$i<count($res);$i++) {
                    if ($res[$i] == 'header') {
                        $posta[0] = $postarr[$i];
                    } elseif ($res[$i] == 'content_link') {
                        $posta[7] = $postarr[$i];
                    } elseif ($res[$i] == 'type') {
                        $posta[3] = $postarr[$i];
                    } elseif ($res[$i] == 'elements') {
                        $posta[4] = $postarr[$i];
                    } elseif ($res[$i] == 'message') {
                        $posta[5] = $postarr[$i];
                    } elseif ($res[$i] == 'image_link') {
                        $posta[6] = $postarr[$i];
                    } elseif ($res[$i] == 'logo') {
                        $posta[8] = $postarr[$i];
                    } elseif ($res[$i] == 'position') {
                        $posta[9] = $postarr[$i];
                    } elseif ($res[$i] == 'category') {
                        $posta[$i] = $postarr[$i];
                    } else {
                        $posta[1] = '#';
                    }
                }
              
                foreach ($imgs->where('category', 'image') as $img) {
                    $upload = $upload.'
              <div class="col-sm-2">
                  <label>
                      
                      <input type="radio"
                          name="image_select'.$index.'" 
                          value="'.$img->id.'" 
                          alt="/'.$img->img_dir.'/'.$img->image.'"> 
                      <img src="/'.$img->img_dir.'/'.$img->image.'" 
                          class="img-fluid mb-2"
                          alt="white sample" />
                  </label>
              </div>';
                }
                if ($index == 1) {
                    $active = ' active ';
                    $actshow = ' active show ';
                }
  
                $tabs = $tabs.'<div class="nav-link alert '.$active.'" id="vert-tabs-post1-tab" data-toggle="pill"
              href="#vert-tabs-post'.$index.'" role="tab" aria-controls="vert-tabs-post'.$index.'"
              aria-selected="true"><span class="badge bg-info mr-2">'.($index).'</span>'.$posta[0].'<span
                class="btn bg-white float-right" onclick="removetab();" data-dismiss="alert" aria-hidden="true"><i
                  class="nav-icon fas fa-trash text-danger"></i></span><span
                class="btn bg-white float-right" data-toggle="modal"
                data-target="#edit-posts'.$index.'"><i class="nav-icon fas fa-edit"></i></span>   
                          </div>
                          <!--Modal-Edit-Post-->
                <div class="modal fade" id="edit-posts'.$index.'">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> <i class="nav-icon fas fa-comment text-primary mr-2"></i>Post</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card card-primary card-outline">
            
                          <!-- /.card-header -->
                          <div class="card-header">
                            <h3 class="card-title">
                              <i class="nav-icon fas fa-edit mr-2"></i>
                              Edit Post
                            </h3>
            
                            <div class="card-tools">
            
                            </div>
                          </div>
                          <div class="card-body">
            
                            <table class="table ">
                              <thead>
                                <tr>
                                  <th style="width: 50%;">'.$posta[7].'</th>
                                
                                </tr>
            
                              </thead>
                              <tbody>
                              
                                <tr class="text-center">
                                  <td colspan="4"><img class="img-fluid" src="'.$posta[6].'">
                                  <input type="hidden" name="img_link'.$index.'" value="'.$posta[6].'">
                                    <button onclick="return false" class="btn orange-button btn-block mt-2" data-toggle="modal"
                                      data-target="#modal-upload'.$index.'"><i class=" fas fa-cloud-upload-alt mr-2"></i> Update
                                      Image</button>
                                  </td>
            
                                 
                        <!-- Modal-preview -->
                        <div class="modal fade" id="modal-upload'.$index.'">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title"> </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="card card-primary card-outline card-outline-tabs">
                                  <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                      <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-image-tab'.$index.'" data-toggle="pill"
                                          href="#custom-tabs-four-image'.$index.'" role="tab" aria-controls="custom-tabs-four-image'.$index.'"
                                          aria-selected="true">Image</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-video-tab" data-toggle="pill"
                                          href="#custom-tabs-four-video'.$index.'" role="tab" aria-controls="custom-tabs-four-video'.$index.'"
                                          aria-selected="false">Video</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-gifs-tab" data-toggle="pill" href="#custom-tabs-four-gifs'.$index.'"
                                          role="tab" aria-controls="custom-tabs-four-gifs'.$index.'" aria-selected="false">Gifs</a>
                                      </li>
                    
                                    </ul>
                                  </div>
                                  <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                      <div class="tab-pane fade show active" id="custom-tabs-four-image'.$index.'" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-image-tab'.$index.'">
                                        <div class=" card-tabs">
                                          <div class="card-header p-0 pt-1 border-bottom-0">
                                            <ul class="nav " id="custom-tabs-three-tab" role="tablist">
                                            
                                              <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-three-current-tab'.$index.'" data-toggle="pill"
                                                  href="#custom-tabs-three-current'.$index.'" role="tab" aria-controls="custom-tabs-three-current'.$index.'"
                                                  aria-selected="true">Current Image</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-gallery-tab" data-toggle="pill"
                                                  href="#custom-tabs-three-gallery'.$index.'" role="tab" aria-controls="custom-tabs-three-gallery'.$index.'"
                                                  aria-selected="false">My Gallery</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-stock-tab" data-toggle="pill"
                                                  href="#custom-tabs-three-stock'.$index.'" role="tab" aria-controls="custom-tabs-three-stock'.$index.'"
                                                  aria-selected="false">Stock Gallery</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-icon-tab" data-toggle="pill"
                                                  href="#custom-tabs-three-icon'.$index.'" role="tab" aria-controls="custom-tabs-three-icon'.$index.'"
                                                  aria-selected="false">Icons</a>
                                              </li>
                                            </ul>
                                          </div>
                                          <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                              <div class="tab-pane fade show active" id="custom-tabs-three-current'.$index.'" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-current-tab'.$index.'">
                                                No Current Image
                                                <button  class="btn btn-success block  mt-5"><i
                                                    class=" fas fa-cloud-upload-alt mr-2"></i> Upload Image</button>
                                              </div>
                                              <div class="tab-pane fade" id="custom-tabs-three-gallery'.$index.'" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-gallery-tab'.$index.'">
                                                <!--gallery-start-->
                                                <div class="row">
                                               
                                                '.$upload.'
            
                                                </div>
                                                <!--gallery-end-->
                                              </div>
                                              <div class="tab-pane fade" id="custom-tabs-three-stock'.$index.'" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-stock-tab'.$index.'">
                                                <!--gallery-start-->
                                                <div class="row">
                                                  <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox"
                                                      data-title="sample 1 - white" data-gallery="gallery">
                                                      <img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2"
                                                        alt="white sample" />
                                                    </a>
                                                  </div>
                                                  
                                                </div>
                                                <!--gallery-end-->
                                              </div>
                                              <div class="tab-pane fade" id="custom-tabs-three-icon'.$index.'" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-icon-tab'.$index.'">
                                                Icons
                                              </div>
                                            </div>
                                          </div>
                                          <!-- /.card -->
                                        </div>
                                      </div>
                                      <div class="tab-pane fade" id="custom-tabs-four-video'.$index.'" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-video-tab'.$index.'">
                                        Video
                                      </div>
                                      <div class="tab-pane fade" id="custom-tabs-four-gifs'.$index.'" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-gifs-tab'.$index.'">
                                        Gifs
                                      </div>
                    
                                    </div>
                                  </div>
                                  <!-- /.card -->
                                </div>
                                <!-- /.card -->
                              </div>
                              <div class="modal-footer justify-content-between">
                    
                                <button onclick="return false" class="btn btn-primary"> Select</button>
                              </div>
                    
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
            
                                </tr>
                                <tr>
                                  <td>
                                    <div class="form-group">
                                    <select class="form-control token" name="token">
                                    <option value="[Company Name]">Company Name</option>
                                    <option value="[Niche]">Niche</option>
                                    <option value="[Phone Number]">Phone Number</option>
                                    <option value="[Address]">Address</option>
                                    <option value="[Owner"s Name]">Owner"s Name</option>
            
                                </select>
                                    </div>
                                  </td>
                                  <td colspan="3">
                                    <div class="float-right"><i class=" fab fa-twitter text-info mr-1"></i>Twitter:<span
                                        class="text-info mr-1 ml-1 count'.$index.'">0</span>/ <span>280</span></div>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="4">
                                    <div class="form-group">
            
                                      <textarea id="post'.$index.'" name="post'.$index.'" class="form-control " maxlength="280" rows="3" placeholder="Post text here ... " >'.$posta[5].'</textarea>
                                    </div>
                                  </td>
                                </tr>
            
            <script>
            $("#post'.$index.'").keyup(function () {
              var max = 280;
              var len = $(this).val().length;
              if (len > max) {
                $(".count'.$index.'").text(len).removeClass("text-info").addClass("text-danger");
              }
              else if (len < max) {
                $(".count'.$index.'").text(len).removeClass("text-danger").addClass("text-info");
              }
            });
            </script>
                              </tbody>
                            </table>
            
            
                          </div>
                          <!-- card-body -->
            
                        </div>
                        <!-- card -->
                      </div>
                      <div class="modal-footer justify-content-between">
            
                        <button onclick="return false" class="btn btn-primary"><i class=" fa fa-check"></i> Save</button>
                      </div>
                    </div>
                    <!--modal-content -->
                  </div>
                  <!-- modal-dialog -->
                </div>
                <!-- modal -->';
  
                foreach ($result as $key => $resu) {
                 $max_p= 0;
              $sch_start_time = explode(',',$resu[0]['auto_schedule_time_start']);
              $sch_end_time = explode(',',$resu[0]['auto_schedule_time_end']);
              $max_post = explode(',',$resu[0]['max_post']);
              foreach($max_post as $mp){
                $max_p = $max_p + $mp;
              }

              $max_posts = 24/$max_p;
              $post_time[$key]['posting_time'] = date('Y-m-d H:i:s', strtotime('+'.$max_posts.' hour'.$post_time[$key]['posting_time']));
              $count_st = count($sch_start_time);
              $sched_post_time = date('h:i a', rand(strtotime($sch_start_time[$inc[$key]]), strtotime($sch_end_time[$inc[$key]])));
              
                    $hasfb = $hastw = $hasinsta = $hasgb = '';
                    if ($resu[0]['hasfb'] == 1) {
                        $hasfb = '<li class="bg-blue"><i class="nav-icon fab fa-facebook-f"></i></li>';
                    } else {
                        $hasfb = '';
                    }
                    if ($resu[0]['hastw'] == 1) {
                        $hastw = '<li class="bg-lightblue"><i class="nav-icon fab fa-twitter"></i></li>';
                    } else {
                        $hastw = '';
                    }
                    if ($resu[0]['hasinsta'] == 1) {
                        $hasinsta = '<li class="bg-orange"><i class="nav-icon fab fa-instagram"></i></li>';
                    } else {
                        $hasinsta = '';
                    }
                    if ($resu[0]['hasgb'] == 1) {
                        $hasgb = '<li class="bg-success"><i class="nav-icon fab fa-google"></i></li>';
                    } else {
                        $hasgb = '';
                    }
                    $business = $business.'
                      <tr class="">
                          <td>
                          <div class="address">
                              <ul class="icon-list">
                              <li class="address-name"><i class="nav-icon far fa-building"></i>
                                  '.$resu[0]['b_name'].'</li>
  
                              </ul>
                          </div>
                          </td>
                          <td>
                          <div class="address">
                              <ul class="icon-list">
                              <li class="address-street"><i
                                  class="nav-icon fas fa-map-marker-alt"></i>'.$resu[0]['address'].'</li>
  
                              </ul>
                          </div>
                          </td>
                          <td>
                          <div class="social-icons">
                              <ul>
                              '.$hasfb . $hastw . $hasinsta . $hasgb .'        
                              </ul>
                          </div>
                          </td>
                          <td>
                          <div class="address">
                              <ul class="icon-list">
                              <li class="date_show"><i
                                  class="nav-icon fas fa-calendar-alt"></i><span
                                  class="datesched">'.date('d/m/Y', strtotime($post_time[$key]['posting_time'])).'</span><input type="hidden" name="date_schedule'.$resu[0]['id'].'-'.$index.'" value="'.date('d-m-Y', strtotime($post_time[$key]['posting_time'])).'" class="form-group"></li>
                              <li class="time_show"><i class="nav-icon far fa-clock"></i><span
                              class="timesched">'.$sched_post_time.'</span><input type="hidden" name="time_schedule'.$resu[0]['id'].'-'.$index.'" value="'.$sched_post_time.'" class="form-group"></li>
                              <li class="time_zone_show"><i class="nav-icon fas fa-map-marker-alt"></i> '.$resu[0]['time_zone'].'</li>
  
                              </ul>
                          </div>
                          </td>
                          <td>
                          <ul class="icon-list">
                              <li class="">
                              <input type="checkbox" name="schedule_status'.$resu[0]['id'].'" value="1" checked><i class="nav-icon fas fa-check text-success"></i>Good
                              </li>
  
  
                          </ul>
                          </td>
                          <td>
                          <ul class="icon-list">
                              <li class=""><input type="checkbox" name="post_status'.$resu[0]['id'].'" value="1" checked><i class="nav-icon fas fa-check text-success"></i>Good
                              </li>
  
  
                          </ul>
                          </td>
                          <td></td>
  
                      </tr>
  
  
                      ';
                      $inc[$key]++;
                    if($inc[$key] == $count_st){
                      $inc[$key]=0;
                    }      
                }
                $tabContent = $tabContent.'<div class="tab-pane text-left fade '.$actshow.'" id="vert-tabs-post'.$index.'"
                role="tabpanel" aria-labelledby="vert-tabs-post'.$index.'-tab">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card card-default">
                      <div class="card-header">
                        <h3 class="card-title">
  
                        </h3>
  
                        <div class="card-tools">
                          <ul class="nav " id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link bg-blue icon-square active"
                                id="custom-tabs-three-facebook-tab'.$index.'" data-toggle="pill"
                                href="#custom-tabs-three-facebook'.$index.'" role="tab"
                                aria-controls="custom-tabs-three-facebook'.$index.'" aria-selected="true"><i
                                  class="nav-icon fab fa-facebook-f"></i></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link icon-square bg-lightblue"
                                id="custom-tabs-three-twitter-tab'.$index.'" data-toggle="pill"
                                href="#custom-tabs-three-twitter'.$index.'" role="tab"
                                aria-controls="custom-tabs-three-twitter'.$index.'" aria-selected="false"><i
                                  class="nav-icon fab fa-twitter"></i></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link icon-square bg-orange"
                                id="custom-tabs-three-instagram-tab'.$index.'" data-toggle="pill"
                                href="#custom-tabs-three-instagram'.$index.'" role="tab"
                                aria-controls="custom-tabs-three-instagram'.$index.'"
                                aria-selected="false"><i
                                  class="nav-icon fab fa-instagram"></i></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link icon-square bg-success"
                                id="custom-tabs-three-google-tab'.$index.'" data-toggle="pill"
                                href="#custom-tabs-three-google'.$index.'" role="tab"
                                aria-controls="custom-tabs-three-google'.$index.'" aria-selected="false"><i
                                  class="nav-icon fab fa-google"></i></a>
                            </li>
  
                          </ul>
  
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                          <div class="tab-pane fade show active" id="custom-tabs-three-facebook'.$index.'"
                            role="tabpanel" aria-labelledby="custom-tabs-three-facebook-tab'.$index.'">
  
                            Facebook
  
                          </div>
                          <!--facebook-tab-End-->
  
                          <div class="tab-pane fade show " id="custom-tabs-three-twitter'.$index.'"
                            role="tabpanel" aria-labelledby="custom-tabs-three-twitter-tab'.$index.'">
  
                            Twitter
                          </div>
                          <!--Twitter-End-->
                          <div class="tab-pane fade show " id="custom-tabs-three-instagram'.$index.'"
                            role="tabpanel" aria-labelledby="custom-tabs-three-instagram-tab'.$index.'">
  
                            Instagram
                          </div>
                          <!--Twitter-End-->
                          <div class="tab-pane fade show " id="custom-tabs-three-google'.$index.'"
                            role="tabpanel" aria-labelledby="custom-tabs-three-google-tab'.$index.'">
  
                            Google
                          </div>
                          <!--Twitter-End-->
                        </div>
                      </div>
                      <!-- /.card-body -->
  
  
                    </div>
                    <!-- /.card -->
                  </div>
                  <!--column-6-->
                  <div class="col-lg-6">
                    <div class="card card-default">
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-briefcase text-info mr-1"></i>
                          Businesses
                        </h3>
  
                        <div class="card-tools">
  
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="card card-info collapsed-card">
                          <div class="card-header">
                            <h3 class="card-title"><span class="mr-2">1</span>Set Posting Time
                            </h3>
  
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool"
                                data-card-widget="collapse"><i class="fas fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5 border-right">
                                <div class="description-block">
                                  <button type="button"
                                    class="btn  btn-outline-info btn-sm text-uppercase toastrDefaultQueue"><i
                                      class="fas fa-list-ol mr-2"></i>Add
                                    To
                                    Queue
                                  </button>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-2 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">OR</h5>
  
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-5">
                                <div class="description-block">
                                  <button type="button"
                                    class="btn  btn-outline-info btn-sm text-uppercase"
                                    data-toggle="modal" data-target="#posting-date-time'.$index.'"><i
                                      class="nav-icon fas fa-calendar-alt mr-2"></i>Date &amp;
                                    Time
                                  </button>
                                </div>
  
                                <!--Modal-Date-Time-->
                                  <div class="modal fade" id="posting-date-time'.$index.'">
                                  <div class="modal-dialog modal-md">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title"> <i class="nav-icon fas fa-calendar-alt mr-2"></i>Date & Time</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="card card-primary card-outline">
  
                                          <!-- /.card-header -->
                                          <div class="card-header">
                                              <h3 class="card-title">
                                              <i class="nav-icon fas fa-calendar-alt mr-2"></i>
                                              POSTING DATE AND TIME
                                              </h3>
  
                                              <div class="card-tools">
  
                                              </div>
                                          </div>
                                          <div class="card-body">
                                              <!-- Date -->
                                              <div class="form-group">
                                              <label>Date:</label>
                                              <div class="input-group date" id="reservationdate'.$index.'" data-target-input="nearest">
                                                  <input type="text" name="date'.$index.'" class="form-control datetimepicker-input" data-target="#reservationdate'.$index.'" />
                                                  <div class="input-group-append" data-target="#reservationdate'.$index.'" data-toggle="datetimepicker">
                                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div>
                                              </div>
                                              <!-- /.form group -->
  
                                              <div class="form-group">
                                              <label>Time:</label>
  
                                              <div class="input-group date" id="timepicker'.$index.'" data-target-input="nearest">
                                                  <input type="text" name="time'.$index.'" class="form-control datetimepicker-input" data-target="#timepicker'.$index.'" />
                                                  <div class="input-group-append" data-target="#timepicker'.$index.'" data-toggle="datetimepicker">
                                                  <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>
                                              <!-- /.input group -->
                                              </div>
                                              <!-- /.form group -->
  
  
                                          </div>
                                          <!-- /.card-body -->
  
                                          </div>
                                          <!-- /.card -->
                                      </div>
                                      <div class="modal-footer justify-content-between">
  
                                          <button class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class=" fa fa-check"></i> Save</button>
                                      </div>
                                      </div>
                                      <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                  </div>
                                  <!-- /.modal -->
                                  <script>
  //Date range picker
 $("#reservationdate'.$index.'").datetimepicker({
      format: "L"
  });

  //Timepicker
  $("#timepicker'.$index.'").datetimepicker({
    format: "LT"
  })
  </script>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                            </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card-posting-time -->
  
                        <div class="card card-warning collapsed-card">
                          <div class="card-header">
                            <h3 class="card-title"><span class="mr-2">2</span>Select Networks</h3>
  
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool"
                                data-card-widget="collapse"><i class="fas fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5 border-right d-flex align-items-center">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                  <label class="btn bg-blue ">
                                  <input type="hidden" name="option1-'.$index.'" value="0"> 
                                    <input type="checkbox" name="option1-'.$index.'" id="option1-'.$index.'"
                                      checked value="1"> <i
                                      class="nav-icon fab fa-facebook-f"></i>
                                  </label>
                                  <label class="btn bg-lightblue">
                                  <input type="hidden" name="option2-'.$index.'" value="0"> 
                                    <input type="checkbox" name="option2-'.$index.'" id="option2-'.$index.'"
                                      checked value="1"> <i class="nav-icon fab fa-twitter"></i>
                                  </label>
                                  <label class="btn bg-orange">
                                  <input type="hidden" name="option3-'.$index.'" value="0"> 
                                    <input type="checkbox" name="option3-'.$index.'" id="option3-'.$index.'"
                                      checked value="1"> <i
                                      class="nav-icon fab fa-instagram"></i>
                                  </label>
                                  <label class="btn bg-success">
                                  <input type="hidden" name="option4-'.$index.'" value="0"> 
                                    <input type="checkbox" name="option4-'.$index.'" id="option4-'.$index.'"
                                      checked value="1"><i class="nav-icon fab fa-google"></i>
                                  </label>
                                </div>
                                <!-- /.social-icons -->
                              </div>
                              <!-- /.col -->
  
                              <div class="col-sm-7">
                                <div class="d-flex align-items-center flex-direction-column">
                                  <div class="toggle ">
                                    <div
                                      class="form-group flex-column m-0 d-flex align-items-center  mb-2">
                                      <label class="mr-1"> LOGO</label>
                                      <input type="checkbox" name="my-checkbox" checked
                                        data-bootstrap-switch data-off-color="danger"
                                        data-on-color="success">
                                    </div>
                                  </div>
  
                                  <div class="form-group d-flex align-items-center mb-0">
  
                                    <select name="logo_type'.$index.'" class="form-control">
                                    <option value="">- Select Type -</option>
                                      <option>Light Logo</option>
                                      <option>Default Logo</option>
                                      <option>Dark Logo</option>
  
                                    </select>
                                  </div>
                                  <div class="form-group d-flex align-items-center mb-0">
                                        <select class="form-control" name="logo_position'.$index.'">
                                            <option value="">- Select Position -</option>
                                            <option value="bottom-left">Bottom Left</option>
                                            <option value="bottom-right">Bottom Right</option>
                                            <option value="center">Center</option>
                                            <option value="top-center">Center Top</option>
                                            <option value="bottom-center">Center Bottom</option>
                                            <option value="center-left">Center Left</option>
                                            <option value="center-right">Center Right</option>
                                            <option value="top-left">Top Left</option>
                                            <option value="top-right">Top Right</option>
                                        </select>
                                    </div>
                                  
                                </div>
                              </div>
                              <!-- /.col -->
  
                            </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card-Select-Network -->
  
                        <div class="card card-purple collapsed-card">
                          <div class="card-header">
                            <h3 class="card-title"><span class="mr-2">3</span>Set Content Order
                            </h3>
  
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool"
                                data-card-widget="collapse"><i class="fas fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-6 border-right">
                                <div class="description-block">
                                  <button type="button"
                                    class="btn  btn-outline-secondary btn-sm text-uppercase "><i
                                      class="fas fa-list-ol mr-2"></i>Package Order
  
                                  </button>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
  
                              <!-- /.col -->
                              <div class="col-sm-6">
                                <div class="description-block">
                                  <button type="button"
                                    class="btn  btn-outline-secondary btn-sm text-uppercase toastrDefaultrandom"><i
                                      class="nav-icon fas fa-random mr-2"></i>Random Order
  
                                  </button>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                            </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card-posting-time -->
  
                      </div>
                      <!-- /.card-body -->
  
  
                    </div>
                    <!-- /.card -->
                  </div>
                  <!--column-6-->
                </div>
                <!--row-->
  
                <div class="row">
                  <div class="col-lg-12">
                  <table class="table table-striped">
                      <thead>
                      <tr>
                          <th>ACCOUNTS</th>
                          <th>CITY/STATE</th>
                          <th>POST TO
                          SOCIAL NETWORKS</th>
                          <th>POSTING DATE</th>
                          <th>SCHEDULE</th>
                          <th>STATUS</th>
                          <th><i class="nav-icon far fas fa-cog"></i></th>
                      </tr>
                      </thead>
                      <tbody>
                '.$business.'
                </tbody>
                  </table>
                  </div>
              </div>
              <!--row-->
            </div>
            <!--/ First-Tab-->';
            }
        }
  
        $append = '<div class="row">
          <div class="col-4 col-sm-3">
            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
              aria-orientation="vertical">
              '.$tabs.'
            </div>
          </div>
          <div class="col-8 col-sm-9">
            <div class="tab-content" id="vert-tabs-tabContent">
              '.$tabContent.'
              
            </div>
          </div>
          </div>
          
        <!--row-->
          <div class="">
          <button type="submit" class="btn btn-primary float-right"> Next Step
              <i class="fas fa-chevron-right ml-2"></i></button>
              </div>
              </form>';
        return $append;
    }



    public function ajaxpack($id)
    {
        $package = Posts::where('post_package_id', $id)->get();
        return $package;
    }

    public function ajaxbusgrp($busid, $grpid, $packid)
    {
        $append = '';
        $upload = '';
        $tabs = '';
        $tabContent = '';
        $business = '';
        $post_time = [];
        if ($grpid != '0') {
            $grp = Group::where('id', $grpid)->first();
            $grp_ids = explode(',', $grp->business);
        } else {
            $grp_ids = [];
        }
        if ($busid != '0') {
            $busid = explode(',', $busid);
        } else {
            $busid = [];
        }
        $bus = array_merge($busid, $grp_ids);
        $bus = array_values(array_unique($bus));
        $socials = SocialConnection::where('business_user_id', Auth::user()->id)->get();
        $package = Posts::where('post_package_id', $packid)->get();
        $imgs =  ImageGallery::where('user_id', Auth::user()->id)->get();
        foreach ($bus as $key => $business) {
            $result[$business] = Business::where('id', $business)->get();
        }
        foreach ($result as $k => $busin) {
            $post_time[$k] = Posts::where('user_id', Auth::id())->where('business', $k)->orderBy('posting_time', 'desc')->first();
            if ($post_time[$k] == null || strtotime($post_time[$k]->posting_time) < time()) {
                $post_time[$k]['posting_time'] = date('Y-m-d H:i:s', time());
                $inc[$k] = 0;
            } else {
                $post_time[$k]['posting_time'] = $post_time[$k]->posting_time;
                $inc[$k] = 0;
            }
        }

        foreach ($package as $index => $post) {
            $business = '';
            $upload = '';
            $active = '';
            $actshow = '';
            foreach ($imgs->where('category', 'image') as $img) {
                $upload = $upload.'
            <div class="col-sm-2">
                <label>
                
                    <input type="radio"
                        name="image_select'.$post->id.'" 
                        value="'.$img->id.'" 
                        alt="/'.$img->img_dir.'/'.$img->image.'"> 
                    <img src="/'.$img->img_dir.'/'.$img->image.'" 
                        class="img-fluid mb-2"
                        alt="white sample" />
                </label>
            </div>';
            }
            if ($index == 0) {
                $active = ' active ';
                $actshow = ' active show ';
            }

            $tabs = $tabs.'<div class="nav-link alert '.$active.'" id="vert-tabs-post1-tab" data-toggle="pill"
            href="#vert-tabs-post'.$post->id.'" role="tab" aria-controls="vert-tabs-post'.$post->id.'"
            aria-selected="true"><span class="badge bg-info mr-2">'.($index+1).'</span>'.$post->post.'<span
              class="btn bg-white float-right" onclick="removetab();" data-dismiss="alert" aria-hidden="true"><i
                class="nav-icon fas fa-trash text-danger"></i></span><span
              class="btn bg-white float-right" data-toggle="modal"
              data-target="#edit-posts'.$post->id.'"><i class="nav-icon fas fa-edit"></i></span>   
                        </div>
                        <!--Modal-Edit-Post-->
              <div class="modal fade" id="edit-posts'.$post->id.'">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title"> <i class="nav-icon fas fa-comment text-primary mr-2"></i>Post</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card card-primary card-outline">
          
                        <!-- /.card-header -->
                        <div class="card-header">
                          <h3 class="card-title">
                            <i class="nav-icon fas fa-edit mr-2"></i>
                            Edit Post
                          </h3>
          
                          <div class="card-tools">
          
                          </div>
                        </div>
                        <div class="card-body">
          
                          <table class="table ">
                            <thead>
                              <tr>
                                <th style="width: 50%;">'.$post->link.'</th>
                              
                              </tr>
          
                            </thead>
                            <tbody>
                            
                              <tr class="text-center">
                                <td colspan="4"><img class="img-fluid" src="'.$post->image_link.'">
                                <input type="hidden" name="img_link'.$post->id.'" value="'.$post->image_link.'">
                                  <button onclick="return false" class="btn orange-button btn-block mt-2" data-toggle="modal"
                                    data-target="#modal-upload'.$post->id.'"><i class=" fas fa-cloud-upload-alt mr-2"></i> Update
                                    Image</button>
                                </td>
          
                               
                      <!-- Modal-preview -->
                      <div class="modal fade" id="modal-upload'.$post->id.'">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title"> </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                  <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="custom-tabs-four-image-tab'.$post->id.'" data-toggle="pill"
                                        href="#custom-tabs-four-image'.$post->id.'" role="tab" aria-controls="custom-tabs-four-image'.$post->id.'"
                                        aria-selected="true">Image</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-four-video-tab" data-toggle="pill"
                                        href="#custom-tabs-four-video'.$post->id.'" role="tab" aria-controls="custom-tabs-four-video'.$post->id.'"
                                        aria-selected="false">Video</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-four-gifs-tab" data-toggle="pill" href="#custom-tabs-four-gifs'.$post->id.'"
                                        role="tab" aria-controls="custom-tabs-four-gifs'.$post->id.'" aria-selected="false">Gifs</a>
                                    </li>
                  
                                  </ul>
                                </div>
                                <div class="card-body">
                                  <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-image'.$post->id.'" role="tabpanel"
                                      aria-labelledby="custom-tabs-four-image-tab'.$post->id.'">
                                      <div class=" card-tabs">
                                        <div class="card-header p-0 pt-1 border-bottom-0">
                                          <ul class="nav " id="custom-tabs-three-tab" role="tablist">
                                          
                                            <li class="nav-item">
                                              <a class="nav-link active" id="custom-tabs-three-current-tab'.$post->id.'" data-toggle="pill"
                                                href="#custom-tabs-three-current'.$post->id.'" role="tab" aria-controls="custom-tabs-three-current'.$post->id.'"
                                                aria-selected="true">Current Image</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="custom-tabs-three-gallery-tab" data-toggle="pill"
                                                href="#custom-tabs-three-gallery'.$post->id.'" role="tab" aria-controls="custom-tabs-three-gallery'.$post->id.'"
                                                aria-selected="false">My Gallery</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="custom-tabs-three-stock-tab" data-toggle="pill"
                                                href="#custom-tabs-three-stock'.$post->id.'" role="tab" aria-controls="custom-tabs-three-stock'.$post->id.'"
                                                aria-selected="false">Stock Gallery</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="custom-tabs-three-icon-tab" data-toggle="pill"
                                                href="#custom-tabs-three-icon'.$post->id.'" role="tab" aria-controls="custom-tabs-three-icon'.$post->id.'"
                                                aria-selected="false">Icons</a>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="card-body">
                                          <div class="tab-content" id="custom-tabs-three-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-three-current'.$post->id.'" role="tabpanel"
                                              aria-labelledby="custom-tabs-three-current-tab'.$post->id.'">
                                              No Current Image
                                              <button  class="btn btn-success block  mt-5"><i
                                                  class=" fas fa-cloud-upload-alt mr-2"></i> Upload Image</button>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-three-gallery'.$post->id.'" role="tabpanel"
                                              aria-labelledby="custom-tabs-three-gallery-tab'.$post->id.'">
                                              <!--gallery-start-->
                                              <div class="row">
                                             
                                              '.$upload.'
          
                                              </div>
                                              <!--gallery-end-->
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-three-stock'.$post->id.'" role="tabpanel"
                                              aria-labelledby="custom-tabs-three-stock-tab'.$post->id.'">
                                              <!--gallery-start-->
                                              <div class="row">
                                                <div class="col-sm-2">
                                                  <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox"
                                                    data-title="sample 1 - white" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2"
                                                      alt="white sample" />
                                                  </a>
                                                </div>
                                                
                                              </div>
                                              <!--gallery-end-->
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-three-icon'.$post->id.'" role="tabpanel"
                                              aria-labelledby="custom-tabs-three-icon-tab'.$post->id.'">
                                              Icons
                                            </div>
                                          </div>
                                        </div>
                                        <!-- /.card -->
                                      </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-video'.$post->id.'" role="tabpanel"
                                      aria-labelledby="custom-tabs-four-video-tab'.$post->id.'">
                                      Video
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-gifs'.$post->id.'" role="tabpanel"
                                      aria-labelledby="custom-tabs-four-gifs-tab'.$post->id.'">
                                      Gifs
                                    </div>
                  
                                  </div>
                                </div>
                                <!-- /.card -->
                              </div>
                              <!-- /.card -->
                            </div>
                            <div class="modal-footer justify-content-between">
                  
                              <button onclick="return false" class="btn btn-primary"> Select</button>
                            </div>
                  
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
          
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-group">
                                  <select class="form-control token" name="token">
                                  <option value="[Company Name]">Company Name</option>
                                  <option value="[Niche]">Niche</option>
                                  <option value="[Phone Number]">Phone Number</option>
                                  <option value="[Address]">Address</option>
                                  <option value="[Owner"s Name]">Owner"s Name</option>
          
                              </select>
                                  </div>
                                </td>
                                <td colspan="3">
                                  <div class="float-right"><i class=" fab fa-twitter text-info mr-1"></i>Twitter:<span
                                      class="text-info mr-1 ml-1 count'.$post->id.'">0</span>/ <span>280</span></div>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="4">
                                  <div class="form-group">
          
                                    <textarea name="post'.$post->id.'" id="post'.$post->id.'" class="form-control " maxlength="280" rows="3" placeholder="Post text here ... " >'.$post->post.'</textarea>
                                  </div>
                                </td>
                              </tr>
          <script>
          $("#post'.$post->id.'").keyup(function () {
              var max = 280;
              var len = $(this).val().length;
              if (len > max) {
                $(".count'.$post->id.'").text(len).removeClass("text-info").addClass("text-danger");
              }
              else if (len < max) {
                $(".count'.$post->id.'").text(len).removeClass("text-danger").addClass("text-info");
              }
            });
            </script>
                            </tbody>
                          </table>
          
          
                        </div>
                        <!-- card-body -->
          
                      </div>
                      <!-- card -->
                    </div>
                    <div class="modal-footer justify-content-between">
          
                      <button onclick="return false" class="btn btn-primary"><i class=" fa fa-check"></i> Save</button>
                    </div>
                  </div>
                  <!--modal-content -->
                </div>
                <!-- modal-dialog -->
              </div>
              <!-- modal -->';

            foreach ($result as $key => $res) {
            
            $max_p= 0;
              $sch_start_time = explode(',',$res[0]['auto_schedule_time_start']);
              $sch_end_time = explode(',',$res[0]['auto_schedule_time_end']);
              $max_post = explode(',',$res[0]['max_post']);
              foreach($max_post as $mp){
                $max_p = $max_p + $mp;
              }

              $max_posts = 24/$max_p;
              $post_time[$key]['posting_time'] = date('Y-m-d H:i:s', strtotime('+'.$max_posts.' hour'.$post_time[$key]['posting_time']));
              $count_st = count($sch_start_time);
              $sched_post_time = date('h:i a', rand(strtotime($sch_start_time[$inc[$key]]), strtotime($sch_end_time[$inc[$key]])));

              
                $hasfb = $hastw = $hasinsta = $hasgb = '';
                if ($res[0]['hasfb'] == 1) {
                    $hasfb = '<li class="bg-blue"><i class="nav-icon fab fa-facebook-f"></i></li>';
                } else {
                    $hasfb = '';
                }
                if ($res[0]['hastw'] == 1) {
                    $hastw = '<li class="bg-lightblue"><i class="nav-icon fab fa-twitter"></i></li>';
                } else {
                    $hastw = '';
                }
                if ($res[0]['hasinsta'] == 1) {
                    $hasinsta = '<li class="bg-orange"><i class="nav-icon fab fa-instagram"></i></li>';
                } else {
                    $hasinsta = '';
                }
                if ($res[0]['hasgb'] == 1) {
                    $hasgb = '<li class="bg-success"><i class="nav-icon fab fa-google"></i></li>';
                } else {
                    $hasgb = '';
                }
                $business = $business.'
                    <tr class="">
                        <td>
                        <div class="address">
                            <ul class="icon-list">
                            <li class="address-name"><i class="nav-icon far fa-building"></i>
                                '.$res[0]['b_name'].'</li>

                            </ul>
                        </div>
                        </td>
                        <td>
                        <div class="address">
                            <ul class="icon-list">
                            <li class="address-street"><i
                                class="nav-icon fas fa-map-marker-alt"></i>'.$res[0]['address'].'</li>

                            </ul>
                        </div>
                        </td>
                        <td>
                        <div class="social-icons">
                            <ul>
                            '.$hasfb . $hastw . $hasinsta . $hasgb .'        
                            </ul>
                        </div>
                        </td>
                        <td>
                        <div class="address">
                            <ul class="icon-list">
                            <li class="date_show"><i
                                class="nav-icon fas fa-calendar-alt"></i><span
                                class="datesched">'.date('d/m/Y', strtotime($post_time[$key]['posting_time'])).'</span><input type="hidden" name="date_schedule'.$res[0]['id'].'-'.$index.'" value="'.date('d-m-Y', strtotime($post_time[$key]['posting_time'])).'" class="form-group"></li>
                            <li class="time_show"><i class="nav-icon far fa-clock"></i><span
                            class="timesched">'.$sched_post_time.'</span><input type="hidden" name="time_schedule'.$res[0]['id'].'-'.$index.'" value="'.$sched_post_time.'" class="form-group"></li>
                            <li class="time_zone_show"><i class="nav-icon fas fa-map-marker-alt"></i> '.$res[0]['time_zone'].'</li>

                            </ul>
                        </div>
                        </td>
                        <td>
                        <ul class="icon-list">
                            <li class="">
                            <input type="checkbox" name="schedule_status'.$res[0]['id'].'" value="1" checked><i class="nav-icon fas fa-check text-success"></i>Good
                            </li>


                        </ul>
                        </td>
                        <td>
                        <ul class="icon-list">
                            <li class=""><input type="checkbox" name="post_status'.$res[0]['id'].'" value="1" checked><i class="nav-icon fas fa-check text-success"></i>Good
                            </li>


                        </ul>
                        </td>
                        <td></td>

                    </tr>


                    ';
                    $inc[$key]++;
                    if($inc[$key] == $count_st){
                      $inc[$key]=0;
                    }    
            }
            $tabContent = $tabContent.'<div class="tab-pane text-left fade '.$actshow.'" id="vert-tabs-post'.$post->id.'"
              role="tabpanel" aria-labelledby="vert-tabs-post'.$post->id.'-tab">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">

                      </h3>

                      <div class="card-tools">
                        <ul class="nav " id="custom-tabs-three-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link bg-blue icon-square active"
                              id="custom-tabs-three-facebook-tab'.$post->id.'" data-toggle="pill"
                              href="#custom-tabs-three-facebook'.$post->id.'" role="tab"
                              aria-controls="custom-tabs-three-facebook'.$post->id.'" aria-selected="true"><i
                                class="nav-icon fab fa-facebook-f"></i></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link icon-square bg-lightblue"
                              id="custom-tabs-three-twitter-tab'.$post->id.'" data-toggle="pill"
                              href="#custom-tabs-three-twitter'.$post->id.'" role="tab"
                              aria-controls="custom-tabs-three-twitter'.$post->id.'" aria-selected="false"><i
                                class="nav-icon fab fa-twitter"></i></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link icon-square bg-orange"
                              id="custom-tabs-three-instagram-tab'.$post->id.'" data-toggle="pill"
                              href="#custom-tabs-three-instagram'.$post->id.'" role="tab"
                              aria-controls="custom-tabs-three-instagram'.$post->id.'"
                              aria-selected="false"><i
                                class="nav-icon fab fa-instagram"></i></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link icon-square bg-success"
                              id="custom-tabs-three-google-tab'.$post->id.'" data-toggle="pill"
                              href="#custom-tabs-three-google'.$post->id.'" role="tab"
                              aria-controls="custom-tabs-three-google'.$post->id.'" aria-selected="false"><i
                                class="nav-icon fab fa-google"></i></a>
                          </li>

                        </ul>

                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-three-facebook'.$post->id.'"
                          role="tabpanel" aria-labelledby="custom-tabs-three-facebook-tab'.$post->id.'">

                          Facebook

                        </div>
                        <!--facebook-tab-End-->

                        <div class="tab-pane fade show " id="custom-tabs-three-twitter'.$post->id.'"
                          role="tabpanel" aria-labelledby="custom-tabs-three-twitter-tab'.$post->id.'">

                          Twitter
                        </div>
                        <!--Twitter-End-->
                        <div class="tab-pane fade show " id="custom-tabs-three-instagram'.$post->id.'"
                          role="tabpanel" aria-labelledby="custom-tabs-three-instagram-tab'.$post->id.'">

                          Instagram
                        </div>
                        <!--Twitter-End-->
                        <div class="tab-pane fade show " id="custom-tabs-three-google'.$post->id.'"
                          role="tabpanel" aria-labelledby="custom-tabs-three-google-tab'.$post->id.'">

                          Google
                        </div>
                        <!--Twitter-End-->
                      </div>
                    </div>
                    <!-- /.card-body -->


                  </div>
                  <!-- /.card -->
                </div>
                <!--column-6-->
                <div class="col-lg-6">
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-briefcase text-info mr-1"></i>
                        Businesses
                      </h3>

                      <div class="card-tools">

                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="card card-info collapsed-card">
                        <div class="card-header">
                          <h3 class="card-title"><span class="mr-2">1</span>Set Posting Time
                          </h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool"
                              data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-5 border-right">
                              <div class="description-block">
                                <button type="button"
                                  class="btn  btn-outline-info btn-sm text-uppercase toastrDefaultQueue"><i
                                    class="fas fa-list-ol mr-2"></i>Add
                                  To
                                  Queue
                                </button>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-2 border-right">
                              <div class="description-block">
                                <h5 class="description-header">OR</h5>

                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-5">
                              <div class="description-block">
                                <button type="button"
                                  class="btn  btn-outline-info btn-sm text-uppercase"
                                  data-toggle="modal" data-target="#posting-date-time'.$post->id.'"><i
                                    class="nav-icon fas fa-calendar-alt mr-2"></i>Date &amp;
                                  Time
                                </button>
                              </div>

                              <!--Modal-Date-Time-->
                                <div class="modal fade" id="posting-date-time'.$post->id.'">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> <i class="nav-icon fas fa-calendar-alt mr-2"></i>Date & Time</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card card-primary card-outline">

                                        <!-- /.card-header -->
                                        <div class="card-header">
                                            <h3 class="card-title">
                                            <i class="nav-icon fas fa-calendar-alt mr-2"></i>
                                            POSTING DATE AND TIME
                                            </h3>

                                            <div class="card-tools">

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!-- Date -->
                                            <div class="form-group">
                                            <label>Date:</label>
                                            <div class="input-group date" id="reservationdate'.$post->id.'" data-target-input="nearest">
                                                <input type="text" name="date'.$post->id.'" class="form-control datetimepicker-input" data-target="#reservationdate'.$post->id.'" />
                                                <div class="input-group-append" data-target="#reservationdate'.$post->id.'" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            </div>
                                            <!-- /.form group -->

                                            <div class="form-group">
                                            <label>Time:</label>

                                            <div class="input-group date" id="timepicker'.$post->id.'" data-target-input="nearest">
                                                <input type="text" name="time'.$post->id.'" class="form-control datetimepicker-input" data-target="#timepicker'.$post->id.'" />
                                                <div class="input-group-append" data-target="#timepicker'.$post->id.'" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->


                                        </div>
                                        <!-- /.card-body -->

                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <div class="modal-footer justify-content-between">

                                        <button class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class=" fa fa-check"></i> Save</button>
                                    </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <script>
  //Date range picker
 $("#reservationdate'.$post->id.'").datetimepicker({
      format: "L"
  });

  //Timepicker
  $("#timepicker'.$post->id.'").datetimepicker({
    format: "LT"
  })
  </script>

                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card-posting-time -->

                      <div class="card card-warning collapsed-card">
                        <div class="card-header">
                          <h3 class="card-title"><span class="mr-2">2</span>Select Networks</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool"
                              data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-5 border-right d-flex align-items-center">
                              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn bg-blue ">
                                <input type="hidden" name="option1-'.$post->id.'" value="0"> 
                                  <input type="checkbox" name="option1-'.$post->id.'" id="option1-'.$post->id.'"
                                    checked value="1"> <i
                                    class="nav-icon fab fa-facebook-f"></i>
                                </label>
                                <label class="btn bg-lightblue">
                                <input type="hidden" name="option2-'.$post->id.'" value="0"> 
                                  <input type="checkbox" name="option2-'.$post->id.'" id="option2-'.$post->id.'"
                                    checked value="1"> <i class="nav-icon fab fa-twitter"></i>
                                </label>
                                <label class="btn bg-orange">
                                <input type="hidden" name="option3-'.$post->id.'" value="0"> 
                                  <input type="checkbox" name="option3-'.$post->id.'" id="option3-'.$post->id.'"
                                    checked value="1"> <i
                                    class="nav-icon fab fa-instagram"></i>
                                </label>
                                <label class="btn bg-success">
                                <input type="hidden" name="option4-'.$post->id.'" value="0"> 
                                  <input type="checkbox" name="option4-'.$post->id.'" id="option4-'.$post->id.'"
                                    checked value="1"><i class="nav-icon fab fa-google"></i>
                                </label>
                              </div>
                              <!-- /.social-icons -->
                            </div>
                            <!-- /.col -->

                            <div class="col-sm-7">
                              <div class="d-flex align-items-center flex-direction-column">
                                <div class="toggle ">
                                  <div
                                    class="form-group flex-column m-0 d-flex align-items-center  mb-2">
                                    <label class="mr-1"> LOGO</label>
                                    <input type="checkbox" name="my-checkbox" checked
                                      data-bootstrap-switch data-off-color="danger"
                                      data-on-color="success">
                                  </div>
                                </div>

                                <div class="form-group d-flex align-items-center mb-0">

                                  <select name="logo_type'.$post->id.'" class="form-control">
                                  <option value="">- Select Type -</option>
                                    <option>Light Logo</option>
                                    <option>Default Logo</option>
                                    <option>Dark Logo</option>

                                  </select>
                                </div>
                                <div class="form-group d-flex align-items-center mb-0">
                                <select class="form-control" name="logo_position'.$post->id.'">
                                    <option value="">- Select Position -</option>
                                    <option value="bottom-left">Bottom Left</option>
                                    <option value="bottom-right">Bottom Right</option>
                                    <option value="center">Center</option>
                                    <option value="top-center">Center Top</option>
                                    <option value="bottom-center">Center Bottom</option>
                                    <option value="center-left">Center Left</option>
                                    <option value="center-right">Center Right</option>
                                    <option value="top-left">Top Left</option>
                                    <option value="top-right">Top Right</option>
                                </select>
                            </div>
                                
                              </div>
                            </div>
                            <!-- /.col -->

                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card-Select-Network -->

                      <div class="card card-purple collapsed-card">
                        <div class="card-header">
                          <h3 class="card-title"><span class="mr-2">3</span>Set Content Order
                          </h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool"
                              data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-6 border-right">
                              <div class="description-block">
                                <button type="button"
                                  class="btn  btn-outline-secondary btn-sm text-uppercase "><i
                                    class="fas fa-list-ol mr-2"></i>Package Order

                                </button>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                            <div class="col-sm-6">
                              <div class="description-block">
                                <button type="button"
                                  class="btn  btn-outline-secondary btn-sm text-uppercase toastrDefaultrandom"><i
                                    class="nav-icon fas fa-random mr-2"></i>Random Order

                                </button>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card-posting-time -->

                    </div>
                    <!-- /.card-body -->


                  </div>
                  <!-- /.card -->
                </div>
                <!--column-6-->
              </div>
              <!--row-->

              <div class="row">
                <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ACCOUNTS</th>
                        <th>CITY/STATE</th>
                        <th>POST TO
                        SOCIAL NETWORKS</th>
                        <th>POSTING DATE</th>
                        <th>SCHEDULE</th>
                        <th>STATUS</th>
                        <th><i class="nav-icon far fas fa-cog"></i></th>
                    </tr>
                    </thead>
                    <tbody>
              '.$business.'
              </tbody>
                </table>
                </div>
            </div>
            <!--row-->
          </div>
          <!--/ First-Tab-->';
        }

        $append = '<div class="row">
        <div class="col-4 col-sm-3">
          <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
            aria-orientation="vertical">
            '.$tabs.'
          </div>
        </div>
        <div class="col-8 col-sm-9">
          <div class="tab-content" id="vert-tabs-tabContent">
            '.$tabContent.'
            
          </div>
        </div>
        </div>
        
      <!--row-->
        <div class="">
        <button type="submit" class="btn btn-primary float-right"> Next Step
            <i class="fas fa-chevron-right ml-2"></i></button>
            </div>
            </form>';

        return $append;
    }

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
     
        $posts = Posts::where('id', $id)->first();
        $profile = User::where('id', Auth::user()->id)->first();
        $post = $request->input('post'.$id);
        $post = str_replace("[Company Name]", $profile->company_name, $post);
        $post = str_replace("[Owner's Name]", $profile->contact_name, $post);
        $post = str_replace('[Phone Number]', $profile->company_phone, $post);
        $post = str_replace('[Address]', $profile->company_address, $post);
        $post = str_replace('[Niche]', $profile->niche, $post);
        $posts->post = $post;
        $posts->fb_share_active = $request->input('facebook');
        $posts->tw_share_active = $request->input('twitter');
        $posts->in_share_active = $request->input('instagram');
        $posts->gb_share_active = $request->input('google');
        $posts->logo_type = $request->input('logo_type');
        $posts->logo_active = $request->input('my-logo');
        $posts->logo_position = $request->input('logo_position');
        if($request->input('date') != null){
        	$date = $request->input('date')." ".$request->input('time');
        	$posts->posting_time = date('Y-m-d H:i:s', strtotime($date));
        }
        if ($request->has('image_select'.$id)) {
            $img = ImageGallery::where('id', $request->input('image_select'.$id))->first();
            $image = asset('/'.$img->img_dir.'/'.$img->image);
        } else {
            $image = $request->input('img_link'.$id);
        }
        $posts->image_link = $image;
        $posts->save();
        Session::flash('success', 'Successfully Updated');
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
        $post = Posts::where('id', $id)->first();
        if ($post != null) {
            Session::flash('success', 'Successfully Deleted');
            $post->delete();
        }
        return redirect()->back();
    }
}
