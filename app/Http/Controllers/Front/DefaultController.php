<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Career;
use App\Models\Payment;
use App\Models\Subscription;
use App\Http\Controllers\Controller;
use App\Repositories\Slider\SliderRepository;
use App\Repositories\Testimonial\TestimonialRepository;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Program\ProgramRepository;
use App\Repositories\Career\CareerRepository;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Page\PageRepository;
use Mail;
use File;




class DefaultController extends Controller
{
	public function __construct(SliderRepository $slider, TestimonialRepository $testimonial,ServiceRepository $service, ProgramRepository $program, CareerRepository $career, PageRepository $page, BlogRepository $blog){
		$this->slider=$slider;
		$this->testimonial=$testimonial;
		$this->service=$service;
		$this->program=$program;
        $this->career=$career;
        $this->page=$page;
        $this->blog=$blog;
        
	}

	public function index(){
		$sliders=$this->slider->orderBy('created_at','desc')->where('publish',1)->take(3)->get();
		$testimonials=$this->testimonial->where('publish',1)->orderBy('created_at','desc')->take(3)->get();
		$services=$this->service->where('publish',1)->orderBy('created_at','desc')->take(6)->get();
        $sliders=$this->slider->orderBy('created_at','desc')->where('publish',1)->take(3)->get();
        return view('front.index',compact('sliders','services','testimonials'));
	}

	

    // public function program(){
    // 	$page=$this->page->orderBy('created_at', 'desc')->where('publish',1)->first();
        
    //     return view('front.referral');

    // }

    public function career(){
        // $page=$this->page->orderBy('created_at', 'desc')->where('publish',1)->first();

        $blog=$this->blog->where('slug',$slug)->where('publish',1)->first();
        if($blog){
            $recentBlogs=$this->blog->orderBy('created_at','desc')->where('id','!=', $blog->id)->where('publish',1)->take(5)->get();
            return view('front.career',compact('blog','recentBlogs'));
        }
        
        // return view('front.career');
    }
    
    public function page($slug){
        $page=$this->page->where('slug',$slug)->first();
        // dd($page);
        if($page){

            if($slug=='referral-programs'){
                // dd($page);
                
                return view('front.referral',compact('page'));
            }
            if($slug=='career'){
                // dd($page);
                // $blog=$this->blog->where('slug',$slug)->where('publish',1)->first();
        // if($blog){
            $recentBlogs=$this->blog->orderBy('created_at','desc')->where('publish',1)->take(5)->get();
                
                return view('front.career',compact('page','recentBlogs'));
            // }

            //return view('front.pageTamplate');
        }
        abort(404);
    }
}

    


    

