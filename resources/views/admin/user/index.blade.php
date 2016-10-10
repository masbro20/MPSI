@extends('layouts.admin')
@section('content')
<?php $no=1; ?>
<ul id="task-card" class="collection with-header">
	<li class="collection-header">
		<h4 class="task-card-title">User</h4>
    	<p class="task-card-date">Manage User</p>
    </li>
    <a href="#add-modal" class="task-add modal-trigger btn-floating waves-effect waves-light"><i class="mdi-content-add"></i></a>
    <li>
    	<table style="margin: 10px;">
    		<thead>
    			<th>No</th>
    			<th>User ID</th>
    			<th>User Name</th>
    			<th>Role</th>
    			<th>Aksi</th>
    		</thead>
    		<tbody>
    			@foreach ($usr as $usrs)
    				<tr>
    					<td>{{$no++}}</td>
    					<td>{{$usrs->id}}</td>
    					<td>{{$usrs->name}}</td>
    					<td>{{$rol[$usrs->role_id]}}</td>
    					<td><a href="#" class="btn">Edit</a><a href="#" class="btn">Delete</a></td>
    				</tr>
    			@endforeach
    		</tbody>
    	</table>
    </li>
</ul>
<div id="add-modal" class="modal">
	<nav class="task-modal-nav red">
    	<div class="nav-wrapper">
        	<div class="left col s12 m5 l5">
            	<ul>
                	<li><a href="#!" class="todo-menu"><i class="modal-action modal-close  mdi-hardware-keyboard-backspace"></i></a></li>
                	<li>Tambah User</li>
				</ul>
            </div>
        </div>
    </nav>
	<div class="modal-content">                    
    	<div class="row" style="margin-left: 10px;margin-right: 10px;">
		{!! Form::open(['url' => '/admin/user',  'class' => 'control_form']) !!}
		    <div class="row_form">
		    	<div class="input-field">
		    		<i class="mdi-action-account-circle prefix"></i>
		    		{!! Form::label("nama", "Nama") !!}
		    		{!! Form::text("name", null, ["class" => "form-control"]) !!}
		    	</div>
		    </div>

		    <div class="row_form">
		    	<div class="input-field">
		    		<i class="mdi-action-account-circle prefix"></i>
		    		{!! Form::label("email", "Email") !!}
		    		{!! Form::email("email", null, ["class" => "form-control"]) !!}
		    	</div>
		    </div>

		    <div class="row_select">
		    	<div class="input-field">
		    		{!! Form::select("role_id", $rol,null, ["class" => "leveldd"]) !!}
		    	</div>
		    </div>

		    <div class="row_form">
		    	<div class="input-field">
		    		<i class="mdi-action-account-circle prefix"></i>
		    		{!! Form::label("password", "Password") !!}
		    		{!! Form::password("password", null, ["class" => "form-control"]) !!}
		    	</div>
		    </div>        
        </div>
    </div>
	<div class="modal-footer">
		<button href="#" class="waves-effect waves-red btn-flat modal-action modal-close" type="submit">Save</button>
	</div>
	{!! Form::close() !!}                   
</div>
@endsection