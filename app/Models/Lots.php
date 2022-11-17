<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lots extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id'];
    protected $table = "auction_lots";
    public $primarykey = "id";

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
