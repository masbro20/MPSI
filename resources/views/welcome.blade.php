@extends('layouts.home')
@section('content')
<?php ?>
<style type="text/css">
	.nopadd{
		padding-top: 0px !important;
		margin-top: 0px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col l3 m3 s3">
			<ul id="task-card" class="collection with-header">
				<li class="collection-header">
					<h5 class="task-card-title">Berita</h5>
					<p class="task-card-date">Update Terbaru</p>
				</li>
				<li class="licent">
					<table class="">
						@forelse($art as $arts)
						 <tr >
						 	<td class="nopadd"><strong><a href="{{url('/artikel/'.$arts->id)}}">{{$arts->judul}}</a></strong>
						 		<?php
						 			$time = strtotime($arts->created_at);
						 		?>
								<p style="margin: 0;">{{date('l M j, Y h:m:s',$time)}}</p>
						 	</td>
						</tr>
						@empty
						<tr>
							<td>
								<td><strong>Belum ada berita</strong></td>
							</td>
						</tr>
						@endforelse
					</table>
					<a href="#" class="right" style="padding-top: 0px !important;padding-bottom: 10px;">More..</a>
				</li>
			</ul>
		</div>
		<div class="col l9 m9 s9">
			<ul id="task-card" class="collection with-header">
				<li class="collection-header">
					<h5 class="task-card-title">Job</h5>
					<p class="task-card-date">List of Job</p>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection