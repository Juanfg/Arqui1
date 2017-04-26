@extends('layouts.blank')

@section('title')
Actualizar Perfil
@endsection

@section('content')

{!! Form::open( ['route' => ['perfil.update', $perfil->id], 'method' => 'PUT','files'=>true ]) !!}
<div class="form-group col-sm-3 col-xs-12">
	<img  width="200" height="200" align="middle" src="{{ $perfil->picture_path ? $perfil->picture_path : asset('img/selene.jpg') }}"/>
	{!! Form::file('users[picture]') !!}
</div>

<div id="data" class="col-xs-12 col-sm-9">
	<!-- Datos Cliente -->
	<div class="form-group">
		<div class="input-group col-xs-12">
			<label for="dir" class="col-xs-12">Datos de tu cuenta:</label>

			<div class="form-group col-sm-12 col-xs-12">
				<div class="input-group col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-at"></i></span>
						{!! Form::text('users[email]', $perfil->email, ['class' => 'form-control', 'placeholder' => 'Email de acceso']) !!}
					</div>
				</div>
			</div>
			
			<div class="form-group col-sm-4 col-xs-12">
				<div class="input-group col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-key"></i></span>
						{!! Form::password('users[password]', ['class' => 'form-control', 'placeholder' => 'Nuevo password']) !!}
					</div>
				</div>
			</div>

			<div class="form-group col-sm-4 col-xs-12">
				<div class="input-group col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-key"></i></span>
						{!! Form::password('users[password_confirm]', ['class' => 'form-control', 'placeholder' => 'Confirma el password']) !!}
					</div>
				</div>
			</div>
			

			<div class="col-xs-12">
				<div class="form-group col-sm-4 col-xs-12">
					<label>Cambia tu llave</label>
					{!! Form::file('key') !!}
				</div>
				<div class="col-sm-4">
					<label>Cambia tu certificado</label>
					{!! Form::file('cer') !!}
				</div>
				<div class="col-sm-4">
					<label>Contrase&ntilde;a de tu llave:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-certificate"></i></span>
						{!! Form::password("users[password_cer]") !!}
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Fiscales -->
	<div class="form-group">
		<div class="input-group col-xs-12">
			<label for="dir" class="col-xs-12">Datos fiscales:</label>

			<div class="form-group col-sm-6 col-xs-12">
				<div class="input-group col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						{!! Form::text('datos_cli[razon_social]', $datosGenerales->razon_social, ['class' => 'form-control', 'placeholder' => 'Razón social']) !!}
					</div>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					{!! Form::text('datos_cli[rfc]', $datosGenerales->rfc, ['class' => 'form-control', 'placeholder' => 'RFC']) !!}
				</div>
			</div>
			<div class="form-group col-sm-6 col-xs-12">
				<div class="input-group col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-at"></i></span>
						{!! Form::text('datos_cli[email]', $datosGenerales->email, ['class' => 'form-control', 'placeholder' => 'Email de facturación']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- DIRECCION -->

	<div class="form-group col-sm-12 col-xs-12">

		<div class="input-group col-xs-12">
			<label for="dir" class="col-xs-12">Dirección de facturación:</label>
			<div class="form-group col-sm-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
					{!! Form::text('direccion[calle]', $direccion->calle, ['class' => 'form-control', 'placeholder' => 'Calle']) !!}
				</div>
			</div>
			<div class="form-group col-sm-3 col-xs-12">
				<div class="input-group col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-home"></i></span>
						{!! Form::text('direccion[num_ext]', $direccion->num_ext, ['class' => 'form-control', 'placeholder' => 'Num ext']) !!}
					</div>
				</div>
			</div>
			<div class="form-group col-sm-3 col-xs-12">
				<div class="input-group col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-building"></i></span>
						{!! Form::text('direccion[num_int]', $direccion->num_int, ['class' => 'form-control', 'placeholder' => 'Num int']) !!}
					</div>
				</div>
			</div>
		</div>

		<div class="form-group col-sm-6 col-xs-12">
			<div class="input-group col-xs-12">
				<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
				{!! Form::text('direccion[colonia]', $direccion->colonia, ['class' => 'form-control', 'placeholder'  => 'Colonia']) !!}
			</div>
		</div>

		<div class="form-group col-sm-6">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
				{!! Form::text('direccion[cp]', $direccion->cp, ['class' => 'form-control', 'placeholder'  => 'CP']) !!}
			</div>
		</div>

		<div class="input-group col-xs-12">

			<div class="form-group col-sm-4">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-compass"></i></span>
					{!! Form::text('direccion[delegacion]', $direccion->delegacion, ['class' => 'form-control', 'placeholder'  => 'Delegacion']) !!}
				</div>
			</div>

			<div class="form-group col-sm-4">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-compass"></i></span>
					{!! Form::text('direccion[municipio]', $direccion->municipio, ['class' => 'form-control', 'placeholder'  => 'Municipio']) !!}
				</div>
			</div>

			<div class="form-group col-sm-4">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-globe"></i></span>
					{!! Form::select("direccion[estado]", $estados, null,[ 'class' => 'form-control' ]) !!}
				</div>
			</div>
		</div>
	</div>

	<!-- FIN DEL FORM -->
</div>

<div class="col-xs-12 col-sm-offset-3 col-sm-6">
	<button class="btn btn-primary btn-block">Actualizar</button>
</div>


@endsection

@push('scripts')
    <script src="{{ asset('js/perfil.js') }}"></script>
@endpush
