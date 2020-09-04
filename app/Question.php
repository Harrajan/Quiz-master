<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $guarded = [];

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function quiz()
  {
      return $this->belongsTo(Quiz::class);
  }

  public function answers()
  {
      return $this->hasMany(Answer::class);
  }
}
