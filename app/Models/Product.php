<?php

namespace App\Models;

use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function productColors()
    {
        return $this->hasMany(productColor::class,'product_id','id');
    }
}
 