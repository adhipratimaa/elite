<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Career\CareerRepository;
use App\Models\Career;
use Image;
use PDF;


class CareerController extends Controller
{
    public function __construct(CareerRepository $career){
        $this->career=$career;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->career->orderBy('created_at','desc')->get();
        return view('admin.career.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort('404');
        return view('admin.career.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = $request->except('image','publish');
        $value['publish']= is_null($request->publish)?0:1;
        if($request->image){

            $image=$this->imageProcessing($request->file('image'));
            $value['image']=$image;
        }
        $this->career->create($value);
        return redirect()->route('career.index')->with('message','Career Added Succssfully');
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
        $detail = $this->career->findOrFail($id);
        return view('admin.career.edit',compact('detail'));
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
        $old=$this->career->find($id);
        
        $sameSlugVal = $old->slug == $request->slug ? true : false;
        $this->validate($request, $this->rules($old->id,$sameSlugVal));
        $value=$request->except('image','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image){
            $image=$this->career->find($id);
            if($image->image){
                $thumbPath = public_path('images/thumbnail');
                $mainPath = public_path('images/main');
                $listingPath = public_path('images/listing');
                if((file_exists($thumbPath.'/'.$image->image)) && (file_exists($listingPath.'/'.$image->image)) &&(file_exists($mainPath.'/'.$image->image))){
                    unlink($thumbPath.'/'.$image->image);
                    unlink($mainPath.'/'.$image->image);
                    unlink($listingPath.'/'.$image->image);
                }
            }
            $image=$this->imageProcessing($request->file('image'));
            $value['image']=$image;
        }
        if($request->banner_image){
            $image=$request->file('banner_image');
            $name= time().'.'.$image->getClientOriginalExtension();
            $mainPath = public_path('images/main');
            $img = Image::make($image->getRealPath());
            $img->fit(1349,395)->save($mainPath.'/'.$name);
            $value['banner_image']=$name;     
        }
        $this->career->update($value,$id);
        return redirect()->route('career.index')->with('message','Career Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $careers=Career::findorfail($id);
		$careers->delete();
		return redirect()->route('career.index')->with('message','Career Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $thumbPath = public_path('images/thumbnail');
       $mainPath = public_path('images/main');
       $listingPath = public_path('images/listing');
       
       $img1 = Image::make($image->getRealPath());
       $img1->fit(530, 300)->save($thumbPath.'/'.$input['imagename']);
       $img2 = Image::make($image->getRealPath());
       $img2->fit(99, 88)->save($listingPath.'/'.$input['imagename']);
      
       $destinationPath = public_path('/images');
       return $input['imagename'];     
    }
    public function rules($oldId = null, $sameSlugVal=false){

        $rules =  [
            'title' => 'required',
            'slug' => 'unique:careers|max:255',
            'image'=>'mimes:jpeg,bmp,png'
            
        ];
        if($sameSlugVal){
            $rules['slug'] = 'unique:services,slug,'.$oldId.'|max:255';
        }
        return $rules;
    }
    
     public function downloadCareer($id){
        //return view('admin.quote.download');
       $data = $this->career->findOrFail($id);
       // dd($data);
       // $data= [];
       // dd($data);
        // $data=[];
      $datas = [
        'first_name' => $data->first_name,
        'last_name' => $data->last_name,
        'cv'=>$data->cv,
        'email' => $data->email,
        'phone' => $data->phone,
        'inquiries' => $data->inquiries
				            
      ];
        // view()->share('admin.quote.download',$data);
      // return view('admin.quote.pdf-download', compact('datas'));
     
      $pdf = PDF::loadView('admin.career.download',$datas);

      //download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }
}
