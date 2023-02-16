<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;
    protected $table = 'todo_lists';
    protected $fillable = [
        'category_id',
        'level_id',
        'status_id',
        'user_id',
        'name',
    ];

    public function todo_list_detail(){
        return $this->hasOne(TodoListDetail::class,'todo_id');
    }

    public function todo_category(){
        return $this->belongsTo(TodoCategory::class,'category_id');
    }

    public function todo_status(){
        return $this->belongsTo(TodoStatus::class,'status_id');
    }

    public function todo_level(){
        return $this->belongsTo(TodoLevel::class,'level_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
