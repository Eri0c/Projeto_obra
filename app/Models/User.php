<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, HasTeams, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'endereco',
        'tipo',
        'telefone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

   protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
];


    // Relacionamento com Obra (Muitos para Muitos)
    public function obras()
    {
        return $this->belongsToMany(Obra::class, 'obra_colaboradores', 'colaborador_id', 'obra_id');
    }

    // Métodos para verificar permissões
    public function isCliente()
    {
        return $this->tipo === 'cliente';
    }

    public function isResponsavel()
    {
        return $this->tipo === 'responsavel';
    }

    public function isColaborador()
    {
        return $this->tipo === 'colaborador';
    }
}
