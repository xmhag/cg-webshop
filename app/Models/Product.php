<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name',
    'category_id',
    'article_number',
    'supplier_id',
    'tagline',
    'description',
    'in_stock',
    'price',
    'tax_group_id',
    'strap_color',
    'size'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function latestReviews()
    {
        return $this->hasMany(Review::class)->latest()->limit(2);
    }
}
