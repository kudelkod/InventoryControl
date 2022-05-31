<?php

namespace App\Modules\Inventory\src\Models;

use App\Models\User;
use App\Modules\Categories\src\Models\Category;
use App\Modules\Manufacture\src\Models\Manufacture;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\Model\src\Models\Model as Models;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'model_id',
        'manufacture_id',
        'user_id',
        'in_stock',
    ];

    protected $appends = [
        'manufacture_name',
        'model_name',
        'user_name',
        'category_name',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function model(){
        return $this->belongsTo(Models::class, 'model_id', 'id');
    }

    public function manufacture(){
        return $this->belongsTo(Manufacture::class, 'manufacture_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function manufactureName(): Attribute
    {
        return new Attribute(
            get: fn()=> $this->manufacture->name,
        );
    }

    public function modelName(): Attribute
    {
        return new Attribute(
            get: fn()=> $this->model->name,
        );
    }

    public function userName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->user->name,
        );
    }

    public function categoryName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->category->name,
        );
    }
}
