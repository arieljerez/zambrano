<?php

namespace App\Serializables;

Class Diabetologico
{
  public $dm = "";
  public $vr = "";
  public $peso = "";
  public $talla = "";
  public $otros = "";
  public $medico = "";
  public $presion = "";
  public $contacto = "";
  public $insulina = 0;
  public $servicio = "";
  public $enfermedad = 0;
  public $nefropatia = 0;
  public $neuropatia = 0;
  public $tabaquismo = 0;
  public $hemoglobina = "";
  public $dislipidemia = 0;
  public $observaciones = "";
  public $insulina_texto = "";
  public $actividad_fisica = 0;
  public $plan_alimentario = 0;
  public $edad_al_diagnostico = "";
  public $educacion_terapeutica = 0;
  public $actividad_fisica_texto = "";
  public $plan_alimentario_texto = "";
  public $automonitoreo_glucemico = 0;
  public $vasculopatia_periferica = 0;
  public $otras_medidas_terapeuticas = 0;
  public $educacion_terapeutica_texto = "";
  public $automonitoreo_glucemico_texto = "";
  public $otras_medidas_terapeuticas_texto = "";
  public $fecha = "";

  public function __construct(array $data)
  {
      foreach ($data as $key => $valor) {
        $this->$key = $valor;
      }
  }

}
