@extends('layouts.admin')

@section('content')

<div class="card-panel">
<h4>Psikolog <small> / edit </small></h4>

	{!! Form::model($psi, [
	        'method' => 'PATCH',
	        'action' => ['PsikologController@update', $psi->id],
	        'class' => 'form-horizontal']) !!}

		    <div class="row_form">
		    	<div class="input-field">
		    		<i class="mdi-action-account-circle prefix"></i>
		    		{!! Form::label("nama", "Nama") !!}
		    		{!! Form::text("nama", null, ["class" => "form-control"]) !!}
		    	</div>
		    </div>

		    <div class="row_form">
		    	<div class="input-field">
		    		<i class="mdi-action-account-circle prefix"></i>
		    		{!! Form::label("no_hp", "Nomor Hp") !!}
		    		{!! Form::text("no_hp", null, ["class" => "form-control"]) !!}
		    	</div>
		    </div>
		<button class = "waves-effect waves-red btn-flat"><i class = "mdi-navigation-arrow-back"></i></button><button href="#" class="waves-effect waves-red btn-flat small" type="submit">Save</button>
	{!! Form::close() !!}  
	</div>               
@endsection