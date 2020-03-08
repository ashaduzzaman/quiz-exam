<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizNestle extends Model
{
    protected $table = 'quiz_nestle';
    protected $fillable = ['user_id', 'quiz_id', 'ques1', 'ques2', 'ques3', 'ques4', 'ques5', 'ques6', 'ques7', 'ques8', 'ques9', 'ques10', 'strated_at'];
}
