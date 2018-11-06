
<div class="card">
    <div class="card-header">Control Oftalmológico </div>
    <div class="card-body">

        <div class="row">
            <div class="form-group col-md-9">
                <input class="form-control" type="text" name="oftalmologico[derivante]" id="oftalmologico[derivante]" value="{{ old('oftalmologico.derivante',$oftalmologico->derivante)}}">
                <label class="form-check-label" for="oftalmologico[derivante]">Oftalmólogo Derivante</label>
            </div>

            <div class="form-group col-md-3">
                <input class="form-control" type="text" name="oftalmologico[derivante_telefono]" id="oftalmologico[derivante_telefono]" value="{{ old('oftalmologico.derivante_telefono',$oftalmologico->derivante_telefono)}}">
                <label class="form-check-label" for="oftalmologico[derivante_telefono]">Telefono</label>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <input class="form-control" type="text" name="oftalmologico[institucion]" id="oftalmologico[institucion]" value="{{ old('oftalmologico.institucion',$oftalmologico->institucion)}}" />
                <label class="form-check-label" for="Institucion">Institución</label>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">

                <label class="form-check-label" for="oftalmologico[cirugias_previas]"><strong>Cirugias Previas</strong></label>
                <label class="form-check-label" for="od">OD</label>
                <input type="checkbox" class="form-check-inline" name="oftalmologico[cirugias_previas_od]" value ="1" {{ old('oftalmologico.cirugias_previas_od',$oftalmologico->cirugias_previas_od ) == 1 ? 'checked':''}} >
                <label class="form-check-label" for="oi">OI</label>
                <input type="checkbox" class="form-check-inline" name="oftalmologico[cirugias_previas_oi]" value="1"  {{ old('oftalmologico.cirugias_previas_od',$oftalmologico->cirugias_previas_oi ) == 1 ? 'checked':''}}>
                Completar detalles (Tipo de cirugia, fecha, etc)
                <textarea class="form-control" name="CirugiasPrevias" id="CirugiasPrevias"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-inline col-md-12">

                <label class="form-check-label" for="oftalmologico[mejor_corregida]"><strong>AV</strong> Mejor corregida</label> <span class="col-1"></span>
                <label class="form-label" for="od">OI</label>
                <input type="text" class="form-control col-1" name="oftalmologico[mejor_corregida_av_od]" value="{{ old('oftalmologico.mejor_corregida_av_od',$oftalmologico->mejor_corregida_av_od)}}" />
                <label class="form-label" for="oi">OD</label>
                <input type="text" class="form-control col-1" name="oftalmologico[mejor_corregida_av_oi]" value="{{ old('oftalmologico.mejor_corregida_av_oi',$oftalmologico->mejor_corregida_av_oi)}}" />
                <span class="col-1"></span><strong>TO</strong><span class="col-1"></span>
                <label class="form-label" for="od">OI</label>
                <input type="text" class="form-control col-1" name="oftalmologico[mejor_corregida_to_od]" value="{{ old('oftalmologico.mejor_corregida_to_od',$oftalmologico->mejor_corregida_to_od)}}" />
                <label class="form-label" for="oi">OD</label>
                <input type="text" class="form-control col-1" name="oftalmologico[mejor_corregida_to_oi]" value="{{ old('oftalmologico.mejor_corregida_to_oi',$oftalmologico->mejor_corregida_to_oi)}}" />
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <p><strong>BMC</strong></p>
                <p>Marque lo que corresponda</p>
                @php
                  $opciones = [
                      ['label'=> 'Catarata','nombre'=> 'oftalmologico[catarata]', 'propiedad' => 'catarata', 'session' => 'oftalmologico.catarata', 'valor_od' => $oftalmologico->catarata_od , 'valor_oi' => $oftalmologico->catarata_oi ],
                      ['label'=> 'Pseudofaquia','nombre'=> 'oftalmologico[pseudofaquia]', 'propiedad' => 'pseudofaquia', 'session' => 'diabetologico.pseudofaquia', 'valor_od' => $oftalmologico->pseudofaquia_od , 'valor_oi' => $oftalmologico->pseudofaquia_oi],
                      ['label'=> 'Afaquia','nombre'=> 'oftalmologico[afaquia]', 'propiedad' => 'afaquia', 'session' => 'oftalmologico.afaquia', 'valor_od' => $oftalmologico->afaquia_od, 'valor_oi' => $oftalmologico->afaquia_oi ],
                      ['label'=> 'Rubeosis','nombre'=> 'oftalmologico[rubeosis]', 'propiedad' => 'rubeosis', 'session' => 'oftalmologico.rubeosis', 'valor_od' => $oftalmologico->rubeosis_od, 'valor_oi' => $oftalmologico->rubeosis_oi],
                  ];
                @endphp

                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="form-label"></label>
                    </div>
                    <div class="form-group col-md-1">
                        <div class="form-check form-check-inline">
                          <label class="form-label">OD</label>
                      </div>
                    </div>
                    <div class="form-group col-md-1">
                        <div class="form-check form-check-inline">
                            <label class="form-label">OI</label>
                        </div>
                    </div>
                </div>
                @foreach( $opciones as $op)
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="form-check-label" for="{{$op['propiedad']}}">{{$op['label']}}</label>
                    </div>
                    <div class="form-group col-md-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="{{ 'oftalmologico['.$op['propiedad'].'_oi]'}}" id="{{$op['propiedad']}}" value="1" {{ old('$op[\'propiedad\']',$op['valor_oi'] ) == 1 ? 'checked': '' }}>
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="{{ 'oftalmologico['.$op['propiedad'].'_od]'}}" id="{{$op['propiedad']}}" value="1" {{ old('$op[\'propiedad\']',$op['valor_od'] ) == 1 ? 'checked': '' }}>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="form-group col-md-6">
                <p><strong>FONDO DE OJOS</strong></p>
                <p>Marque lo que presente el paciente</p>
                @php
                  $opciones = [
                      ['label'=> 'RDNP Severa','nombre'=> 'oftalmologico[rdnp_severa]', 'propiedad' => 'rdnp_severa', 'session' => 'oftalmologico.rdnp_severa', 'valor_od' => $oftalmologico->rdnp_severa_od , 'valor_oi' => $oftalmologico->rdnp_severa_oi  ],
                      ['label'=> 'RDNP Leve','nombre'=> 'oftalmologico[rdnp_leve]', 'propiedad' => 'rdnp_leve', 'session' => 'diabetologico.rdnp_leve', 'valor_od' => $oftalmologico->rdnp_leve_od , 'valor_oi' => $oftalmologico->rdnp_leve_oi],
                      ['label'=> 'RDNP Moderada','nombre'=> 'oftalmologico[rdnp_moderada]', 'propiedad' => 'rdnp_moderada', 'session' => 'oftalmologico.rdnp_moderada', 'valor_od' => $oftalmologico->rdnp_moderada_od, 'valor_oi' => $oftalmologico->rdnp_moderada_oi ],
                      ['label'=> 'RDP','nombre'=> 'oftalmologico[rdnp]', 'propiedad' => 'rdnp', 'session' => 'oftalmologico.rdnp', 'valor_od' => $oftalmologico->rdnp_od, 'valor_oi' => $oftalmologico->rdnp_oi ],
                      ['label'=> 'Edema macular','nombre'=> 'oftalmologico[edema_macular]', 'propiedad' => 'edema_macular', 'session' => 'oftalmologico.edema_macular', 'valor_od' => $oftalmologico->edema_macular_od, 'valor_oi' => $oftalmologico->edema_macular_oi],
                  ];
                @endphp

                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="form-label"></label>
                    </div>
                    <div class="form-group col-md-1">
                        <div class="form-check form-check-inline">
                          <label class="form-label">OD</label>
                      </div>
                    </div>
                    <div class="form-group col-md-1">
                        <div class="form-check form-check-inline">
                            <label class="form-label">OI</label>
                        </div>
                    </div>
                </div>
                @foreach( $opciones as $op)
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="form-check-label" for="{{$op['propiedad']}}">{{$op['label']}}</label>
                    </div>
                    <div class="form-group col-md-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="{{ 'oftalmologico['.$op['propiedad'].'_oi]'}}" id="{{$op['propiedad']}}" value="1" {{ old('$op[\'propiedad\']',$op['valor_oi'] ) == 1 ? 'checked': '' }}>
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="{{ 'oftalmologico['.$op['propiedad'].'_od]'}}" id="{{$op['propiedad']}}" value="1" {{ old('$op[\'propiedad\']',$op['valor_od'] ) == 1 ? 'checked': '' }}>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <input type="text" class="form-control" name="oftalmologico[otros]" value="{{ old('oftalmologico.otros', $oftalmologico->otros) }}" />
        <label class="form-label" for="oi">Otros</label>
        <input type="text" class="form-control" name="oftalmologico[tratamiento_actual]"  value="{{ old('oftalmologico.tratamiento_actual', $oftalmologico->tratamiento_actual) }}" />
        <label class="form-label" for="oi">TRATAMIENTO OFTALMOLOGICO ACTUAL</label>

        <div class="row">
            <div class="form-group col-md-6">
              <label class="form-label"><strong>Hb A1c</strong></label>
              <input type="date" class="form-control col-md-6" name="oftalmologico[fecha_hb_a1c]" value="{{ old('oftalmologico.fecha_hb_a1c', $oftalmologico->fecha_hb_a1c) }}"  />

              <label class="form-label" for="oi">MOTIVO DE LA DERIVACION</label>
              <textarea name= "oftalmologico[motivo_derivacion]" class="form-control" rows="5">{{ old('oftalmologico.motivo_derivacion', $oftalmologico->motivo_derivacion) }}</textarea>

            </div>

            <div class="form-group col-md-6">
              <textarea name= "oftalmologico[firma]" class="form-control" rows="5">{{ old('oftalmologico.firma', $oftalmologico->firma) }}</textarea>
              <label class="form-label" for="oi">Firma - Sello</label>


              <input type="date" class="form-control col-md-6" name="oftalmologico[fecha]" value="{{ old('oftalmologico.fecha', $oftalmologico->fecha) }}"/>
              <label class="form-label">Fecha</label>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="archivo">Subir archivo:</label>
            </div>
            <div class="form-group col-md-6">
                <input class="form-control" type="file" name="archivo" id="oftalmologico_archivo">
            </div>
            <div class="form-group col-md-3">
                <a href="{{ asset('descargar/'.$caso->oftalmologico_archivo) }}" class="btn btn-primary">Descargar</a>
            </div>
        </div>
    </div>
</div>