    public function contactUs_career(Request $request){
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email'=>'required',
            'inquiries'=>'required',
            'cv' => 'required',
            ]);
            
            $data=[
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'inquiries'=>$request->inquiries,
                'cv'=>$request->cv
            ];

            if($request->cv){
                $path=public_path().'/images/file';
           
            if(!File::exists($path)){
               File::makeDirectory($path,0777,true,true);
           }
           
            $file_name="document-".date('Ymdhis').rand(0,1234).".".$request->cv->getClientOriginalExtension();
            $success=$request->cv->move($path,$file_name);
            $data['cv'] =$file_name;
            }

            // $career = Career::create($data); // create, save, update. insert
            $career = new Career();
            $career->fill($data);
            $career->save($data);
            // return redirect()->back()->with('message','Thank You, Your application has been submitted successfully');
        // return Redirect::back()->withErrors(['Thank you for contacting us.']);
            $data['filepath'] = $path.'/'.$data['cv'];
        Mail::send('email.career_contact', $data,function ($message) use ($data, $request) {
            $message->to('prabal@webhousenepal.com')->from($data['email'])->attach($data['filepath'] ,
                            [
                                'as' => $request->cv->getClientOriginalName(),
                            ]);
                        $message->subject('Career');
                       });
        return redirect()->back()->with('message','Thank You, Your application has been submitted successfully');
    }

    public function referral_programs(Request $request){
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'number'=>'required|numeric',
            'message'=>'required'
        ]);



        $data=[
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'number'=>$request->number,
            'message_detail'=>$request->message
        ];
        Mail::send('email.referral', $data,function ($message) use ($data) {
                        $message->to('prabal@webhousenepal.com')->from($data['email']);
                        $message->subject('Referral Programs');
                       });
        return redirect()->route('page',['referral-programs'])->with('message','Thank you for contacting us');
    }


     public function services(){
        $services=$this->service->where('publish',1)->orderBy('created_at','desc')->get();
        return view('front.service',compact('services'));
    }

     public function serviceInner($slug){
        $service=$this->service->where('slug',$slug)->first();
        if($service){
            $recentServices=$this->service->where('publish',1)->orderBy('created_at','desc')->where('id','!=',$service->id)->take(6)->get();
            return view('front.serviceInner',compact('service','recentServices'));
        }
        // abort(404);
    }

    public function subscription(Request $request){
        $this->validate($request,[
            'email'=>'required|email|unique:subscriptions'
        ]);

        $data=['email'=>$request->email];

        $success= Subscription::create($data);
        return redirect()->back()->with('subscription_message','Thank you for contacting us');

    }

    public function contact(){
        return view('front.contact');
    }

    public function contactUs(Request $request){
        // dd($request);
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'subject'=>'required',
            'message'=>'required']);

        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message_detail'=>$request->message];

        Mail::send('email.contactus', $data,function ($message) use ($data) {
                        $message->to('prabal@webhousenepal.com')->from($data['email']);
                        $message->subject('Contact');
                       });
        return redirect()->back()->with('message','Thank you for contacting us');
    }


    public function payment(){
        return view('front.payment');
    }

    public function payment_store(Request $request){
       // dd($request);
      
        $this->validate($request,[
            'name' => 'required',
            'amount' => 'required',
            'remark'=>'required',
        ]);

        $payment =new Payment();
        $data= $request->except('_token');
        $payment->fill($data);
        $payment->save();

        return redirect()->route('payment')->with('message','Thank you for the payment');
    }

    

    

    // public function fileProcessing($file){
    //    $input['filename'] = time().'.'.$image->getClientOriginalExtension();
    //    $thumbPath = public_path('images/file');
    //    $img = Image::make($image->getRealPath());
    //    $img->fit(1349,395)->save($thumbPath.'/'.$input['imagename']);
    //    $img->fit(200, 100)->save($listingPath.'/'.$input['imagename']);
      
    //    return $input['imagename'];     
    // }


       

     public function quote(){
        return view('front.quote');
    }

    public function quote_store(Request $request){
       
      
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email'=>'required',
            'state'=>'required',
            'city' => 'required',
            'project_location' => 'required',
            'zip' => 'required|digits:5',
            'services' => 'required',
            'project_type' => 'required',
            'storey'=>'required|string|in:single-story,double-story,three-story,more_than_three_story',
            'house_area'=>'required',
            'design_start_date'=>'required',
            'estimated_starting_date'=>'required',
            
           
        ]);

        $quote =new Quote();
        // dd($quote);
        $data= $request->except('_token');
        $services = $request['services'];
        $project_type = $request['project_type'];
        $services = implode(", ", $services); //saves multiple options to database
        $project_type = implode(", ", $project_type); //saves multiple options to database
        $data['services'] = $services;
        $data['project_type']=$project_type;
        $quote->fill($data);
        $quote->save();
        

        Mail::send('email.quotation', $data,function ($message) use ($data) {
                        $message->to('prabal@webhousenepal.com')->from($data['email']);
                        // $message->subject($data['subject']);
                         $message->subject('Quotation');
                }); 
        
        return redirect()->route('quote')->with('message','Thank you for contacting us');
    }

    
    

     public function allBlogs(){
        $blogs=$this->blog->where('publish',1)->orderBy('created_at','desc')->paginate(20);

        return view('front.allBlogs',compact('blogs'));
    }

    public function blogInner($slug){
        $blog=$this->blog->where('slug',$slug)->where('publish',1)->first();
        if($blog){
            $recentBlogs=$this->blog->orderBy('created_at','desc')->where('id','!=', $blog->id)->where('publish',1)->take(4)->get();
            return view('front.blogInner',compact('blog','recentBlogs'));
        }
    }



}
