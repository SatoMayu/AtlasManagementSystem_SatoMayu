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

    <!-- キャンセルボタンのモーダル -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-test modal-test-centered modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- 投稿編集フォーム開始 -->
          <div class="modal-body">
            <form action="" method="POST">
              @csrf
              <!-- 変更した投稿内容の受け渡し -->
              <p>予約日</p>
              <p>時間</p>
              <p>上記の予約をキャンセルしてもよろしいですか？</p>
              <!-- 変更した投稿のidの受け渡し -->
              <!-- <input type="hidden" name="" class="modal_id" placeholder="aiu"value=""></input>-->
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
              </form>
          </div>

        </div>
      </div>
    </div>


    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
@endsection
