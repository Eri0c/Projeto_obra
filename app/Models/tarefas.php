<?php

namespace App\Models;

use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
        use HasFactory;
    //
    protected $fillable =[
        'titulo',
        'descricao',
        'status'
        
    ];
    
    

    //Armazenar a obra_id

public function obra()
{
    return $this->belongsTo(Obras::class);
}

public function colaborador()
{  // Cada tarefa pertence a um único colaborador.
    return $this->belongsTo(Colaborador::class);
}

public function material()
{
    return $this->belongsToMany(Material::class, 'tarefa_material');

}

    
}



