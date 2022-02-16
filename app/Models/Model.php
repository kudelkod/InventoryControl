<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as StartModel;

class Model extends StartModel
{
    use HasFactory;

    protected $table = 'models';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

    protected $fillable = [
        'name',
        'description',
        'year',
        'manufacture_id',
    ];

    public function parameters(){

        return $this->belongsToMany(Parameter::class, 'model_parameter', 'model_id', 'parameter_id');
    }

    public function manufacture(){

        return $this->belongsTo(Manufacture::class, 'manufacture_id', 'id');
    }

    public function manufactureName(): Attribute
    {

        return new Attribute(
            get: fn()=> $this->manufacture->name,

        );
    }
}
