<?php

namespace App\Modules\Inventory\src\Models;

use App\Models\User;
use App\Modules\Categories\src\Models\Category;
use App\Modules\Manufacture\src\Models\Manufacture;
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
        //
    ];

    public function category(){
        $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function model(){
        $this->belongsTo(Models::class, 'model_id', 'id');
    }

    public function manufacture(){
        $this->belongsTo(Manufacture::class, 'manufacture_id', 'id');
    }

    public function user(){
        $this->belongsTo(User::class, 'user_id', 'id');
    }

}
