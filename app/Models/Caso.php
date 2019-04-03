<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    protected $fillable = [
                            'diabetologico',
                            'oftalmologo_id',
                            'diabetologo_id',
                            'paciente_id',
                            'oftalmologico',
                            'paciente',
                            'estado',
                            'diabetologico_archivo',
                            'oftalmologico_archivo',
                            'texto_rechazo',
                            'texto_aprobacion',
                            'fecha_rechazo',
                            'fecha_aprobacion',
                            'fecha_reaprobacion',
                            'texto_reaprobacion'
                        ];

    /**
     * Propiedades para validar acciones
     */
    public function getDiabetologicoEstaCompletoAttribute()
    {
        if( $this->diabetologico == '[]' && empty($this->diabetologico_archivo)){
            return false;
        }
        return true;
    }

    public function getOftalmologicoEstaCompletoAttribute()
    {
        if( $this->oftalmologico == '[]' && !isset($this->oftalmologico_archivo)){
            return false;
        }
        return true;
    }

    public function getFechaVencimientoAttribute()
    {
        return fecha_vencimiento($this->fecha_aprobacion);
    }

    /**
     *  accesos directos
     */
    public function getOftalmologicoUrlAttribute()
    {
       return asset('descargar/'.$this->oftalmologico_archivo);
    }

    public function getDiabetologicoUrlAttribute()
    {
       return asset('descargar/'.$this->diabetologico_archivo);
    }

    public function getDiabetologicoUrlEliminarAttribute()
    {
       return asset('eliminar_archivo_di/'.$this->id.'/'.$this->diabetologico_archivo);
    }

    /**
     * relaciones
     */
    public function adjuntos()
    {
        return $this->hasMany('App\Models\Adjunto');
    }

    public function tratamientos()
    {
        return $this->hasMany('App\Models\Tratamiento');
    }

    public function bitacoras()
    {
        return $this->hasMany('App\Models\Bitacora')->orderBy('created_at','desc');
    }

    public function diabetologo()
    {
        return $this->hasOne('App\Models\Usuario','id','diabetologo_id');
    }

    public function oftalmologo()
    {
        return $this->hasOne('App\Models\Usuario','id','oftalmologo_id');
    }

    public function pacienters()
    {
        return $this->hasOne('App\Models\Paciente','id','paciente_id');
    }
}
