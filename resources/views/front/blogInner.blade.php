@extends('layouts.front')
@section('content')






<section class="blog-detail">
    <div class="all-page-top-image" id="all-page-top-image" style="background-image:url('{{asset('images/main/'.@$dashboard_setting->blog_banner_image)}}')">
        <div class="container">
            <div class="all-page-title" id="all-page-title">
                <h1>{{$blog->title}}</h1>
            </div>
        </div>
    </div>
    <div class="blog-detail-wrapp all-sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="blog-detail-side">
                        
                        <div class="feature-img" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="600"
                        data-sal-easing="ease-out-bounce">
                        <img src="{{asset('images/thumbnail/'.$blog->image)}}" alt="image">
                    </div>
                        
                        
                        <div class="blog_details">
                       <h2 data-sal="slide-up" data-sal-duration="1000" data-sal-delay="600"
                            data-sal-easing="ease-out-bounce">{{$blog->short_description}}</h2>
                        <p data-sal="slide-up" data-sal-duration="1000" data-sal-delay="700"
                            data-sal-easing="ease-out-bounce">
                            <i class="fa fa-clock-o"></i>
                            {{ \Carbon\Carbon::parse($blog->created_at)->format("d M, Y") }}
                            <span class="ml-2">
                                <i class="fa fa-user"></i>
                            </span>
                            {{ $blog->author }}
                        </p>
                      
                        {!!$blog->description!!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="blog-sidebar">
                        <h3>Other Blogs</h3>
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
                           
            
                            <!--<li><a href="{{route('allBlogs')}}">Blog</a></li>-->
                            <div>
                                  
                            <!--<a href="{{route('allBlogs')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                            </div>
                        </div>
                        @endforeach
                        <a href="{{route('allBlogs')}}">More blogs</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>








@endsection