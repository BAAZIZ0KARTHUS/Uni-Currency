@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="py-2">
                    <span class="fs-4 text-dark"> Create New Order </span><br>
                    <span class="fs-7 text-muted">Manage & Create new cards in just one Page</span>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('mollie.pay') }}">
                            @csrf
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="name" placeholder="Full Name"
                                    value="{{ Auth::user()->name }}" required>
                                <p class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="name@example.com" value="{{ Auth::user()->email }}" required>
                                <p class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="gateway">gateway</label>
                                <select class="form-select" id="gateway" name="gateway">
                                    <option value="paypal">PayPal</option>
                                    <option value="creditcard">Credit Card</option>
                                </select>
                                <p class="text-danger">
                                    @error('gateway')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select class="form-select" id="currency" name="currency">
                                    <option selected>EUR</option>
                                    <option>MAD</option>
                                    <option>USD</option>
                                </select>
                                <p class="text-danger">
                                    @error('currency')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="value">Paid Amount</label>
                                <input type="number" class="form-control" id="value" name="value" placeholder="10.00"
                                    step="0.01" value="{{ old('value') }}}" required>
                            </div>
                            <p class="text-danger">
                                @error('value')
                                    {{ $message }}
                                @enderror
                            </p>

                            <div class="form-group">
                                <label for="note">Add Note</label>
                                <input type="text" class="form-control" id="note" name="note"
                                    placeholder="Type your message ..." max="100">
                            </div>
                            <p class="text-danger">
                                @error('note')
                                    {{ $message }}
                                @enderror
                            </p>

                            <button type="submit" style="margin-left: auto; margin-right: auto; display: block;"
                                value="submit" class="btn btn-dark rounded-pill w-100">
                                <i style="float: left;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                        fill="#ffffff">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                                    </svg>
                                </i>
                                <span>Create & Review</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
