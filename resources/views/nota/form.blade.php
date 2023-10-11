<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('usuario') }}
            {{ Form::text('usuario',$user, ['class' => 'form-control' . ($errors->has('usuario') ? ' is-invalid' : ''), 'placeholder' => 'usuario','readonly']) }}
            {!! $errors->first('usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('empleado') }}
            {{ Form::select('empleado_id', $empleados, null, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('proveedor') }}
            {{ Form::select('proveedore_id', $proveedores, null, ['class' => 'form-control' . ($errors->has('proveedore_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('proveedore_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('materiales') }}
            {{ Form::select('materiales[]', $materiales, null, ['class' => 'form-control select2' . ($errors->has('materiales') ? ' is-invalid' : ''), 'multiple required']) }}
            {!! $errors->first('materiales', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo') }}
            {{ Form::select('tipo_id', $tipos, null, ['class' => 'form-control' . ($errors->has('tipo_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('tipo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $nota->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $nota->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
