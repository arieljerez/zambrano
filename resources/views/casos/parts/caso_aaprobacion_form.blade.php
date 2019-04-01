{!! Form::model($caso, ['method' => 'PUT','route' => ['medico.update', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}
    <input type="hidden" name="cambiar_estado" value="pendiente_formulario">
    <button type="submit" class="btn btn-primary float-right">
        A aprobación <i class="fa fa-step-forward" aria-hidden="true"></i>
    </button>
{!! Form::Close() !!}
