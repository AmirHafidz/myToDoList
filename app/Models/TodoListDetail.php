<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoListDetail extends Model
{
    use HasFactory;
    protected $table = 'todo_list_details';
    protected $fillable = [
        'todo_id',
        'name',
        'description_one',
        'description_two',
        'date_started',
        'date_end',
        'time_start',
        'time_end',
    ];

    public function todo_list(){
        return $this->belongsTo(TodoList::class,'todo_id');
    }
}
