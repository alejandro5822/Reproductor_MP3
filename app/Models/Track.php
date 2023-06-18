<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'title',
        'path',
        'interpreter_id',
    ];
    public function interpreter()
    {
        return $this->belongsTo(Interpreter::class, 'interpreter_id');
    }

}
