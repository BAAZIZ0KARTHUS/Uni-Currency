@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
        <div class="col-md-4">
            <div class="py-2">
                <div>
                    <img src="{{asset('images/success.PNG')}}"/>
                </div>
            </div>
            <span class="text-muted">Your payment was successfully received. Payment issues? Please let us know <a href="/" class="fs-5 text-dark">Contact us</a></span>
            <a type="submit" style="margin-left: auto; margin-right: auto; margin-top: 50px; display: block;" value="submit" class="btn btn-dark rounded-pill w-80" href="/">
                <i style="float: left;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                        fill="#ffffff">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                    </svg>
                </i>
                <span>Home Page</span>
            </a>
        </div>
    </div>
</div>
@endsection
