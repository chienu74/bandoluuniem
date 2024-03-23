<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory; 
    protected $primaryKey = 'MenuID';
    protected $table = 'Menu';
    protected $fillable = ['MenuID', 'MenuName', 'Alias','ParentID'];
    public $timestamps = false;
}
