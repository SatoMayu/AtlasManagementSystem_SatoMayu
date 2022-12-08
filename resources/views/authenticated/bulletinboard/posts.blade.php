@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p class="post_title"><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
      @foreach($post->SubCategories as $sub_category)
      <i class="category_box">{{ $sub_category->sub_category }}</i>
      @endforeach
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class="">{{ $post_comment->commentCounts($post->id)->count() }}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
              <!-- ↑↑$post->idで該当する値をUser.phpの関数is_like()へ送るよ -->
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span
            class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @endif
            <!-- post_idとclass="like_counts確認 -->
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area border w-25">
    <div class="border m-4">
      <div class="post_btn"><a href="{{ route('post.input') }}">投稿</a></div>
      <div class="post_search_area">
        <input type="text" class="keyword_box" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" class="search_btn" value="検索" form="postSearchRequest">
      </div>
      <div class="filter-btn_area">
        <input type="submit" name="like_posts" class="category_btn like_post" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="category_btn my_post" value="自分の投稿" form="postSearchRequest">
      </div>
      <ul>
        @foreach($categories as $category)
        <li id="accordion" class="main_categories mt-2" category_id="{{ $category->id }}"><span>{{ $category->main_category }}<span></li>
        <ul class="category_list">
          @foreach($category->SubCategories as $sub_category)
          <li><input type="submit" name="category_word" class="category_btn" value="{{ $sub_category->sub_category }}" form="postSearchRequest"></li>
          @endforeach
        </ul>
        @endforeach
      </ul>

    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
