<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name',
    'address',
    'city',
    'postal_code',
    'country'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
