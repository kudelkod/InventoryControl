<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $table = 'parameters';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

    protected $fillable = [
        'type_id',
        'name',
        'value',
        ];

    public function inventory(){

        return $this->belongsToMany(Inventory::class, 'inventory_parameter');
    }

    public function model(){

        return $this->belongsToMany(Model::class, 'model_parameter');
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
