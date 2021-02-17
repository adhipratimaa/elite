@extends('layouts.front')
@section('content')

<!-- main slider section starts -->

<section class="main-slider">
    <div class="main-slide">
    	@foreach($sliders as $slider)
        <div class="slider-container">
            <figure style="background-image:url('{{asset('images/thumbnail/'.$slider->image)}}')">
                <div class="container">
                    <div class="slider-content">
                        <h1>ENGINEERING FOR FUTURE</h1>
                        <a href="{{route('quote')}}" class="btn slider-btn">Request A Quote</a>
                    </div>
                </div>
            </figure>
        </div>
        @endforeach

        

    </div>
</section>

<!-- main slider section ends -->

<!-- services section starts -->

<section class="services-section all-sec-padding">
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
                    <a href="{{route('serviceInner', $service->slug)}}" class="service-content">
                        <h3>{{$service->title}}</h3>
                            <p>{!!Str::limit($service->short_description, 200)!!}</p>
                            
                    </a>
                </div>
            </div>
            @endforeach
           
        </div>
        <div class="service-icon"><img src="{{asset('images/service-icon.png')}}" alt="icon"></div>
       
    </div>
</section>

<!-- services section ends -->

<!-- counter section starts -->
<section class="counter-section all-sec-padding">
    <div class="container">
        <ul class="counter-wrapper">
            <li id="counter" class="counter-box">
                <div class="counter-wrapper-inner"><span class="count" data-count="{{@$dashboard_setting->complete_project}}"></span><i class="fa fa-plus" aria-hidden="true"></i></div>
                <p>Complete Project</p>
            </li>
            <li id="counter" class="counter-box">
                <div class="counter-wrapper-inner"><span class="count" data-count="{{@$dashboard_setting->experience}}"></span><i class="fa fa-plus" aria-hidden="true"></i></div>
                <p>YEARS OF COLLECTIVE 20+ STATES WHERE WE EXPERIENCE </p>
            </li>
            <li id="counter" class="counter-box">
                <div class="counter-wrapper-inner"><span class="count" data-count="{{@$dashboard_setting->work}}"></span><i class="fa fa-plus" aria-hidden="true"></i></div>
                <p>STATES WHERE WE WORK</p>
            </li>
        </ul>
    </div>
</section>

<!-- counter section ends -->

<!-- blog section starts -->

<section class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="blog-image-side all-sec-padding">
                    <div class="blog-image-wrapp">
                        <img src="{{asset('images/thumbnail/'.@$dashboard_setting->image)}}" alt="blog-image">
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="blog-content-side all-sec-padding">
                    <div class="title-wrapper">
                        <h2>{{@$dashboard_setting->title}}</h2>
                        <p>{{@$dashboard_setting->short_description}}</p>
                    </div>
                    
                   {!!@$dashboard_setting->description!!}
                    <a href="{{route('services')}}" class="btn blog-btn">Our Services</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- blog section ends -->

<!-- testimonial section starts -->

<section class="testimonial all-sec-padding">
    <div class="container">
        <div class="testimonial-slider">

        	@foreach($testimonials as $testimonial)
            <div class="testimonial-container">
                <div class="testimonial-wrapper">
                    <p>{{$testimonial->description}}</p>
                    <span>{{$testimonial->name}}</span>
                </div>
            </div>
            @endforeach
          

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript">
	var counted = 0;
	$(window).scroll(function() {

	var oTop = $('#counter').offset().top - window.innerHeight;
	if (counted == 0 && $(window).scrollTop() > oTop) {
	    $('.count').each(function() {
	    var $this = $(this),
	        countTo = $this.attr('data-count');
	    $({
	        countNum: $this.text()
	    }).animate({
	        countNum: countTo
	        },

	        {

	        duration: 10000,
	        easing: 'swing',
	        step: function() {
	            $this.text(Math.floor(this.countNum));
	        },
	        complete: function() {
	            $this.text(this.countNum);
	            //alert('finished');
	        }

	        });
	    });
	    counted = 1;
	}

	});

</script>
@endpush