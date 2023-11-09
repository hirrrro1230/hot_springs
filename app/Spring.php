<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spring extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'address', 'note',
    ];

    #Springの情報から「誰が登録したのか」の情報を簡単に取得できるように「n対1」を紐づける
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Springの情報から投稿に対するコメントの情報を簡単に取得できるように1対nを紐づける
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
