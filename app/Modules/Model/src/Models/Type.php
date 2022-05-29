<?php

namespace App\Modules\Model\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

    protected $fillable = [
        'name',
    ];
}
