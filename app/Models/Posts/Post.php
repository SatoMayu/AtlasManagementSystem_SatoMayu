<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [
        'user_id',
        'post_title',
        'post',
    ];

    public function user(){
        return $this->belongsTo('App\Models\Users\User');
    }

    // 9/8追記↓↓
    public function likes(){
        return $this->hasMany('App\Models\Posts\Like', 'likes', 'like_user_id', 'like_post_id');
    }
    // 9/8追記↑↑


    public function postComments(){
        return $this->hasMany('App\Models\Posts\PostComment');
    }

    // 9/29追記↓↓
    public function subCategories(){
        // リレーションの定義  多対多
        return $this->belongsToMany('App\Models\Categories\SubCategory');
    }
    // 9/29追記↑↑

    // コメント数
    public function commentCounts($post_id){
        return Post::with('postComments')->find($post_id)->postComments();
    }
}
