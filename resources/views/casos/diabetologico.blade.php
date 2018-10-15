
<div class="card">
    <div class="card-header">Control Diabetológico </div>
    <div class="card-body">

        <div class="form-group row">
            <div class="col-md-12">
                {!! Form::text('medico[medico]', $caso->diabetologico->medico->medico, ['class' => 'form-control']) !!}
            </div>
            <label for="medico" class="col-sm-4 col-form-label text-md-left">{{ __('Médico de Cabecera') }}</label>
            @if ($errors->has('medico[medico]'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('medico[medico]') }}</strong>
                </span>
            @endif
        </div>

        <div class="row">
            <div class="form-group col-md-6">
            <input type="text" name="servicio" class="form-control"/>
            <label for="servicio" class="col-form-label text-md-left">{{ __('Servicio') }}</label>
            @if ($errors->has('servicio'))
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('servicio') }}</strong>
               </span>
            @endif
            </div>

            <div class="form-group col-md-6">
            <input type="text" name="contacto" class="form-control"/>
            <label for="contacto" class="col-form-label text-md-left">{{ __('Contacto') }}</label>
            @if ($errors->has('contacto'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('contacto') }}</strong>
              </span>
            @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-2">
                <input type="checkbox" name="dm_1" class="form-control"/>
                <label for="dm_1" class="col-form-label text-md-left">{{ __('1') }}</label>
                @if ($errors->has('dm_1'))
                    <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('dm_1') }}</strong>
               </span>
                @endif
            </div>

            <div class="form-group col-md-2">
                <input type="checkbox" name="dm_2" class="form-control"/>
                <label for="dm_2" class="col-form-label text-md-left">{{ __('2 Insulinotratado') }}</label>
                @if ($errors->has('dm_2'))
                    <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('dm_2') }}</strong>
               </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                <input type="checkbox" name="dm_2no" class="form-control"/>
                <label for="dm_2no" class="col-form-label text-md-left">{{ __('2 no Insulinotratado') }}</label>
                @if ($errors->has('dm_2no'))
                    <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('dm_2no') }}</strong>
               </span>
                @endif
            </div>

            <div class="form-group col-md-5">
                <input type="text" name="edad_al_diagnostico" class="form-control"/>
                <label for="edad_al_diagnostico" class="col-form-label text-md-left">{{ __('Edad al Diagnostico') }}</label>
                @if ($errors->has('edad_al_diagnostico'))
                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('edad_al_diagnostico') }}</strong>
              </span>
                @endif
            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-3">
                <input type="text" name="peso" class="form-control"/>
                <label for="peso" class="col-form-label text-md-left">{{ __('Peso') }}</label>
                @if ($errors->has('peso'))
                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('peso') }}</strong>
              </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                <input type="text" name="talla" class="form-control"/>
                <label for="talla" class="col-form-label text-md-left">{{ __('Talla') }}</label>
                @if ($errors->has('talla'))
                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('talla') }}</strong>
              </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                <input type="text" name="presion" class="form-control"/>
                <label for="presion" class="col-form-label text-md-left">{{ __('Presión Arterial') }}</label>
                @if ($errors->has('presion'))
                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('presion') }}</strong>
              </span>
                @endif
            </div>
        </div>
<!--- --->
        <div class="row">

            <div class="form-group col-md-6">
                <input type="text" name="peso" class="form-control"/>
                <label for="hemoglobina" class="col-form-label text-md-left">{{ __('HEMOGLOBINA GLICOSILADA A') }}</label>
                @if ($errors->has('hemoglobina'))
                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('hemoglobina') }}</strong>
              </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                <input type="text" name="vr" class="form-control"/>
                <label for="vr" class="col-form-label text-md-left">{{ __('(VR)') }}</label>
                @if ($errors->has('vr'))
                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('vr') }}</strong>
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

        <div class="row">
            <div class="form-group col-md-3">
                    <label class="form-check-label" for="nefropatia">Nefropatia</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="nefropatia" id="nefropatia1" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="nefropatia" id="nefropatia1" value="0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="Neuropatia">Neuropatía</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Neuropatia" id="Neuropatia1" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Neuropatia" id="Neuropatia1" value="0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="Dislipidemia">Dislipidemia</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Dislipidemia" id="Dislipidemia" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Dislipidemia" id="Dislipidemia" value="0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="HipertensionArterial">Hipertensión Arterial</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="HipertensionArterial" id="HipertensionArterial" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="HipertensionArterial" id="HipertensionArterial" value="0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="VasculopatiaPeriferica">Vasculopatía Periférica </label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="VasculopatiaPeriferica" id="VasculopatiaPeriferica" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="VasculopatiaPeriferica" id="VasculopatiaPeriferica" value="0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="Tabaquismo">Tabaquismo</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Tabaquismo" id="Tabaquismo" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Tabaquismo" id="Tabaquismo" value="0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="Tabaquismo">Enfermedad</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Enfermedad" id="Enfermedad" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Enfermedad" id="Enfermedad" value="0">
                </div>
            </div>
            <div class="form-group col-md-5">
                <input class="form-control" type="text" name="Otros" id="Otros"/>
                <label class="form-check-label" for="Otros">Otros</label>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3"><h3>Tratamiento</h3></div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="PlanAlimentario">Plan Alimentario</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="PlanAlimentario" id="PlanAlimentario" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="PlanAlimentario" id="PlanAlimentario" value="0">
                </div>
            </div>
            <div class="form-group col-md-5">
                    <input class="form-control" type="text" name="PlanAlimentarioTexto" id="PlanAlimentarioTexto">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="ActividadFisica">Actividad Física</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ActividadFisica" id="ActividadFisica" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ActividadFisica" id="ActividadFisica" value="0">
                </div>
            </div>
            <div class="form-group col-md-5">
                <input class="form-control" type="text" name="ActividadFisicaTexto" id="ActividadFisica">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="Insulina">Insulina</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Insulina" id="Insulina" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Insulina" id="Insulina" value="0">
                </div>
            </div>
            <div class="form-group col-md-5">
                <input class="form-control" type="text" name="InsulinaTexto" id="InsulinaTexto">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="AntidiabeticosOrales">Antidiabéticos Orales</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="AntidiabeticosOrales" id="AntidiabeticosOrales" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="AntidiabeticosOrales" id="AntidiabeticosOrales" value="0">
                </div>
            </div>
            <div class="form-group col-md-5">
                <input class="form-control" type="text" name="AntidiabeticosOralesTexto" id="AntidiabeticosOralesTexto">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="EducacionTerapeutica">Educación Terapéutica</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="EducacionTerapeutica" id="EducacionTerapeutica" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="EducacionTerapeutica" id="EducacionTerapeutica" value="0">
                </div>
            </div>
            <div class="form-group col-md-5">
                <input class="form-control" type="text" name="EducacionTerapeutica" id="EducacionTerapeutica">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="AutomonitoreoGlucemico">Automonitoreo Glucémico</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="AutomonitoreoGlucemico" id="AutomonitoreoGlucemico" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="AutomonitoreoGlucemico" id="AutomonitoreoGlucemico" value="0">
                </div>
            </div>
            <div class="form-group col-md-5">
                <input class="form-control" type="text" name="AutomonitoreoGlucemicoTexto" id="AutomonitoreoGlucemicoTexto">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="OtrasMedidasTerapeuticas">Otras Medidas Terapeúticas</label>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="OtrasMedidasTerapeuticas" id="OtrasMedidasTerapeuticas" value="1">
                </div>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="OtrasMedidasTerapeuticas" id="OtrasMedidasTerapeuticas" value="0">
                </div>
            </div>
            <div class="form-group col-md-5">
                <input class="form-control" type="text" name="OtrasMedidasTerapeuticasTexto" id="OtrasMedidasTerapeuticasTexto">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-check-label" for="Observaciones">Observaciones</label>
            </div>
            <div class="form-group col-md-9">
                <input class="form-control" type="text" name="Observaciones" id="Observaciones" multiple size="3">
            </div>
        </div>

    </div>
</div>
