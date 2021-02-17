<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Setting\SettingRepository;
use Image;

class SettingController extends Controller
{
    public function __construct(SettingRepository $setting){
        $this->setting=$setting;
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $detail=$this->setting->first();
        // dd($detail);
        return view('admin.setting',compact('detail'));
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

        // $this->validate($request,[
        //     'experience'=>'integer|min:0','work'=>'integer|min:0','complete_project'=>'integer|mini:0']);
        $this->validate($request,['work'=>'integer|min:0','complete_project'=>'integer|min:0','experience'=>'integer|min:0']);
        $value=$request->except('logo','fav_icon', 'image');
        if($request->fav_icon){
            $image=$request->file('fav_icon');
            $imageName = time().'.favicom'.$image->getClientOriginalExtension();

            $image->move(public_path('images/thumbnail'),$imageName);
            $value['fav_icon']=$imageName;
        }
        if($request->logo){
            $logo=$request->file('logo');
            $imageName = time().'.logo.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('images/thumbnail'),$imageName);
            $value['logo']=$imageName;
        }
        if($request->footer_logo){
            $logo=$request->file('footer_logo');
            $imageName = time().'.footerlogo'.$logo->getClientOriginalExtension();
            $logo->move(public_path('images/thumbnail'),$imageName);
            $value['footer_logo']=$imageName;
        }

        if($request->image){
            $image=$request->file('image');
            $imageName = time().'.image.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/thumbnail'),$imageName);
            $value['image']=$imageName;
        }
        if($request->banner_image){
            $banner_image=$request->file('banner_image');
            $imageName = time().'.banner.'.$banner_image->getClientOriginalExtension();
            $banner_image->move(public_path('images/main'),$imageName);
            $value['banner_image']=$imageName;
        }
        if($request->services_banner_image){
            $image=$request->file('services_banner_image');
            $name= time().'.services.'.$image->getClientOriginalExtension();
            $mainPath = public_path('images/main');
            $img = Image::make($image->getRealPath());
            $img->fit(1348,720)->save($mainPath.'/'.$name);
            $value['services_banner_image']=$name;     
        }
        
        if($request->contact_banner_image){
            $image=$request->file('contact_banner_image');
            $name= time().'.contact.'.$image->getClientOriginalExtension();
            $mainPath = public_path('images/main');
            $img = Image::make($image->getRealPath());
            $img->fit(1349,395)->save($mainPath.'/'.$name);
            $value['contact_banner_image']=$name;     
        }

         if($request->career_banner_image){
            $image=$request->file('career_banner_image');
            $name= time().'.career.'.$image->getClientOriginalExtension();
            $mainPath = public_path('images/main');
            $img = Image::make($image->getRealPath());
            $img->fit(1349,395)->save($mainPath.'/'.$name);
            $value['career_banner_image']=$name;     
        }

         if($request->blog_banner_image){
            $image=$request->file('blog_banner_image');
            $name= time().'.blog.'.$image->getClientOriginalExtension();
            $mainPath = public_path('images/main');
            $img = Image::make($image->getRealPath());
            $img->fit(1349,395)->save($mainPath.'/'.$name);
            $value['blog_banner_image']=$name;     
        }

         if($request->program_banner_image){
            $image=$request->file('program_banner_image');
            $name= time().'.program.'.$image->getClientOriginalExtension();
            $mainPath = public_path('images/main');
            $img = Image::make($image->getRealPath());
            $img->fit(1349,395)->save($mainPath.'/'.$name);
            $value['program_banner_image']=$name;     
        }
       

        if($request->quote_banner_image){
            $image=$request->file('quote_banner_image');
            $name= time().'.quote.'.$image->getClientOriginalExtension();
            $mainPath = public_path('images/main');
            $img = Image::make($image->getRealPath());
            $img->fit(1349,395)->save($mainPath.'/'.$name);
            $value['quote_banner_image']=$name;     
        }

        $this->setting->update($value,$id);
        return redirect()->back()->with('message','Setting Updated Successfully');
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
