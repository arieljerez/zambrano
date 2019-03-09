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