@extends('layouts.front')
@section('content')

<section class="service-page">
    <div class="all-page-top-image" id="all-page-top-image" style="background-image:url('{{asset('images/main/'.@$dashboard_setting->services_banner_image)}}')">
        <div class="container">
            <div class="all-page-title" id="all-page-title">
                <h1>Services</h1>
            </div>
        </div>
    </div>
    <div class="service-page-section all-sec-padding">
        <div class="container">
            <div class="title-wrapper">
                <h2>Popular Services</h2>
                <p>Rapid solutions to the most complex business challenges with cooperative process-driven.</p>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6 col-12 service-col">
                    <div class="service-box">
                        <a href="{{route('serviceInner',$service->slug)}}" class="service-image"><img src="{{asset('images/thumbnail/'.$service->image)}}" alt="service"></a>
                        <a href="{{route('serviceInner',$service->slug)}}" class="service-content">
                            <h3>{{$service->title}}</h3>
                             <p>{!!Str::limit($service->short_description, 200)!!}</p>
                        </a>
                        <a href="{{route('serviceInner',$service->slug)}}" class="Learn-btn">Learn More</a>
                    </div>
                </div>
                @endforeach
              
            </div>
        </div>
    </div>
</section>




@endsection