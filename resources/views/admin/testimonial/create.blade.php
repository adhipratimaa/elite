@extends('layouts.admin')	
@section('title','Add Testimonials')
@push('admin.styles')
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
@endpush
@section('content')
<section class="content-header">
	<h1>Testimonial<small>create</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Testimonial</a></li>
		<li><a href="">Create</a></li>
	</ol>
</section>
<div class="content">
	@if (count($errors) > 0)
	<div class="alert alert-danger message">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
<form method="post" action="{{route('testimonial.store')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row">
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Add a new testimonial</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Name(required)</label>
						<input type="text" name="name" class="form-control" value="{{old('name')}}">
					</div>
					<!-- <div class="form-group">
						<label>Position</label>
						<input type="text" name="position" class="form-control" value="{{old('position')}}">
					</div> -->
					
					<div class="form-group">
						<label>Description(required)</label>
						<textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
					</div>
					<!-- <div class="form-group">
						<label>Star</label>
						<input type="number" name="star" class="form-control" value="{{old('star')}}">
					</div> -->
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<!-- <div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Social media</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
					   <label>Facebook</label>
					   <input type="text" name="facebook" class="form-control" value="{{old('facebook')}}">
					</div>
					<div class="form-group">
					   <label>Instagram</label>
					   <input type="text" name="instagram" class="form-control" value="{{old('instagram')}}">
					</div>
					<div class="form-group">
					   <label>Twitter</label>
					   <input type="text" name="twitter" class="form-control" value="{{old('twitter')}}">
					</div>
				</div>
			</div> -->
			<!-- <div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Image</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
					   <label>Upload Image (less than 250*250)</label>
					   <input id="fileUpload" type="file" name="image" class="form-control">
					   <div id="wrapper">
                			<div id="image-holder"></div>
                		</div>
					</div>
				</div>
			</div> -->
			<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Publish</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="publish"><input type="checkbox" id="publish" name="publish" checked > Publish</label>
				    </div>
				    <div class="form-group">
				    	<input type="submit" name="" class="btn btn-success">
				    </div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- datepicker -->
  <script src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>
  <!-- datepicker -->
  <script>

  	$("#fileUpload").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image",
                    "width" : '50%'
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
  	// CKEDITOR.replace('description');
   //  CKEDITOR.config.height = 200;
  	$('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

  	
  	$('.message').fadeOut(400);
    </script>
@endpush