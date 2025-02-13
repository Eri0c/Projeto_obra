<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
   

    public function tarefas()
    {   //Um colaborador pode ter varias tarefas atribuidas a ele
        return $this->hasMany(Tarefas::class);
    }
}
