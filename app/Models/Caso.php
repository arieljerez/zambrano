<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    protected $fillable = ['diabetologico','oftalmologo_id','diabetologo_id','paciente_id','oftalmologico','paciente','estado','diabetologico_archivo','oftalmologico_archivo','texto_rechazo','texto_aprobacion','fecha_rechazo','fecha_aprobacion','fecha_reaprobacion','texto_reaprobacion'];
/*
    public function setPacienteAttribute($value)
    {
        $this->attributes['paciente'] = json_encode($value);
    }
*/
    public function getPacienteAttribute($value)
    {
       if ($value == '[]')
       {
           $value = '{"id": 0, "dni": "", "sexo": "", "nombres": "", "telefono": "", "apellidos": "", "domicilio": "", "created_at": "", "updated_at": "", "fecha_nacimiento": "", "telefono_familiar": ""}';
       }

       return $value;
    }
/*
    public function setDiabetologicoAttribute($value)
    {
        $this->attributes['paciente'] = json_encode($value);
    }
*/
    public function getDiabetologicoAttribute($value)
    {
       if ($value == '[]')
       {
           $value = '{"dm": "", "vr": "", "peso": "", "talla": "", "otros": "", "medico": "", "presion": "", "contacto": "", "insulina": "0", "servicio": "", "enfermedad": "0", "nefropatia": "0", "neuropatia": "0", "tabaquismo": "0", "hemoglobina": "", "dislipidemia": "0", "observaciones": "", "insulina_texto": "", "actividad_fisica": "0", "plan_alimentario": "0", "edad_al_diagnostico": "", "educacion_terapeutica": "0", "actividad_fisica_texto": "", "plan_alimentario_texto": "", "automonitoreo_glucemico": "0", "vasculopatia_periferica": "0", "otras_medidas_terapeuticas": "0", "educacion_terapeutica_texto": "", "automonitoreo_glucemico_texto": "", "otras_medidas_terapeuticas_texto": ""}';
       }

       return $value;
    }
    public function getOftalmologicoAttribute($value)
    {
       if ($value == '[]')
       {
           $value = '{"rdnp": "0", "fecha": null, "firma": null, "otros": null, "afaquia": "0", "catarata": "0", "rubeosis": "0", "derivante": null, "rdnp_leve": "0", "institucion": null, "rdnp_severa": "0", "fecha_hb_a1c": null, "pseudofaquia": "0", "edema_macular": "0", "rdnp_moderada": "0", "derivante_telefono": null, "tratamiento_actual": null, "cirugias_previas_od": "1", "cirugias_previas_oi": "1", "mejor_corregida_av_od": null, "mejor_corregida_av_oi": null, "mejor_corregida_to_od": null, "mejor_corregida_to_oi": null}';
       }

       return $value;
    }

    /**
     *
     */
    public function adjuntos()
    {
        return $this->hasMany('App\Models\Adjunto');
    }

}
