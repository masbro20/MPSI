@extends('layouts.admin')
@section('content')
<style type="text/css">
.myFrame{
    border: none;
    height: 100vh;
    width: 100%;
}
</style>
<ul id="task-card" class="collection with-header" style="background: #fff; margin-top: -10px;">
	<li class="collection-header with white">
		<h3><strong>{{$art->judul}}</strong></h3>
    	<p>Oleh Admin Tanggal {{$art->created_at}}</p>
    </li>
    <li style="margin: 20px;height: 100%;">
    	<iframe src="{{url('/getartikel/'.$art->id)}}" class="myFrame">
    	</iframe>
    </li>
</ul>
@endsection