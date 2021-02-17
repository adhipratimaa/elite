@extends('layouts.front')
@section('content')





    <section class="quote-page">
        <div class="all-page-top-image" id="all-page-top-image" style="background-image:url('{{asset('images/main/'.@$dashboard_setting->quote_banner_image)}}')">
            <div class="container">
                <div class="all-page-title" id="all-page-title">
                    <h1>Quote Title Here</h1>
                </div>
            </div>
        </div>
        <div class="quote-page all-sec-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="quote-content title-wrapper contact-title">
                            <h2>Contact Information</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, distinctio magnam incidunt eos impedit doloribus ad quod expedita veritatis fuga maiores corrupti error temporibus vitae, odit possimus, vel voluptatum inventore.</p>
                        </div>
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
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto: {{@$dashboard_setting->email}}">Email: {{@$dashboard_setting->email}}</a></li>
                            </ul>
                        </div>
                        <div class="map">
                        <h3>Office Map</h3>
                        <iframe src="{{@$dashboard_setting->office_map}}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28264.00886013741!2d85.30514698700163!3d27.68636064922247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1855b4c41e49%3A0xb8bb84fe183817ef!2sBajaryogini%20Savings%20and%20Credit%20Cooperatives%20Ltd.!5e0!3m2!1sen!2snp!4v1606409442365!5m2!1sen!2snp" width="540" height="390" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>        </div>-->
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14132.51492309395!2d85.3329801!3d27.6824159!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x32ba8029d5f9110e!2sWeb%20House%20Nepal%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1608446414955!5m2!1sen!2snp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
                        
                    </div>
                    </div>
               
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">

                       <!--  @if (count($errors) > 0)
                            <div class="alert alert-danger message">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif -->

                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible message">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {!! Session::get('message') !!}
                            </div>
                            @endif




                        <form action="{{route('quote_store')}}" method="POST" class="row quote-form">
                            {{csrf_field()}}
                            <div class="col-12 contact-media quote-title"><h3>Contact Information:</h3></div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <input type="text" name="first_name" placeholder="First Name" value="{{old('first_name')}}">
                                @if($errors->has('first_name'))
                                    <span class="alert-danger">{{$errors->first('first_name')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <input type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}">
                                @if($errors->has('last_name'))
                                    <span class="alert-danger">{{$errors->first('last_name')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <input type="email" name="email" placeholder="email" value="{{old('email')}}">
                                 @if($errors->has('email'))
                                    <span class="alert-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <input type="text" name="phone_number" placeholder="Phone Number" value="{{old('phone_number')}}">
                                 @if($errors->has('phone_number'))
                                    <span class="alert-danger">{{$errors->first('phone_number')}}</span>
                                @endif
                            </div>
                            <div class="col-12 contact-media quote-title"><h3>Site Information:</h3></div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <input type="text" name="state" placeholder="State" value="{{old('state')}}">
                                 @if($errors->has('state'))
                                    <span class="alert-danger">{{$errors->first('state')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <input type="text" name="city" placeholder="City" value="{{old('city')}}">
                                 @if($errors->has('city'))
                                    <span class="alert-danger">{{$errors->first('city')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <input type="text" name="project_location" placeholder="Project Location" value="{{old('project_location')}}">
                                 @if($errors->has('project_location'))
                                    <span class="alert-danger">{{$errors->first('project_location')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <input type="number" name="zip" placeholder="Zip Code" value="{{old('zip')}}">
                                 @if($errors->has('zip'))
                                    <span class="alert-danger">{{$errors->first('zip')}}</span>
                                @endif
                            </div>
                           <div class="col-lg-12 service-checkbox contact-media quote-title checkbox-title">
                                <h3>What service(s) do you need?:</h3>
                               <div class="whole-checkbox-wrapp">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="structural_engineering" id="customCheck" name="services[]">
                                        <label class="custom-control-label" for="customCheck">Structural engineering</label>
                                    </div>

                                  <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" name="services[]" value="MEP_engineering">
                                        <label class="custom-control-label"  for="customCheck2">Mechanical HVAC</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3" name="services[]" value="electrical">
                                        <label class="custom-control-label"  for="customCheck3">Electrical</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4" name="services[]" value="plumbing_engineering">
                                        <label class="custom-control-label"  for="customCheck4">Plumbing Engineering</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck5" name="services[]" value="pool_engineering">
                                        <label class="custom-control-label"  for="customCheck5">Pool Engineering</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck6" name="services[]" value="architectural_design_and_drafting">
                                        <label class="custom-control-label"  for="customCheck6">Architectural Design and Drafting</label>
                                    </div>
                                     @if($errors->has('services'))
                                    <span class="alert-danger">{{$errors->first('services')}}</span>
                                @endif
                               </div>
                              
                                <h3>Other: (please specify below)</h3>
                                <input type="text" name="other_services" placeholder="Other Service" value="{{old('other_services')}}">
                           </div>
                           <div class="col-lg-12 service-checkbox contact-media quote-title checkbox-title">
                                <h3>What type of project is it:</h3>
                               <div class="whole-checkbox-wrapp">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7" name="project_type[]" value="single-family">
                                     <label class="custom-control-label" for="customCheck7">Single-Family</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck8" name="project_type[]" value="multi-family">
                                        <label class="custom-control-label" for="customCheck8">Multi-Family</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck9" name="project_type[]" value="new_commercial">
                                        <label class="custom-control-label" for="customCheck9">New Commercial</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck10" name="project_type[]" value="tenant_improvement">
                                        <label class="custom-control-label" for="customCheck10">Tenant Improvement</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck11" name="project_type[]" value="educational">
                                        <label class="custom-control-label" for="customCheck11">Educational</label>
                                    </div>
                                     @if($errors->has('project_type'))
                                    <span class="alert-danger">{{$errors->first('project_type')}}</span>
                                @endif
                               </div>
                           </div>
                           <div class="col-lg-12 service-checkbox contact-media quote-title checkbox-title">
                                <h3>Number of story:</h3>
                               <div class="whole-checkbox-wrapp">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="single-story" id="customRadio" name="storey">
                                      <label class="custom-control-label" for="customRadio">Single-Story</label>
                                    </div>  
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customRadio1" value="double-story" name="storey">
                                        <label class="custom-control-label" for="customRadio1">Double-Story</label>
                                    </div> 
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customRadio2" value="three-story" name="storey">
                                        <label class="custom-control-label" for="customRadio2">Three-Story</label>
                                    </div> 
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customRadio3" value="more_than_three_story" name="storey">
                                        <label class="custom-control-label" for="customRadio3">More than Three-Story</label>
                                    </div> 
                                    @if($errors->has('status'))
                                    <span class="alert-danger">{{$errors->first('storey')}}</span>
                                @endif
                               </div>
                                <h3>Square footage of the new house/addition, or the Building:</h3>
                                <input type="text" name="house_area" placeholder="Other Service" value="{{old('house_area')}}">
                                 @if($errors->has('house_area'))
                                    <span class="alert-danger">{{$errors->first('house_area')}}</span>
                                @endif
                                <h3>Starting date of Design/Engineering phase:</h3>
                                <input type="date" name="design_start_date" placeholder="Other 
                                Service" value="{{old('design_start_date')}}">
                                 @if($errors->has('design_start_date'))
                                    <span class="alert-danger">{{$errors->first('design_start_date')}}</span>
                                @endif
                                <h3>Estimated Starting date of Construction phase:</h3>
                                <input type="date" name="estimated_starting_date" placeholder="Other Service" value="{{old('estimated_starting_date')}}">
                                 @if($errors->has('estimated_starting_date'))
                                    <span class="alert-danger">{{$errors->first('estimated_starting_date')}}</span>
                                @endif
                                <h3>Estimated budget for the entire project:</h3>
                                <input type="text" name="budget" placeholder="Other Service" value="{{old('budget')}}">
                                <h3>Please provide any further information that maybe helpful:</h3>
                                <textarea name="further_information" id="" cols="30" rows="10">{{old('further_information')}}</textarea>
                                <button class="btn submit-btn">Send Messege</button>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>











@endsection