<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = ['id_user', 'id_interlocutor', 'message_body'];
    protected $table = "messages";
    // public $timestamps = false;

    // public function meta() {
    //     return $this->hasMany('App\BannerMeta', 'banner_id');
    // }

    // public function type() {
    //     return $this->belongsTo('App\BannerType');
    // }

    // public function user() {
    //     return $this->belongsTo('App\User');
    // }

    // public function url() {
    //     return $this->meta()->where('key', 'url')->first()->value;
    // }

    // public function img() {
    //     return $this->meta()->where('key', 'img')->first()->value;
    // }

    // public function regions() {
    //     $ids = $this->meta()->where('key', 'region_id')->get()->pluck('value');

    //     return Region::whereIn('id', $ids)->where('parent_id', 0)->get();
    // }

    // public function categories() {
    //     $ids = $this->meta()->where('key', 'category_id')->get()->pluck('value');

    //     return Category::whereIn('id', $ids)->where('parent_id', 1)->get();
    // }
}
