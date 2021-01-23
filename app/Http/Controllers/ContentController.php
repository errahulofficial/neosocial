<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostPackage;
use App\Posts;
use Auth;
use Session;

class ContentController extends Controller
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
        $pak = [];
        $arr = ['0'=>'- Select Package -'];
        $p_package = PostPackage::where('user_id', Auth::user()->id)->get();
        foreach($p_package as $pack){
            $pak[$pack->id] = $pack->name;
        }
        $package = $arr + $pak;
        $con_pack = PostPackage::where('user_id', Auth::user()->id)->get();
        return view('content-designer', compact('package', 'con_pack'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxAddContent(Request $request)
    {
        $package = PostPackage::where('id', $request->input('package'))->first();
        $post = new Posts();
        $post->title = $request->input('content');
        $post->post = $request->input('title');
        $post->image_link = $request->input('img_link');
        $post->post_link = $request->input('post_link');
        $post->post_package_id = $request->input('package');
        $post->user_id = Auth::user()->id;
        $post->save();
        $post_count = Posts::where('post_package_id', $request->input('package'))->count();
        $package->post_count = $post_count;
        $package->save();
        return ['success'=> 'Successfully Added'];

    }

    public function create()
    {
        //
    }

    /**
     * Show the form for Getting Content from Feed.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxContent(Request $request)
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
