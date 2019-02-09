<?php

return [
    'tratamientos' => [
      'eventos' =>  [
          'procedimientos' => 'Procedimientos',
          'imagenes' => 'Imagenes',
          'laboratorio' => 'Laboratorio',
          'consulta' => 'Consultas',
          'otros' => 'Otros'
        ]
    ],
    'casos' => [
      'estados' => [
        'pendiente_formulario' => 'Pendiente Formulario',
        'pendiente_aprobacion' => 'Pendiente Aprobación',
        'aprobado' => 'Aprobado',
        'rechazado' => 'Rechazado',
        'vencido' => 'Vencido'
      ],
    'class' => [
        'pendiente_formulario' => 'bg-primary text-black',
        'pendiente_aprobacion' => 'bg-secondary text-black',
        'aprobado' => 'bg-success text-white',
        'rechazado' => 'bg-danger text-white',
        'vencido' => 'bg-warning text-white'
      ]

    ]

];
