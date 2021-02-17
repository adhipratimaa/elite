@extends('layouts.front')
@section('content')





<section class="career-page">
    <div class="all-page-top-image" id="all-page-top-image" style="background-image:url('{{asset('images/main/'.@$dashboard_setting->career_banner_image)}}')">
        <div class="container">
            <div class="all-page-title" id="all-page-title">
                <h1>{{$page->title}}</h1>
            </div>
        </div>
    </div>
    <div class="service-detail-page  all-sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12">
                      @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible message">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {!! Session::get('message') !!}
                            </div>
                            @endif
                    <div class="service-detail-content">
                        <h3>{{$page->short_description}}</h3>
                        {!!$page->description!!}
                        <form action="{{route('contactUs_career')}}" method="POST" enctype="multipart/form-data" class="career-form career-form-wrapper">
                            {{csrf_field()}}
                            <h3>Apply Now</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" placeholder="First Name*" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" placeholder="Last Name*" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" placeholder="Email*" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" placeholder="Phone*" required>
                                </div>
                                <div class="col-12">
                                    <label for="cv">Upload CV</label>
                                    <input type="file" name="cv" required>
                                </div>
                                <div class="col-12">
                                    <label for="inquiries">Cover Letter</label>
                                    <textarea name="inquiries" id="" cols="30" rows="10" placeholder="Cover Letter*"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="career-submit-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <!--<div class="col-lg-4 col-md-4 col-12">
                    <div class="career-sidebar">
                        <h2 class="career-sidebar-title">Latest Blogs</h2>
                        @foreach($recentBlogs as $recentBlog)
                        
                   
                        
                        
                        <div class="blog-cart">
                            <a href="{{route('blogInner',$recentBlog->slug)}}" class="blog-image"><img src="{{asset('images/thumbnail/'.$recentBlog->image)}}" alt="image"></a>
                            <div class="blog-content">
                                <a href="{{route('blogInner',$recentBlog->slug)}}" class="blog-title"><h3>{{$recentBlog->title}}</h3></a>
                            </div>
                            <span class="button-part">
                                <a href="{{route('blogInner',$recentBlog->slug)}}" class="btn">View Detail</a>
                                <p>{{ \Carbon\Carbon::parse($recentBlog->created_at)->format("d M, Y") }}</p>
                            </span>
                        </div>
                        
                        
               
                @endforeach
                    </div>
                    
                </div>-->
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="contact-address-side">
                        <div class="contact-media">
                            <h3>Keep In Touch </h3>
                            <ul>
                                <li><a href="{{$dashboard_setting->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="{{$dashboard_setting->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="{{$dashboard_setting->linkedin}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="mailto: {{$dashboard_setting->email}}" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="contact-address">
                            <h3>Location</h3>
                            <ul>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{@$dashboard_setting->address}}</li>
                                <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i>Phone: +1 {{@$dashboard_setting->phone}}</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">Email: {{@$dashboard_setting->email}}</a></li>
                            </ul>
                        </div>
                        <div class="map">
                        <h3>Office Map</h3>
                        <iframe src="{{@$dashboard_setting->office_map}}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28264.00886013741!2d85.30514698700163!3d27.68636064922247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1855b4c41e49%3A0xb8bb84fe183817ef!2sBajaryogini%20Savings%20and%20Credit%20Cooperatives%20Ltd.!5e0!3m2!1sen!2snp!4v1606409442365!5m2!1sen!2snp" width="540" height="390" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>        </div>-->
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14132.51492309395!2d85.3329801!3d27.6824159!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x32ba8029d5f9110e!2sWeb%20House%20Nepal%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1608446414955!5m2!1sen!2snp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
                        <!--<iframe src="{{@$dashboard_setting->office_map}}"></iframe>-->
                    </div>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</section>




@endsection