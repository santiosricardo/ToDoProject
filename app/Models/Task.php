<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public const STATUS_PENDENTE = "Pendente";
    public const STATUS_EM_PROGRESSO = "Em progresso";
    public const STATUS_FINALIZADO = "Finalizado";
    public const STATUS_CANCELADO = "Cancelado";

    public const STATUS = [
        self::STATUS_PENDENTE,
        self::STATUS_EM_PROGRESSO,
        self::STATUS_FINALIZADO,
        self::STATUS_CANCELADO
    ];

    public $fillable = [
        'title',
        'status'
    ];
}
