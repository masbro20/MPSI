@extends('layouts.admin')
@section('content')
<script type="text/javascript">
jq = jQuery.noConflict(true);
jq(document).ready(function(){
    $('.tooltipped').tooltip({delay: 0});
});

function openPiket(ob){
    jq('.pikets').html("Loading..");
    var token = jq('.csrf').val();
    var id = ob.attr('id');
    jq('.ids').val(id);
    var data = {'id':id};
    var url = '{{url('admin/cekpiket')}}';
    jq.ajaxSetup({
        headers: {'X-CSRF-TOKEN': token},
    });
    jq.ajax({
        type: 'POST',
        url : url,
        data : data,
        datatype : 'JSON',
        //beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', token)},
        success : function(data){
            jq('.pikets').html(data.add);
            var anu = jq(data.add);
        }
    });
}

function savePiket() {
    var token = jq('.csrf').val();
    var vals = saveTable();
    var id = jq('.ids').val();
    var data = {'vals':vals,'id':id};
    var url = '{{url('admin/savepiket')}}';
    jq.ajaxSetup({
        headers: {'X-CSRF-TOKEN': token},
    });
    jq.ajax({
        type: 'POST',
        url : url,
        data : data,
        datatype : 'JSON',
        //beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', token)},
        success : function(data){
            //console.log(data.add);
            Materialize.toast(data.add, 4000);
        }
    });
}

function saveTable(){
    var jsn_obj = {};
    jsn_obj["hari"] = [];
    jsn_obj["shift"] = [];
    jq('.hari').each(function(){
        if(jq(this).find('.nh').is(':checked')){
            jsn_obj.hari.push(jq(this).find('.nh').attr('name'));
            jsn_obj.shift.push(jq(this).find('input:radio:checked').attr('class'));
        }
    });
    var data = JSON.stringify(jsn_obj);
    return data;
}
</script>
<?php $no=1; ?>
<ul id="task-card" class="collection with-header">
    <input type="hidden" class="csrf" value="{{csrf_token()}}">
	<li class="collection-header">
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
                        <a href="#add-modal2" class="btn tooltipped modal-trigger" data-tooltip = "tambah piket" data-position="right" onclick="openPiket(jq(this))" id="{{$psikos->id}}"></i>Piket</a>
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
        {!! Form::open(['url' => '/admin/psikolog',  'class' => 'pikets']) !!}
        {!! Form::close() !!}
        <input type="hidden" class="ids">
        </div>
    </div>
    <div class="modal-footer">
        <button href="#" class="waves-effect waves-red btn-flat modal-close modal-action" type="submit" onclick="savePiket();">Save</button>
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