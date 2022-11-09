@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>

    <!-- キャンセルボタンのモーダル開始 -->
    <div class="modal delete-modal">
      <div class="modal__bg delete-modal-close"></div>
      <div class="modal__content">
        <p>予約日:<span class ="modal_delete_day"></span></p>
        <p>予約時間:<span class ="modal_delete_part"></span></p>
        <p>上記の予約をキャンセルしてもよろしいですか？</p>
        @csrf
        <a class="delete-modal-close" href="">閉じる</a>
      </div>
    </div>
    <!-- キャンセルボタンのモーダル終了 -->

    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
@endsection
