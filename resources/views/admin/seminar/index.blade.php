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
                <th>NO</th>
    			<th>Judul</th>
                <th>Penyelenggara</th>
    			<th>Tanggal Seminar</th>
                <th>Kuota</th>
                <th>Aksi</th>
    		</thead>
    		<tbody>
            @foreach ($sem as $sems)
<<<<<<< HEAD
              <tr>
                    <td>{{$no++}}</td>
                    <td>{{$sems->judul}}</td>
                    <td>{{$sems->tgl}}</td>
                    <td>{{$sems->created_at}}</td>
                    <td>{{$sems->updated_at}}</td>
                    <td><a href="{{url('admin/seminar/'.$sems->id)}}" class="btn">Lihat</a> <a href="{{url('admin/seminar/'.$sems->id.'/edit')}}" class="btn">Edit</a> <a href="" class="btn">Hapus</a></td>
=======
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$sems->judul}}</td>
                    <td>{{$sems->penyelenggara}}</td>
                    <td>{{$sems->tgl}}</td>
                    <td>{{$sems->kuota}}</td>
<<<<<<< HEAD
                    <td><a href="{{url('/admin/seminar/'.$sems->id.'/edit')}}" class="btn">Edit</a> <a href="{{url('/admin/seminar/'.$sems->id)}}" class="btn">Show</a></td>
=======
                    <td><a href="{{url('/admin/seminar/'.$sems->id.'/edit')}}" class="btn">Edit</a></td>
>>>>>>> origin/master
>>>>>>> origin/master
                </tr>
            @endforeach
    		</tbody>
    	</table>
    </li>
</ul>
@endsection