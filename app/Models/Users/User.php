<?php

namespace App\Models\Users;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Posts\Like;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
    use softDeletes;

    const CREATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'over_name',
        'under_name',
        'over_name_kana',
        'under_name_kana',
        'mail_address',
        'sex',
        'birth_day',
        'role',
        'password'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany('App\Models\Posts\Post');
    }

    public function calendars(){
        return $this->belongsToMany('App\Models\Calendars\Calendar', 'calendar_users', 'user_id', 'calendar_id')->withPivot('user_id', 'id');
    }

    public function reserveSettings(){
        return $this->belongsToMany('App\Models\Calendars\ReserveSettings', 'reserve_setting_users', 'user_id', 'reserve_setting_id')->withPivot('id');
    }

    public function likes(){
        return $this->belongsToMany('App\Models\Posts\Like', 'likes', 'like_user_id', 'like_post_id')->withPivot('id');
    }

    public function subjects(){
        // リレーションの定義
        // 多対多
        // 第１引数：リレーション先のモデル名
        // 第2引数：リレーション先のテーブル名
        // 第3引数：自モデルの主キー
        // 第4引数：相手モデルの主キー
        return $this->belongsToMany('App\Models\Users\Subjects','subject_users','user_id','subject_id');
    }

    // いいねしているかどうか
    public function is_Like($post_id){
        return Like::where('like_user_id', Auth::id())->where('like_post_id', $post_id)->first(['likes.id']);
    }
    // 9/8 is_Likeがなにを示しているのか要確認
    // 9/17 posts.bladeから送られてきた$post->idで該当する値を$post_idとする→is_like()の中で使用して目的の情報を取得する

    public function likePostId(){
        return Like::where('like_user_id', Auth::id());
    }


    // ここから追加記述↓↓
    // is_Likeを使って、すでにlikeしたか確認後、「いいね」する
    public function like($post_id){
        if($this->is_Like($post_id)){
            // もしすでに「いいね」していたら何もしない
        }else {
            $this->likes()->attach($post_id);
        }
    }

    // is_Likeを使って、すでにlikeしたか確認後、していたら解除する
    public function unlike($post_id){
        if($this->is_Like($post_id)){
            // もしすでに「いいね」していたら消す
            $this->likes()->detach($post_id);
        }else {
            # code...
        }
    }
}
