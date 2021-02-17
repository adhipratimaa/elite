@extends('layouts.front')
@section('content')

<section class="contact-page">
    <div class="all-page-top-image" id="all-page-top-image" style="background-image:url()">
        <div class="container">
            <div class="all-page-title" id="all-page-title">
                <h1>Payment Form</h1>
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
                        <!-- <div class="title-wrapper contact-title">
                            <h2>Stay Connected</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus repudiandae optio ut earum, nobis quam voluptates sint vel est vitae?</p>
                        </div> -->
                        <!-- <form action="{{route('payment_store')}}" method="POST"  class="row contact-form-parent">
                        {{csrf_field()}}
                            <div class="col-lg-6">
                                <label for="name">Your Name</label>
                                <input class="input" type="text" name="name" placeholder="Name*" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="company_name">Your Company Name</label>
                                <input type="company_name" name="company_name" placeholder="Your Company Name*">
                            </div>
                            <div class="col-lg-6">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" placeholder="Amount*" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="remark">Remark</label>
                                <input type="text" name="remark" placeholder="Remark*" required>
                            </div>
                            <div class="col-12">
                                <button>Submit</button>
                            </div>
                        </form> -->

                         <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Paywith Paypal
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection