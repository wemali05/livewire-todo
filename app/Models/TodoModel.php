<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TodoModel extends Model
{
		use HasFactory;
		
		protected $table="todos";
    protected $primaryKey = 'todo_id';
    protected $fillable = ['title', 'desc', 'status'];
}
