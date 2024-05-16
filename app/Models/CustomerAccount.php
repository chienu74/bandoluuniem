<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAccount extends Model
{
    use HasFactory;
    protected $table = 'CustomerAccount';
    protected $primaryKey = 'CustomerAccountID';
    protected $fillable = ['CustomerAccountID', 'Password', 'UserName', 'Email'];
    public $timestamps = false;
}
