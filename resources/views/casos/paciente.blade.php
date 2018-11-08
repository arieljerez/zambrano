<div class="card">
    <div class="card-header">Paciente: Datos Personales</div>

    <div class="card-body">

        <div class="row">
            <div class="form-group col-md-4">
                <input type="text" name="paciente[apellidos]" class="form-control{{ $errors->has('paciente.apellidos') ? ' is-invalid' : '' }}" value="{{ old('paciente.apellidos',$paciente->apellidos) }}"/>
                <label for="paciente[apellidos]" class="col-form-label text-md-left">{{ __('Apellidos') }}</label>
                @if ($errors->has('paciente.apellidos'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('paciente.apellidos') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-5">
                <input type="text" name="paciente[nombres]" class="form-control{{ $errors->has('paciente.nombres') ? ' is-invalid' : '' }}" value="{{ old('paciente.nombres',$paciente->nombres) }}"/>
                <label for="paciente[nombres]" class="col-form-label text-md-left">{{ __('Nombres') }}</label>
                @if ($errors->has('paciente.nombres'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('paciente.nombres') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                <input type="date" name="paciente[fecha_nacimiento]" class="form-control{{ $errors->has('paciente.fecha_nacimiento') ? ' is-invalid' : '' }}"  value="{{ old('paciente.fecha_nacimiento',$paciente->fecha_nacimiento) }}"/>
                <label for="paciente[fecha_nacimiento]" class="col-form-label text-md-left">{{ __('Fecha Nacimiento') }}</label>
                @if ($errors->has('paciente.fecha_nacimiento'))
                    <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('paciente.fecha_nacimiento') }}</strong>
               </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-2">
                <input type="text" name="paciente[edad]" class="form-control{{ $errors->has('paciente.edad') ? ' is-invalid' : '' }}" value="{{ old('paciente.edad') }}"/>
                <label for="paciente[edad]" class="col-form-label text-md-left">{{ __('Edad') }}</label>
                @if ($errors->has('paciente.edad'))
                    <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('paciente.edad') }}</strong>
          </span>
                @endif
            </div>

            <div class="form-group col-md-7">
                <input type="text" name="paciente[domicilio]" class="form-control{{ $errors->has('paciente.domicilio') ? ' is-invalid' : '' }}" value="{{ old('paciente.domicilio',$paciente->domicilio) }}" />
                <label for="paciente[domicilio]" class="col-form-label text-md-left">{{ __('Domicilio') }}</label>
                @if ($errors->has('paciente.domicilio'))
                    <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('paciente.domicilio') }}</strong>
          </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                <input type="text" name="paciente[telefono]" class="form-control{{ $errors->has('paciente.telefono') ? ' is-invalid' : '' }}" value="{{ old('paciente.telefono',$paciente->telefono) }}"/>
                <label for="paciente[telefono]" class="col-form-label text-md-left">{{ __('Teléfono') }}</label>
                @if ($errors->has('paciente.telefono'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('paciente.telefono') }}</strong>
                    </span>
                @endif
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <input type="text" name="paciente[telefono_familiar]" class="form-control{{ $errors->has('paciente.telefono_familiar') ? ' is-invalid' : '' }}" value="{{ old('paciente.telefono_familiar',$paciente->telefono_familiar) }}" />
                <label for="paciente[telefono_familiar]" class="col-form-label text-md-left">{{ __('Telefono Familiar') }}</label>
                @if ($errors->has('paciente.telefono_familiar'))
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('paciente.telefono_familiar') }}</strong>
            </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                <input type="text" name="paciente[dni]" class="form-control{{ $errors->has('paciente.dni') ? ' is-invalid' : '' }}" value="{{ old('paciente.dni', $paciente->dni) }}"/>
                <label for="paciente[dni]" class="col-form-label text-md-left">{{ __('DNI') }}</label>
                @if ($errors->has('paciente.dni'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('paciente.dni') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                {{ Form::select('paciente[sexo]', ['M' => 'Masculino', 'F' => 'Femenino'], $paciente->sexo, ['placeholder' => 'Seleccione una opción','class' => 'form-control'.( $errors->has('paciente.sexo') ? ' is-invalid' : '')]) }}

                <label for="paciente[sexo]" class="col-form-label text-md-left">{{ __('Sexo') }}</label>
                @if ($errors->has('paciente.sexo'))
                    <span class="invalid-feedback" role="alert">
             <strong>{{ $errors->first('paciente.sexo') }}</strong>
         </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                <input type="date" name="paciente[fecha]" class="form-control{{ $errors->has('paciente.fecha') ? ' is-invalid' : '' }}" readonly/>
                <label for="paciente[fecha]" class="col-form-label text-md-left">{{ __('Fecha') }}</label>
                @if ($errors->has('paciente.fecha'))
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('paciente.fecha') }}</strong>
                    </span>
                @endif
            </div>
        </div>

    </div>
</div>
