<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table="tasks";

    public function scopeFilter($query,$request){

        if ($title=$request->get('filterTitle')) {
            $query->where('title','LIKE',"%$title%");
        }
        if ($status=$request->get('filterStatus')) {
            $query->where('status','LIKE',"%$status%");
        }
       return $query->latest();
    }
}
