@extends('layouts.front')
@section('content')






<section class="service-detail">
    <div class="all-page-top-image" id="all-page-top-image" style="background-image:url('{{asset('images/main/'.$service->banner_image)}}')">
        <div class="container">
            <div class="all-page-title" id="all-page-title">
                <h1>{{$service->title}}</h1>
            </div>
        </div>
    </div>
    <div class="service-detail-page all-sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12">
                    
                    <div class="service-detail-content">
                    <img src="{{asset('images/thumbnail/'.$service->image)}}" alt="service-image">

                        <h3>{{$service->title}}</h3>
                        {!!$service->description!!}
                         
                    </div>
                 
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="service-sidebar">
                        <h3>Contact Us For Help</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, harum.</p>
                        <a href="{{route('contact')}}">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection