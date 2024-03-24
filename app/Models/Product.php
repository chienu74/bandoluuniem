<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductID';
    protected $table = 'Product';
    protected $fillable = ['ProductID', 'ProductCategoryID', 'ProductName', 'Description', 'Price'];
    public $timestamps = false;
}
