<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Obras extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'status',
        'data_inicio',
        'responsavel_id',
        'codigo_acesso',
    ];

    protected $casts = [
        'data_inicio' => 'date',
    ];

    public function colaboradores()
{
    return $this->belongsToMany(User::class, 'obra_colaboradores', 'obra_id', 'colaborador_id');
}



    // Relacionamento obra pertence a um responsavel
    public function responsavel(){
        return $this->belongsTo(User::class, 'responsavel_id');
    }

    //Método para listar as tarefas associadas.
    public function tarefas()
    {
    // Uma obra pode ter várias tarefas.
    return $this->hasMany(Tarefas::class, 'obra_id');
    }

    //Gerar automaticamente o codigo de acesso

    protected static function boot(){
        parent::boot();

        static::creating(function ($obra){
            $obra->codigo_acesso = Str::random(10);
        });
    }


}


