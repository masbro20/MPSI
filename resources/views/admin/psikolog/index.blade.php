@extends('layouts.admin')
@section('content')
<script type="text/javascript">
    $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 0});
  });
</script>
<?php $no=1; ?>
<ul id="task-card" class="collection with-header">
	<li class="collection-header cyan">
		<h4 class="task-card-title">Psikolog</h4>
    	<p class="task-card-date">Manage Psikolog</p>
    </li>
    <a href="#add-modal" class="task-add modal-trigger btn-floating waves-effect waves-light"><i class="mdi-content-add"></i></a>
    <li>
    	<table style="margin: 10px;">
    		<thead>
    			<th>No</th>
    			<th>Nama Psikolog</th>
    			<th>Nomor HP</th>
    			<th>Aksi</th>
    		</thead>
    		<tbody>
    			@foreach ($psiko as $psikos)
    				<tr>
    					<td>{{$no++}}</td>
    					<td>{{$psikos->nama}}</td>
    					<td>{{$psikos->no_hp}}</td>
    					<td><a href="{{url('/admin/psikolog/'.$psikos->id.'/edit')}}" class="btn tooltipped" data-tooltip = "edit" data-position="left"><i class = "mdi-editor-mode-edit"></i></a>
                        <a href="#" class="btn tooltipped" data-tooltip = "delete" data-position="top"><i class = "mdi-action-delete"></i></a>
                        <a href="#add-modal2" class="btn tooltipped modal-trigger" data-tooltip = "tambah piket" data-position="right"></i></a>
                        
                        </td>
    				</tr>
    			@endforeach
    		</tbody>
    	</table>
    </li>
</ul>
<div id="add-modal2" class="modal">
    <nav class="task-modal-nav green">
        <div class="nav-wrapper">
            <div class="left col s12 m5 l5">
                <ul>
                    <li><a href="#!" class="todo-menu"><i class="modal-action modal-close  mdi-hardware-keyboard-backspace"></i></a></li>
                    <li>Tambah Piket Psikolog</li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal-content">                    
        <div class="row" style="margin-left: 10px;margin-right: 10px;">
        {!! Form::open(['url' => '/admin/psikolog',  'class' => 'control_form']) !!}
            <div class="row_form">
                <input type="checkbox" id="senin" />
                <label for="senin">Senin</label>
            </div>
            <div class="row_form">
                <input type="checkbox" id="selasa" />
                <label for="selasa">Selasa</label>
            </div>
            <div class="row_form">
                <input type="checkbox" id="rabu" />
                <label for="rabu">Rabu</label>
            </div>
            <div class="row_form">
                <input type="checkbox" id="kamis" />
                <label for="kamis">Kamis</label>
            </div>
            <div class="row_form">
                <input type="checkbox" id="jumat" />
                <label for="jumat">Jum'at</label>
            </div>
            <div class="row_form">
                <input type="checkbox" id="sabtu" />
                <label for="sabtu">Sabtu</label>
            </div>
            <div class="row_form">
                <input type="checkbox" id="minggu" />
                <label for="minggu">Minggu</label>
            </div>
    <div class="modal-footer">
        <button href="#" class="waves-effect waves-red btn-flat modal-action" type="submit">Save</button>
    </div>
    {!! Form::close() !!}
    </div>
</div>
<div id="add-modal" class="modal">
    <nav class="task-modal-nav red">
        <div class="nav-wrapper">
            <div class="left col s12 m5 l5">
                <ul>
                    <li><a href="#!" class="todo-menu"><i class="modal-action modal-close  mdi-hardware-keyboard-backspace"></i></a></li>
                    <li>Tambah Psikolog</li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal-content">                    
        <div class="row" style="margin-left: 10px;margin-right: 1s0px;">
        {!! Form::open(['url' => '/admin/psikolog',  'class' => 'control_form']) !!}
            <div class="row_form">
                <div class="input-field">
                    <i class="mdi-action-account-circle prefix"></i>
                    {!! Form::label("nama", "Nama") !!}
                    {!! Form::text("nama", null, ["class" => "form-control", "required"]) !!}
                </div>
            </div>

            <div class="row_form">
                <div class="input-field">
                    <i class="mdi-action-account-circle prefix"></i>
                    {!! Form::label("no_hp", "Nomor HP") !!}
                    {!! Form::text("no_hp", null, ["class" => "form-control", "required"]) !!}
                </div>
            </div>        
        </div>
    </div>
    <div class="modal-footer">
        <button href="#" class="waves-effect waves-red btn-flat modal-action" type="submit">Save</button>
    </div>
    {!! Form::close() !!}                   
</div>
@endsection