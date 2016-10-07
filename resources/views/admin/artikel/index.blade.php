@extends('layouts.admin')
@section('content')
<?php $no =1;?>
<ul id="task-card" class="collection with-header">
	<li class="collection-header cyan">
		<h4 class="task-card-title">Artikel</h4>
    	<p class="task-card-date">Manage Artikel</p>
    </li>
    <a href="{{url('admin/artikel/create')}}" class="task-add modal-trigger btn-floating waves-effect waves-light"><i class="mdi-content-add"></i></a>
    <li>
    	<table style="margin: 10px;">
    		<thead>
    			<th>No</th>
    			<th>Judul</th>
                <th>Create At</th>
                <th>Update At</th>
                <th>Aksi</th>
    		</thead>
    		<tbody>
            @foreach($art as $arts)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$arts->judul}}</td>
                    <td>{{$arts->created_at}}</td>
                    <td>{{$arts->updated_at}}</td>
                    <td>
                    {!! Form::open(array('url' => 'admin/artikel/' . $arts->id,'class' => 'pull-right')) !!}
                    <a href="{{url('admin/artikel/'.$arts->id)}}" class="btn">Lihat</a> <a href="{{url('admin/artikel/'.$arts->id.'/edit')}}" class="btn">Edit</a>
                        {!! Form::submit('Hapus', array('class' => 'btn')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
    		</tbody>
    	</table>
    </li>
</ul>
@endsection