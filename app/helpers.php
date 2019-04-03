<?php

function getGuardName()
{
    $guard = auth()->guard(); // Retrieve the guard
    $sessionName = $guard->getName(); // Retrieve the session name for the guard
    // The following extracts the name of the guard by disposing of the first
    // and last sections delimited by "_"
    $parts = explode("_", $sessionName);
    unset($parts[count($parts)-1]);
    unset($parts[0]);
    $guardName = implode("_",$parts);
    return $guardName;
}

function edad($fecha_nacimiento)
{
    return \Carbon\Carbon::parse($fecha_nacimiento)->age;
}

function fecha($fecha)
{
    return \Carbon\Carbon::parse($fecha)->format('d/m/Y');
}

function fecha_vencimiento($fecha)
{
    $fecha = \Carbon\Carbon::parse($fecha)->addDays(ENV('APP_DIAS_VENCIMIENTO'));
    return fecha($fecha);
}

function estado($estado)
{
    return config('prodiaba.casos.estados.'.$estado);
}

function flash($tipo,$mensaje)
{
  Request()->session()->flash($tipo,$mensaje);
}

function flash_success($mensaje)
{
    Request()->session()->flash('success',$mensaje);
}

function set_tab_caso($tab)
{
    if ($tab == 'adjuntos'){
        return Request()->session()->flash('tab_ajuntos','');
    }
  
}