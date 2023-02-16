<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $fillable = [
        'user_id',
        'feedback_ux',
        'feedback_ui',
        'feedback_functionality',
        'name',
        'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
