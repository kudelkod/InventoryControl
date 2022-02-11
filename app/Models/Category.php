<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const ROOT = 1;

    protected $table = 'categories';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

    protected $fillable = [
        'parent_category_id',
        'name',
        'slug',
        'description',
    ];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id', 'id');
    }

    public function parentCategoryName(): Attribute
    {

        return new Attribute(
                get: fn() => $this->isRoot() ? 'Корень' : $this->parentCategory->name,
        );
    }

    private function isRoot(){
        return $this->id === Category::ROOT;
    }
}
