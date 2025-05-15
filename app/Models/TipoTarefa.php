<?php

namespace App\Models;

use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTarefa extends Model
{
    //

    use HasFactory;
    protected $table = 'tipos_tarefas'; //Definindo explicitamente o nome correto da tabela
    protected $fillable = ['nome'];


   public function tarefas()
{
    return $this->hasMany(Tarefas::class);
}


}
