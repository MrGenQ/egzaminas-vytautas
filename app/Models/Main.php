<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Main extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'status', 'taskResponse'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
