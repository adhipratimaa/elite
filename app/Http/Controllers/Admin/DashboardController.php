<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\DashboardRepository;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Testimonial\TestimonialRepository;
use App\Repositories\Blog\BlogRepository;
use App\Models\Subscription;
use App\Models\Career;
use App\Models\Quote;

class DashboardController extends Controller
{
    public function __construct(DashboardRepository $dashboard, ServiceRepository $service, TestimonialRepository $testimonial, BlogRepository $blog ){
        $this->dashboard=$dashboard;
        $this->service=$service;
        $this->testimonial=$testimonial;
        $this->blog=$blog;


       

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=$this->service->orderBy('updated_at','desc');
        $subscribers=Subscription::orderBy('updated_at','desc');
        $testimonials=$this->testimonial->get();
        $blogs = $this->blog->orderBy('created_at','desc')->limit(2)->get();
        $quotes=Quote::orderBy('updated_at','desc')->limit(6)->get();
        $careers=Career::orderBy('updated_at','desc')->limit(6)->get();
        
        return view('admin.dashboard',compact('services', 'subscribers', 'testimonials', 'blogs', 'careers', 'quotes'));
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
        $this->validate($request,['meta_title'=>'max:250','num_banner_1'=>'integer|min:0','num_banner_2'=>'integer|min:0']);
        $data=$request->except('logo','fav_icon');
        if($request->fav_icon){
            $image=$request->file('fav_icon');
            $imageName = time().'.favicom'.$image->getClientOriginalExtension();

            $image->move(public_path('images/thumbnail'),$imageName);
            $data['fav_icon']=$imageName;
        }
        if($request->logo){
            $logo=$request->file('logo');
            $imageName = time().'.logo'.$logo->getClientOriginalExtension();
            $logo->move(public_path('images/thumbnail'),$imageName);
            $data['logo']=$imageName;
        }
        $this->dashboard->update($data,$id);
        return redirect()->back()->with('message','Dashboard Updated Successfully');
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
