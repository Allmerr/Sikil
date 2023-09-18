<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortlink extends Model
{
    use HasFactory;

    protected $table = 'shortlink';

    protected $guarded = 'id_shortlink';

    protected $primaryKey = 'id_shortlink';
}