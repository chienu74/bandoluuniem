<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductCategoryID';
    protected $table = 'ProductCategory';
    protected $fillable = ['ProductCategoryID', 'ProductCategoryName', 'Description'];
    public $timestamps = false;
    
}
