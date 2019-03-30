<?php
namespace App\Serializables;

Class Oftalmologico
{
  public $fecha = null;
  public $firma = null;
  public $otros = null;
  public $afaquia_od = 0;
  public $afaquia_oi = 0;
  public $catarata_od = 0;
  public $catarata_oi = 0;
  public $rubeosis_od = 0;
  public $rubeosis_oi = 0;
  public $derivante = null;

  public $institucion = null;
  public $rdnp_severa_oi = 0;
  public $rdnp_severa_od = 0;

  public $rdnp_leve_oi = 0;
  public $rdnp_leve_od = 0;

  public $rdnp_moderada_oi = 0;
  public $rdnp_moderada_od = 0;

  public $rdnp_oi = null;
  public $rdnp_od = null;

  public $edema_macular_oi = 0;
  public $edema_macular_od = 0;
  
  public $fecha_hb_a1c = null;
  public $pseudofaquia_od = 0;
  public $pseudofaquia_oi = 0;


  public $derivante_telefono = null;
  public $tratamiento_actual = null;
  public $cirugias_previas = "";
  public $cirugias_previas_od = 0;
  public $cirugias_previas_oi = 0;
  public $motivo_derivacion = null;
  public $mejor_corregida_av_od = null;
  public $mejor_corregida_av_oi = null;
  public $mejor_corregida_to_od = null;
  public $mejor_corregida_to_oi = null;

  public function __construct(array $data)
  {
      foreach ($data as $key => $valor) {
        $this->$key = $valor;
      }
  }
}
