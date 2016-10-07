@extends('layouts.admin')
@section('content')
<?php $no =1;?>
<ul id="task-card" class="collection with-header">
	<li class="collection-header cyan">
		<h4 class="task-card-title">Seminar</h4>
    </li>
    <a href="{{url('admin/seminar/create')}}" class="task-add modal-trigger btn-floating waves-effect waves-light"><i class="mdi-content-add"></i></a>
    <li>
    	<table style="margin: 10px;">
    		<thead>
    			<th>Judul</th>
    			<th>Tanggal Seminar</th>
    		</thead>
    		<tbody>
            @foreach ($sem as $sems)
              <tr>
                    <td>{{$no++}}</td>
                    <td>{{$sems->judul}}</td>
                    <td>{{$sems->tgl}}</td>
                    <td>{{$sems->created_at}}</td>
                    <td>{{$sems->updated_at}}</td>
                    <td><a href="{{url('admin/seminar/'.$sems->id)}}" class="btn">Lihat</a> <a href="{{url('admin/seminar/'.$sems->id.'/edit')}}" class="btn">Edit</a> <a href="" class="btn">Hapus</a></td>
                </tr>
            @endforeach
    		</tbody>
    	</table>
    </li>
</ul>
@endsection