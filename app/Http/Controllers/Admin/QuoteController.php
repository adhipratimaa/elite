<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Quote\QuoteRepository;
use App\Models\Quote;
use Image;
use PDF;


class QuoteController extends Controller
{
    public function __construct(QuoteRepository $quote){
        $this->quote=$quote;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->quote->orderBy('created_at','desc')->get();
        return view('admin.quote.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort('404');
        return view('admin.quote.create');
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
        return redirect()->route('quote.index')->with('message','Quote Added Succssfully');
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
        $detail = $this->quote->findOrFail($id);
        return view('admin.quote.edit',compact('detail'));
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
        $old=$this->quote->find($id);
        
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
        $this->quote->update($value,$id);
        return redirect()->route('quote.index')->with('message','Quote Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotes=Quote::findorfail($id);
		$quotes->delete();
		return redirect()->route('quote.index')->with('message','Quote Deleted Successfully');
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
            'slug' => 'unique:quotes|max:255',
            'image'=>'mimes:jpeg,bmp,png'
            
        ];
        if($sameSlugVal){
            $rules['slug'] = 'unique:quotes,slug,'.$oldId.'|max:255';
        }
        return $rules;
    }
    
    public function downloadQuote($id){
        //return view('admin.quote.download');
       $data = $this->quote->findOrFail($id);
       // dd($data);
       // $data= [];
       // dd($data);
       // $data=[];
       $datas = [
        'first_name' => $data->first_name,
        'last_name' => $data->last_name,
        'email' => $data->email,
        'phone_number' => $data->phone_number,
        'state' => $data->state,
        'city' => $data->city,
        'project_location' => $data->project_location,
        'zip' => $data->zip,
        'services' => $data->services,
        'other_services' => $data->other_services,
        'project_type' => $data->project_type,
        'storey' => $data->storey,
        'house_area' => $data->house_area,
        'design_start_date' => $data->design_start_date,
        'estimated_starting_date' => $data->estimated_starting_date,
        'budget' => $data->budget,
        'further_information' => $data->further_information
        
       ];
        // view()->share('admin.quote.download',$data);
      // return view('admin.quote.pdf-download', compact('datas'));
     
      $pdf = PDF::loadView('admin.quote.download',$datas);

      //download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }
}
