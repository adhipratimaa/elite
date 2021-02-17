@extends('layouts.front')
@section('content')




<section class="blog-list-page">
    <div class="all-page-top-image" id="all-page-top-image" style="background-image:url('{{asset('images/main/'.@$dashboard_setting->blog_banner_image)}}')">
        <div class="container">
            <div class="all-page-title" id="all-page-title">
                <h1>Latest Blogs</h1>
            </div>
        </div>
    </div>
    <div class="blog-layout all-sec-padding">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-cart">
                        <a href="{{route('blogInner',$blog->slug)}}" class="blog-image"><img src="{{asset('images/thumbnail/'.$blog->image)}}" alt="image"></a>
                        <div class="blog-content">
                            <a href="{{route('blogInner',$blog->slug)}}" class="blog-title"><h3>{{$blog->title}}</h3></a>
                           {{$blog->short_description}}
                        </div>
                        <span class="button-part">
                            <a href="{{route('blogInner',$blog->slug)}}" class="btn">View Detail</a>
                            <p>{{ \Carbon\Carbon::parse($blog->created_at)->format("d M, Y")}}</p>
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection