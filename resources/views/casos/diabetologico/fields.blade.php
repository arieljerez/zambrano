
<div class="form-group row">
    <div class="col-md-12">
        {!! Form::text('diabetologico[medico]',  $diabetologico->medico, ['class' => 'form-control'. ($errors->has('diabetologico.medico') ? ' is-invalid' : '') ]) !!}
    </div>
    <label for="diabetologico[medico]" class="col-sm-4 col-form-label text-md-left">{{ __('Médico de Cabecera') }}</label>
    @if ($errors->has('diabetologico[medico]'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('diabetologico[medico]') }}</strong>
        </span>
    @endif
</div>

<div class="row">
    <div class="form-group col-md-6">
    <input type="text" name="diabetologico[servicio]" class="form-control{{ $errors->has('diabetologico.servicio') ? ' is-invalid' : '' }}" value="{{ old('diabetologico.servicio', $diabetologico->servicio )}}"/>
    <label for="diabetologico[servicio]" class="col-form-label text-md-left">{{ __('Servicio') }}</label>
    @if ($errors->has('diabetologico.servicio'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('diabetologico.servicio') }}</strong>
       </span>
    @endif
    </div>

    <div class="form-group col-md-6">
    <input type="text" name="diabetologico[contacto]" class="form-control{{ $errors->has('diabetologico.contacto') ? ' is-invalid' : '' }}" value="{{ old('diabetologico.servicio', $diabetologico->contacto )}}"/>
    <label for="diabetologico[contacto]" class="col-form-label text-md-left">{{ __('Contacto') }}</label>
    @if ($errors->has('diabetologico.contacto'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('diabetologico.contacto') }}</strong>
      </span>
    @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        TIPO DE DM
    </div>
</div>
<div class="row">
    <div class="form-group col-md-2">
        <input type="radio" name="diabetologico[dm]" class="form-control" value="1" {{ old('diabetologico.dm', $diabetologico->dm ) == 1 ? 'checked': '' }} />
        <label for="diabetologico[dm]" class="col-form-label text-md-left">{{ __('1') }}</label>
        @if ($errors->has('diabetologico.dm'))
            <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('diabetologico.dm') }}</strong>
       </span>
        @endif
    </div>

    <div class="form-group col-md-2">
        <input type="radio" name="diabetologico[dm]" class="form-control" value="2" {{ old('diabetologico.dm', $diabetologico->dm ) == 2 ? 'checked': '' }}/>
        <label for="diabetologico[dm]" class="col-form-label text-md-left">{{ __('2 Insulinotratado') }}</label>
        @if ($errors->has('diabetologico.dm'))
            <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('diabetologico.dm') }}</strong>
       </span>
        @endif
    </div>

    <div class="form-group col-md-3">
        <input type="radio" name="diabetologico[dm]" class="form-control" value="3" {{ old('diabetologico.dm', $diabetologico->dm ) == 3 ? 'checked': '' }}/>
        <label for="diabetologico[dm]" class="col-form-label text-md-left">{{ __('2 no Insulinotratado') }}</label>
        @if ($errors->has('diabetologico.dm'))
            <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('diabetologico.dm') }}</strong>
       </span>
        @endif
    </div>

    <div class="form-group col-md-5">
        <input type="text" name="diabetologico[edad_al_diagnostico]" class="form-control"  value="{{old('diabetologico.edad_al_diagnostico', $diabetologico->edad_al_diagnostico) }}")/>
        <label for="diabetologico[edad_al_diagnostico]" class="col-form-label text-md-left">{{ __('Edad al Diagnostico') }}</label>
        @if ($errors->has('diabetologico.edad_al_diagnostico'))
            <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('diabetologico.edad_al_diagnostico') }}</strong>
      </span>
        @endif
    </div>

</div>

<div class="row">

    <div class="form-group col-md-3">
        <input type="text" name="diabetologico[peso]" class="form-control" value="{{old('diabetologico.peso', $diabetologico->peso) }}"/>
        <label for="diabetologico[peso]" class="col-form-label text-md-left">{{ __('Peso') }}</label>
        @if ($errors->has('diabetologico.peso'))
            <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('diabetologico.peso') }}</strong>
      </span>
        @endif
    </div>

    <div class="form-group col-md-3">
        <input type="text" name="diabetologico[talla]" class="form-control" value="{{old('diabetologico.talla', $diabetologico->talla) }}"/>
        <label for="diabetologico[talla]" class="col-form-label text-md-left">{{ __('Talla') }}</label>
        @if ($errors->has('diabetologico.talla'))
            <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('diabetologico.talla') }}</strong>
      </span>
        @endif
    </div>

    <div class="form-group col-md-3">
        <input type="text" name="diabetologico[presion]" class="form-control" value="{{old('diabetologico.presion', $diabetologico->presion) }}"/>
        <label for="diabetologico[presion]" class="col-form-label text-md-left">{{ __('Presión Arterial') }}</label>
        @if ($errors->has('diabetologico.presion'))
            <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('diabetologico.presion') }}</strong>
      </span>
        @endif
    </div>
</div>
<!--- --->
<div class="row">

    <div class="form-group col-md-6">
        <input type="text" name="diabetologico[hemoglobina]" class="form-control" value="{{old('diabetologico.hemoglobina',$diabetologico->hemoglobina) }}"/>
        <label for="diabetologico[hemoglobina]" class="col-form-label text-md-left">{{ __('HEMOGLOBINA GLICOSILADA A') }}</label>
        @if ($errors->has('diabetologico.hemoglobina'))
            <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('diabetologico.hemoglobina') }}</strong>
      </span>
        @endif
    </div>

    <div class="form-group col-md-3">
        <input type="text" name="diabetologico[vr]" class="form-control" value="{{old('diabetologico.vr',$diabetologico->vr) }}"/>
        <label for="diabetologico[vr]" class="col-form-label text-md-left">{{ __('(VR)') }}</label>
        @if ($errors->has('diabetologico.vr'))
            <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('diabetologico.vr') }}</strong>
      </span>
        @endif
    </div>

    <div class="form-group col-md-3">
        <input type="date" name="fecha" class="form-control"/>
        <label for="fecha" class="col-form-label text-md-left">{{ __('Fecha') }}</label>
        @if ($errors->has('fecha'))
            <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('fecha') }}</strong>
      </span>
        @endif
    </div>
</div>
<!--- --->

<div class="row">

    <div class="form-group col-md-3">
    </div>
    <div class="form-group col-md-1">
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="nefropatia">SI</label>
        </div>
    </div>
    <div class="form-group col-md-1">
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="nefropatia">NO</label>
        </div>
    </div>
</div>

@php
  $opciones = [
      ['label'=> 'Nefropatia','nombre'=> 'diabetologico[nefropatia]', 'propiedad' => 'nefropatia', 'session' => 'diabetologico.nefropatia', 'valor' => $diabetologico->nefropatia ],
      ['label'=> 'Neuropatía','nombre'=> 'diabetologico[neuropatia]', 'propiedad' => 'neuropatia', 'session' => 'diabetologico.neuropatia', 'valor' => $diabetologico->neuropatia ],
      ['label'=> 'Dislipidemia','nombre'=> 'diabetologico[dislipidemia]', 'propiedad' => 'dislipidemia', 'session' => 'diabetologico.dislipidemia', 'valor' => $diabetologico->dislipidemia ],
      ['label'=> 'Vasculopatía Periférica','nombre'=> 'diabetologico[vasculopatia_periferica]', 'propiedad' => 'vasculopatia_periferica', 'session' => 'diabetologico.vasculopatia_periferica', 'valor' => $diabetologico->vasculopatia_periferica],
      ['label'=> 'Tabaquismo','nombre'=> 'diabetologico[tabaquismo]', 'propiedad' => 'tabaquismo', 'session' => 'diabetologico.tabaquismo', 'valor' => $diabetologico->tabaquismo],
  ];
@endphp

@foreach( $opciones as $op)
<div class="row">
    <div class="form-group col-md-3">
        <label class="form-check-label" for="{{$op['propiedad']}}">{{$op['label']}}</label>
    </div>
    <div class="form-group col-md-1">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="{{$op['nombre']}}" id="{{$op['propiedad']}}" value="1" {{ old('$op[\'propiedad\']',$op['valor'] ) == 1 ? 'checked': '' }}>
        </div>
    </div>
    <div class="form-group col-md-1">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="{{$op['nombre']}}" id="{{$op['propiedad']}}" value="0" {{ old('$op[\'propiedad\']',$op['valor'] ) == 0 ? 'checked': '' }}>
        </div>
    </div>
</div>
@endforeach

