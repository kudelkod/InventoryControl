<?php

namespace App\Modules\Model\src\Models;

use App\Modules\Manufacture\src\Models\Manufacture;
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

    protected $appends = [
        'manufacture_name',
    ];

    protected $casts = [
        'year'=> 'datetime:d.m.Y'
    ];

    public function parameters(){

        return $this->hasMany(Parameter::class, 'model_id', 'id');
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
