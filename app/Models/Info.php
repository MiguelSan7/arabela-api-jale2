<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'cuenta_ok',
        'nombre',
        'numdama',
        'anio_campania',
        'saldo_cobro',
        'pagos',
        'resta',
        'efectividad',
        'fecha_inicial_vigencia',
        'fecha_final_vigencia',
        'numero_zona',
        'rutas',
        'fase',
        'id_causanocobro',
        'digito_dama',
        'codigopostal',
        'estado'
    ];
}
