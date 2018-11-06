<?php

namespace App\Serializables;

Class Diabetologico
{


  public function __construct(array $data)
  {
      foreach ($data as $key => $valor) {
        $this->$key = $valor;
      }
  }
}
