<?php

return [
    'tratamientos' => [
      'eventos' =>  [
          'solicitud' => 'Solicitud',
          'informe' => 'Informe'
        ],
      'estados' => [
        'solicitado' => 'Solicitado',
        'aprobado' => 'Aprobado'
      ]
    ],
    'casos' => [
      'estados' => [
        'pendiente-formulario' => 'Pendiente Formulario',
        'pendiente-aprobacion' => 'Pendiente Aprobación',
        'aprobado' => 'Aprobado',
        'rechazado' => 'Rechazado',
        'vencido' => 'Vencido'
      ],
    'class' => [
        'pendiente-formulario' => 'bg-default text-black',
        'pendiente-aprobacion' => 'bg-primary text-white',
        'aprobado' => 'bg-success text-white',
        'rechazado' => 'bg-danger text-white',
        'vencido' => 'bg-danger text-white'
      ]

    ]

];
