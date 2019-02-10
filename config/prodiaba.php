<?php

return [
    'tratamientos' => [
      'eventos' =>  [
          'procedimientos' => 'Procedimientos',
          'imagenes' => 'Imagenes',
          'laboratorio' => 'Laboratorio',
          'consulta' => 'Consultas',
          'otros' => 'Otros'
        ],
      'estados' => [
        'solicitado' => 'Solicitado',
        'aprobado' => 'Aprobado'
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
        'pendiente_formulario' => 'bg-default text-black',
        'pendiente_aprobacion' => 'bg-primary text-white',
        'aprobado' => 'bg-success text-white',
        'rechazado' => 'bg-danger text-white',
        'vencido' => 'bg-danger text-white'
      ]

    ]

];
