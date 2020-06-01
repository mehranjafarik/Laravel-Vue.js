<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Question extends Model
{
    protected $fillable = ['title', 'body'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    function getUrlAttribute()
    {
        return route("questions.show", $this->id);
    }

    function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
//        return '#';
    }

    function getStatusAttribute()
    {
        if ($this->answers > 0) {
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }


}
