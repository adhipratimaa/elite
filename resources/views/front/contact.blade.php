@extends('layouts.front')
@section('content')

<section class="contact-page">
    <div class="all-page-top-image" id="all-page-top-image" style="background-image:url('{{asset('images/main/'.@$dashboard_setting->contact_banner_image)}}')">
        <div class="container">
            <div class="all-page-title" id="all-page-title">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>
    <div class="contact-page-parent all-sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="contact-form-side">
                            @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible message">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {!! Session::get('message') !!}
                            </div>
                            @endif
                        <div class="title-wrapper contact-title">
                            <h2>Stay Connected</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus repudiandae optio ut earum, nobis quam voluptates sint vel est vitae?</p>
                        </div>
                        <form action="{{route('contactUs')}}" method="POST"  class="row contact-form-parent">
                        {{csrf_field()}}
                            <div class="col-lg-6">
                                <label for="name">Your Name</label>
                                <input class="input" type="text" name="name" placeholder="Name*" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Your Email</label>
                                <input type="email" name="email" placeholder="Email*" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" placeholder="Phone*" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" placeholder="Subject*" required>
                            </div>
                            <div class="col-12">
                                <label for="message">Messege</label>
                                <textarea name="message" id="" cols="30" placeholder="Comment*" rows="10" required></textarea>
                            </div>
                            <div class="col-12">
                                <button>Send Messege</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{@$dashboard_setting->address}}</li>
                                <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i>Phone: {{@$dashboard_setting->phone}}</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">Email: {{@$dashboard_setting->email}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>








@endsection