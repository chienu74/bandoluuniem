<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAccount extends Model
{
    use HasFactory;
    protected $table = 'AdminAccount';
    protected $primaryKey = 'AdminAccountID';
    protected $fillable = ['AdminAccountID', 'UserName', 'Email', 'Password', 'Avatar'];
    public $timestamps = false;
}
