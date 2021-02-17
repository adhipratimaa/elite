@extends('layouts.admin') 
@section('title','Dashboard')
@push('admin.styles')
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
<!-- bootstrap wysihtml5 - text editor -->
@endpush
@section('content')
<section class="content-header">
  <h1>Dashboard<small></small></h1>
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! Session::get('message') !!}
    </div>
    @endif
    @if (count($errors) > 0)
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
    @endif

    <?php
      $service_count=count($services->get());
      $subscribers_count=count($subscribers->get());

    ?>
  
</section>
<div class="content">
  <div class="col-md-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        
        <h3>{{$service_count}}</h3>

        <p>Services</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{route('service.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

   <div class="col-md-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        
        <h3>{{$subscribers_count}}</h3>

        <p>Subscribers</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{route('subscriber.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

   <div class="col-md-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-fuchsia">
      <div class="inner">
        
        <h3>{{count($testimonials)}}</h3>

        <p>Testimonials</p>
      </div>
      <div class="icon">
        <i class="ion-android-arrow-dropright-circle"></i>
      </div>
      <a href="{{route('testimonial.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Blogs</h3>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.N.</th>
                  <th>Title</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tbody>
                @php($i=1)
                @foreach($blogs as $blog)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$blog->title}}</td>
                  <td>@if($blog->image)
                <img src="{{asset('images/listing/'.$blog->image)}}">
                @else
                <p>N/A</p>
                @endif
                    </td>
                </tr>
                  @php($i++)
                  @endforeach
            </tbody>

            </table>
            <a href="{{route('blog.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            
          </div>
        </div>
      </div>
    </div>
    
     <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Quotes</h3>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.N.</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Project Location</th>
                  
                </tr>
              </thead>
              <tbody>
                @php($i=1)
                
                @foreach($quotes as $quote)
                <!--{{$quote}}-->
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$quote->first_name}}</td>
                  <td>{{$quote->last_name}}</td>
                  <td>{{$quote->email}}</td>
                  <td>{{$quote->phone_number}}</td>
                  <td>{{$quote->state}}</td>
                  <td>{{$quote->city}}</td>
                  <td>{{$quote->project_location}}</td>
                  
                </tr>
                  @php($i++)
                  @endforeach

              </tbody>

            </table>
            <a href="{{route('quote.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            
          </div>
        </div>
      </div>
    </div>
  
     <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Careers</h3>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th>S.N.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Inquiries</th>
                    <th>CV</th>
                </tr>
              </thead>
              <tbody>
                @php($i=1)
                @foreach($careers as $career)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$career->first_name}}</td>
                  <td>{{$career->last_name}}</td>
                  <td>{{$career->email}}</td>
                  <td>{{$career->phone}}</td>
                  <td>{{$career->inquiries}}</td>
                  <td><a href="{{asset('images/file/'.$career->cv)}}">{{$career->cv}}</a></td>
                 </tr>
                  @php($i++)
                  @endforeach

              </tbody>

            </table>
            <a href="{{route('career.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            
          </div>
        </div>
      </div>
    </div>
 
  
</div>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('js/accessible_character_countdown.js') }}"></script>
  <!-- datepicker -->
  <script src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <!-- datepicker -->
  <script>
    CKEDITOR.replace('donation_detail');
    CKEDITOR.config.height = 200;
    $(document).ready(function () {
        $( "#input-field-demo" ).accessibleCharCount()
     });
    
    </script>
@endpush