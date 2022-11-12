@extends('front/layout')

@section('title', 'Canceled')

@section('content')

<div class="container">
  <!-- HERO SECTION-->
  <section class="py-5">
    <div class="row">
        <h2 class="h5 text-center text-uppercase mb-4">Sorry, something wrong. Try again!</h2>
    </div>
  </section>

  <!-- SERVICES-->
  @component('front/services') @endcomponent
</div>

@endsection