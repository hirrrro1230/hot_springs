<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'spring_id', 'text',
    ];

    #Commentの情報からコメント者の情報を簡単に取得
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    #Commentの情報からどの温泉情報にコメントしたかの情報を簡単に取得
    public function springs()
    {
        return $this->belongsTo('App\Spring');
    }
}
