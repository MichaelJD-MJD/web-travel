@extends('layouts.success')
@section('title','Checkout success')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
      <div class="col text-center">
        <img src="{{ url('frontend/images/logo/sukses.png') }}" alt="" />
        <h1>Yay! Success</h1>
        <p>
          We’ve sent you email for trip instruction <br />
          please read it as well
        </p>
        <a href="{{ url('/') }}" class="btn btn-homepage mt-3 px-5">
          Home Page
        </a>
      </div>
    </div>
  </main>
@endsection