<div class="row">
    <div class="form-group col-md-3">
        <label class="form-check-label" for="Enfermedad">Enfermedad</label>
    </div>
    <div class="form-group col-md-1">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="diabetologico[enfermedad]" id="Enfermedad" value="1" {{ old('diabetologico.enfermedad', $diabetologico->enfermedad ) == 1 ? 'checked': '' }}>
        </div>
    </div>
    <div class="form-group col-md-1">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="diabetologico[enfermedad]" id="Enfermedad" value="0" {{ old('diabetologico.enfermedad', $diabetologico->enfermedad ) == 0 ? 'checked': '' }}>
        </div>
    </div>
    <div class="form-group col-md-5">
        <input class="form-control" type="text" name="diabetologico[otros]" id="Otros" value="{{ old('diabetologico.otros', $diabetologico->otros )}}"/>
        <label class="form-check-label" for="Otros">Otros</label>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-3"><h3>Tratamiento</h3></div>
</div>

@php
  $tratamientos = [
      ['label'=> 'Plan Alimentario','nombre'=> 'diabetologico[plan_alimentario]', 'propiedad' => 'plan_alimentario', 'session' => 'diabetologico.plan_alimentario', 'valor' => $diabetologico->plan_alimentario, 'valor_texto' => $diabetologico->plan_alimentario_texto],
      ['label'=> 'Actividad Física','nombre'=> 'diabetologico[actividad_fisica]', 'propiedad' => 'actividad_fisica', 'session' => 'diabetologico.actividad_fisica', 'valor' => $diabetologico->actividad_fisica, 'valor_texto' => $diabetologico->actividad_fisica_texto],
      ['label'=> 'Insulina','nombre'=> 'diabetologico[insulina]', 'propiedad' => 'insulina', 'session' => 'diabetologico.insulina', 'valor' => $diabetologico->insulina, 'valor_texto' => $diabetologico->insulina_texto ],
      ['label'=> 'Educación Terapéutica','nombre' => 'diabetologico[educacion_terapeutica]', 'propiedad' => 'educacion_terapeutica', 'session' => 'diabetologico.educacion_terapeutica', 'valor' => $diabetologico->educacion_terapeutica, 'valor_texto' => $diabetologico->educacion_terapeutica_texto],
      ['label'=> 'Automonitoreo Glucémico','nombre' => 'diabetologico[automonitoreo_glucemico]', 'propiedad' => 'automonitoreo_glucemico', 'session' => 'diabetologico.automonitoreo_glucemico', 'valor' => $diabetologico->automonitoreo_glucemico, 'valor_texto' => $diabetologico->automonitoreo_glucemico_texto],
      ['label'=> 'Otras Medidas Terapeúticas','nombre' => 'diabetologico[otras_medidas_terapeuticas]', 'propiedad' => 'otras_medidas_terapeuticas', 'session' => 'diabetologico.otras_medidas_terapeuticas', 'valor' => $diabetologico->otras_medidas_terapeuticas, 'valor_texto' => $diabetologico->otras_medidas_terapeuticas_texto],
  ];
@endphp

@foreach($tratamientos as $tratamiento)
  <div class="row">
      <div class="form-group col-md-3">
          <label class="form-check-label" for="{{ $tratamiento['propiedad']}}">{{ $tratamiento['label']}}</label>
      </div>
      <div class="form-group col-md-1">
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="{{ $tratamiento['nombre']}}" id="{{ $tratamiento['propiedad']}}" value="1" {{ old('$tratamiento[\'propiedad\']',$tratamiento['valor'] ) == 1 ? 'checked': '' }}>
          </div>
      </div>
      <div class="form-group col-md-1">
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="{{ $tratamiento['nombre']}}" id="{{ $tratamiento['propiedad']}}" value="0" {{ old('$tratamiento[\'propiedad\']',$tratamiento['valor'] ) == 0 ? 'checked': '' }}>
          </div>
      </div>
      <div class="form-group col-md-7">
              <input class="form-control" type="text" name="diabetologico[{{ $tratamiento['propiedad']}}_texto]" id="diabetologico[{{ $tratamiento['propiedad']}}_texto]" value="{{ $tratamiento['valor_texto']}}">
      </div>
  </div>
@endforeach

<div class="row">
    <div class="form-group col-md-3">
        <label class="form-check-label" for="observaciones">Observaciones</label>
    </div>
    <div class="form-group col-md-9">
        <textarea class="form-control" type="texta" name="diabetologico[observaciones]*" id="Observaciones" rows="5"></textarea>
    </div>
</div>

