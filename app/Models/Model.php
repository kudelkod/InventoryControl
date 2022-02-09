<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as StartModel;

class Model extends StartModel
{
    use HasFactory;

    protected $table = 'models';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

//    protected $fillable = [];
}
