@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
        <div class="col-md-4">
            <div class="py-2">
                
                <span class="fs-4 text-dark">Order Summary</span><br>
                <span class="fs-7 text-muted">Manage & Create new cards in just one Page</span>
            </div>
            <div class="">
                <div class="">
                    <div style="width: 100%;height: 80px; text-align: center;" class="d-flex flex-row bd-highlight mb-3 border border-secondary rounded"> 
                        <div style="width: 35%; padding-top: 15px;">
                            @if($data['gateway'] =='PayPal')         
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#253B80" class="bi bi-paypal" viewBox="0 0 16 16">
                                    <path d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z"/>
                                </svg>
                            @else
                                Credit card    
                            @endif
                            <!--.fil2 {fill:#179BD7} .fil0 {fill:#253B80}-->
                        </div>
                        <div class="vr"></div>
                        <div style="width: 60%;"><h1>{{$data['value']}}</h1><span class="text-muted">Amount Paid</span></div>
                    </div>
                    <div class="form-group">
                        <label for="fullname" class="text-muted">Full Name</label>
                        <label id="fullname" class="form-control border-0 text-dark">{{$data['name']}}</label>
                    </div>
                    <div class="form-group">
                        <label for="value" class="text-muted">Paid Amount</label>
                        <label id="value" class="form-control border-0 text-dark">{{$data['value']}}</label>
                    </div>
                    <div class="form-group">
                        <label for="gateway" class="text-muted">Gateway</label>
                        <label id="gateway" class="form-control border-0 text-dark">{{$data['gateway']}}</label>
                    </div>
                    <div class="form-group">
                        <label for="fee" class="text-muted">Transaction Fee</label>
                        <label id="fee" class="form-control border-0 text-dark">{{$data['fee']}}</label>
                    </div>
                    
                    <a type="submit" style="margin-left: auto; margin-right: auto; margin-top: 50px; display: block;" value="submit" class="btn btn-dark rounded-pill w-80" href="{{$data['url']}}">
                        <i style="float: left;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                fill="#ffffff">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                            </svg>
                        </i>
                        <span>Accept & Confirm</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
