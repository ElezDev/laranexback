<?php

namespace App\Models;

use App\Traits\FilterCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Rol extends Role
{
    use HasFactory;

    protected $table = 'roles';

 
}
