<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'section_id',
        'question',
        'type',
        'marks',
        'is_multiple'
    ];
   public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
