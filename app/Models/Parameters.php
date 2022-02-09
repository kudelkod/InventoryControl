<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameters extends Model
{
    use HasFactory;

    protected $table = 'parameters';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

//    protected $fillable = [];
}
