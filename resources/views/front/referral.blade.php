@extends('layouts.front')
@section('content')



<section class="service-detail">
    <div class="all-page-top-image" id="all-page-top-image" style="background-image:url('{{asset('images/main/'.@$dashboard_setting->program_banner_image)}}')">
        <div class="container">
            <div class="all-page-title" id="all-page-title">
                <h1>{{$page->title}}</h1>
            </div>
        </div>
    </div>

   
                   

    <div class="service-detail-page all-sec-padding">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible message">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        {!! Session::get('message') !!}
                </div>
            @endif
                    <div class="service-detail-content">
                   <!-- <img src="{{asset('front/images/service-image2.jpg')}}" alt="service-image">-->
                        <h3>{{$page->short_description}}</h3>
                            {!!$page->description!!}
                    </div>
         
                    

                   
                    <form action="{{route('referral_programs')}}" method="POST" class="career-form referal-form service-sidebar" >
                        {{csrf_field()}}
                        <h3>Join our referral program</h3>
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" placeholder="First Name*" required>
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" placeholder="Last Name*" required>
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email*" required>
                        <label for="phone">Phone</label>
                        <input type="number" name="number" placeholder="Phone*" required>
                        <label for="message">Messege </label>
                        <textarea name="message" id="message" cols="30" rows="7" placeholder="Message*" required></textarea>
                        <button>Submit</button>
                    </form>
    
         
        </div>
    </div>
</section>




@endsection