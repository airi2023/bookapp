<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = array('id'); //項目「id（主キー）」はnullでもOK（$guarded＝入力不要）

    public $timestamps = false; //タイムスタンプ不使用

    public static $rules = array( //バリデーションのルール
        'title' => 'required',
        'author' => 'required',
        'price' => 'required',
    );

    public function getData() //id、title、author、priceを文字列にまとめて返す（ｐ.242）
    {
        // return 'id：' . $this->id ."\n". '、タイトル：' . $this->title . '、著者：' . $this->author .  '、価格：' . $this->price . '円';
        return 'id：' . $this->id . '、タイトル：' . $this->title . '、著者：' . $this->author .  '、価格：' . $this->price . '円';
    }
}
