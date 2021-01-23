<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPage;
use App\LandingPageTemplate;
use Auth;
use Session;

class LandingPageController extends Controller
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
        $data = LandingPage::where('user_id', Auth::user()->id)->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function landing_form()
    {
        $temp = LandingPageTemplate::get();
        return view('add-landing')->with('temp',$temp);
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
            'days' => 'required|max:45',
            'temp' => 'required|not_in:0',
                       
        ]);

        $template = new LandingPage();
        $template->name = $request->input('name');
        $template->days = $request->input('days');
        $template->landing_page_template_id = $request->input('temp');
        $template->user_id = Auth::user()->id;
        $template->save();
        Session::flash('success', 'Successfully Created');
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
        $land_page = LandingPage::where('id', $id)->first();
        if ($land_page != null) {
            Session::flash('success', 'Successfully Deleted');
            $land_page->delete();
        }
        return redirect()->back();
    }
}
