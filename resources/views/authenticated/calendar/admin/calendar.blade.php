@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
<div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">

  <div class="w-100 vh-100 border p-5">
    <p class="text-center">{{ $calendar->getTitle() }}</p>
    <p>{!! $calendar->render() !!}</p>
  </div>
</div>


</div>
@endsection
