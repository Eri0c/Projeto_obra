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
        'status',
        'comodo', 
        'obra_id', 
        'colaborador_id',
        'tipo_tarefa_id' 
        
    ];
    
    

    //Armazenar a obra_id

public function obra()
{
    return $this->belongsTo(Obra::class);
}
public function tiposTarefas()
{
    return $this->belongsToMany(TipoTarefa::class, 'tarefa_tipo_tarefa', 'tarefa_id', 'tipo_tarefa_id');
}

 

public function colaborador()
{  // Cada tarefa pertence a um único colaborador.
    return $this->belongsTo(User::class, 'colaborador_id');
}
public function tipoTarefa()
{
    return $this->belongsTo(TipoTarefa::class);
}





public function material()
{
    return $this->belongsToMany(Material::class, 'tarefa_material');

}

    
}



