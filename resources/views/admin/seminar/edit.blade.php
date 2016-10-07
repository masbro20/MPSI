@extends('layouts.admin')
@section('content')
<?php
$tipe=["1"=>"Seminar","2"=>"Training"];
?>
<script type="text/javascript" src="{{ asset('asset/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
var jq = jQuery.noConflict(true);

jq(document).ready(function(){
  tinymce.init({ selector: "textarea",theme: "modern",height:"200",entity_encoding : "raw",
      plugins: [
           "advlist autolink link image lists charmap print preview hr anchor pagebreak",
           "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
           "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
     ],
     toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
     toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
     image_advtab: true ,
     
     relative_urls: false,
     external_filemanager_path:"{!! str_finish(asset('asset/filemanager'),'/') !!}",
     filemanager_title:"Carrier Filemanager" ,
     external_plugins: { "filemanager" : "{{asset('asset/filemanager/plugin.min.js') }}"} 
  });
});
function saveForm() {
  tinymce.triggerSave();
  jq('.seminar_form').submit();
}
</script>

<style type="text/css">
	.seminar_form{
		margin:20px;
	}
</style>

<ul id="task-card" class="collection with-header">
	<li class="collection-header cyan">
		<h4 class="task-card-title">Tambah Artikel</h4>
    </li>
    {!! Form::model($sem, ['method' => 'PATCH','action' => ['SeminarController@update', $sem->id],'class' => 'artikel_form']) !!}
		{!! Form::label("judul", "Judul") !!}
		{!! Form::text("judul", null, ["class" => "form-control", "placeholder" => "Judul"]) !!}
	    {!! Form::label("penyelenggara", "Penyelenggara") !!}
	    {!! Form::text("penyelenggara", null, ["class" => "form-control", "placeholder" => "Penyelenggara"]) !!}
		{!! Form::label("tgl", "Tanggal Seminar") !!}
	    {!! Form::text("tgl", null, ["class" => "datepicker", "placeholder" => "DD/MM/YYYY"]) !!}
	    {!! Form::label("start_time", "Start Time") !!}
	    {!! Form::text("start_time", null, ["class" => "timepicker", "placeholder" => "08:00 AM"]) !!}
	    {!! Form::label("end_time", "End Time") !!}
	    {!! Form::text("end_time", null, ["class" => "timepicker", "placeholder" => "08:00 AM"]) !!}
	    {!! Form::label("tempat", "Tempat") !!}
	    {!! Form::text("tempat", null, ["class" => "form-control", "placeholder" => "Tempat"]) !!}
	    {!! Form::label("deskripsi", "Deskripsi Seminar") !!}
	    {!! Form::textarea("deskripsi", null, ["class" => "form-control", "placeholder" => "Deskripsi"]) !!}
	    {!! Form::label("kuota", "Kuota Seminar") !!}
	    {!! Form::number("kuota", null, ["class" => "form-control", "placeholder" => "0"]) !!}
	    {!! Form::label("biaya", "Biaya") !!}
	    {!! Form::number("biaya", null, ["class" => "form-control", "placeholder" => "0"]) !!}
	    {!! Form::label("note", "Note") !!}
	    {!! Form::text("note", null, ["class" => "form-control", "placeholder" => "note"]) !!}
	    {!! Form::label("tipe", "Tipe Acara") !!}
	    {!! Form::select('tipe', $tipe) !!}
			<br>
	    	<button href="#" class="waves-effect waves-red btn modal-action modal-close" onclick="saveForm();"><i class="mdi-content-send"></i> Save</button>
    {!! Form::close() !!}
</ul>
@endsection