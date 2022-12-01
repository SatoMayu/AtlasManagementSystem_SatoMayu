@extends('layouts.sidebar')
@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
<div class="white_area border">

  <div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
    <div class="w-100 vh-100 p-5">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <p>{!! $calendar->render() !!}</p>
      <div class="adjust-table-btn m-auto text-right">
        <input type="submit" class="btn btn-primary " value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
      </div>
    </div>
  </div>
</div>
</div>
@endsection
