@extends('layouts.admin')
@section('content')
<?php
$tipe=["1"=>"Seminar","2"=>"Training"];
?>
<ul id="task-card" class="collection with-header">
	<li class="collection-header cyan">
		<h4 class="task-card-title">Lihat Seminar</h4>
    </li>
	<li class="licent">
		<table class="striped">
			<tr>
				<td>Judul</td>
				<td>{{$sem->judul}}</td>
			</tr>
			<tr>
				<td>Tipe Kegiatan</td>
				<td>{{$tipe[$sem->tipe]}}</td>
			</tr>
			<tr>
				<td>Penyelenggara</td>
				<td>{{$sem->penyelenggara}}</td>
			</tr>
			<tr>
				<td>Tanggal Pelaksaan</td>
				<td>{{$sem->tgl}}</td>
			</tr>
			<tr>
				<td>Tempat</td>
				<td>{{$sem->tempat}}</td>
			</tr>
			<tr>
				<td>Jam Mulai</td>
				<td>{{$sem->start_time}}</td>
			</tr>
			<tr>
				<td>Jam Berakhir</td>
				<td>{{$sem->end_time}}</td>
			</tr>
			<tr>
				<td>Kuota</td>
				<td>{{$sem->kuota-$pendaftar}}</td>
			</tr>
			<tr>
				<td>Jumlah Pendaftar</td>
				<td>{{$pendaftar}}</td>
			</tr>
			<tr>
				<td>Biaya</td>
				<td>{{$sem->biaya}}</td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>{!!$sem->deskripsi!!}</td>
			</tr>
			<tr>
				<td>Note</td>
				<td>{{$sem->note}}</td>
			</tr>
		</table>
	</li>
</ul>
@endsection