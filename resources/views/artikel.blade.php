@extends('layouts.home')
@section('content')
<style type="text/css">
.myFrame{
    border: none;
    height: 100vh;
    width: 100%;
}
.collection-header{
	background-color: #fff !important;
}
</style>

<ul id="task-card" class="collection with-header" style="background: #fff; margin-top: -10px;">
	<li class="collection-header with">
		<?php $time = strtotime($art->updated_at); ?>
		<h3><strong>{{$art->judul}}</strong></h3>
    	<p>Oleh Admin {{date('l M j, Y h:m:s',$time)}}</p>
    </li>
    <li style="margin: 20px;height: 100%;">
    	<iframe src="{{url('/getartikel/'.$art->id)}}" class="myFrame">
    	</iframe>
    </li>
</ul>
@endsection