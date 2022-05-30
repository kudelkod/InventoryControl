<?php

namespace App\Modules\Model\src\Models;

use App\Modules\Inventory\src\Models\Inventory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'parameters';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

    protected $fillable = [
        'type_id',
        'name',
        'value',
        'model_id',
        ];

    protected $appends = [
        'type_name'
    ];

    public function model(){

        return $this->belongsTo(Model::class, 'model_id', 'id');
    }

    public function type(){

        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function typeName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->type->name,
        );
    }
}
