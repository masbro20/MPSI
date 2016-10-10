@extends('layouts.admin')
@section('content')

<script type="text/javascript" src="{{ asset('asset/tinymce/tinymce.min.js') }}"></script>

<script type="text/javascript">
var jq = jQuery.noConflict(true);

jq(document).ready(function(){
  tinymce.init({ selector: "textarea",theme: "modern",height:"700",
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
     filemanager_title:"n_abedi Filemanager" ,
     external_plugins: { "filemanager" : "{{asset('asset/filemanager/plugin.min.js') }}"},
     entity_encoding : "raw" 
  });
});

function saveForm() {
	tinymce.triggerSave();
	jq('.artikel_form').submit();
}
</script>
<style type="text/css">
	.artikel_form{
		margin:20px;
	}
</style>
<ul id="task-card" class="collection with-header">
	<li class="collection-header">
		<h4 class="task-card-title">Tambah Artikel</h4>
    </li>
{!! Form::model($art, ['method' => 'PATCH','action' => ['ArtikelController@update', $art->id],'class' => 'artikel_form']) !!}
		{!! Form::label("judul", "Judul") !!}
		{!! Form::text("judul", null, ["class" => "form-control"]) !!}
		<br>
		{!! Form::textarea("body", null, ["class" => "form-control"]) !!}
		<br>
    	<button href="#" class="waves-effect waves-red btn modal-action modal-close" onclick="saveForm();"><i class="mdi-content-send"></i> Save</button>
    {!! Form::close() !!} 
</ul>
@endsection