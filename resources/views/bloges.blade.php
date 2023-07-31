@extends('layouts.app')

@section('content')



<section class="blog section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
				@if(!empty($bloges))
					@foreach($bloges as $item)
					<!-- Article 01 -->
					<article>
 						<div class="image">
							<img class="img-fluid img-fluid-edit" src="{{('/storage_upload/'.$item->image)}}" alt="article-01">
						</div>
 						<h3>  {{$item->title}}</h3>
 						<p> {!! $item->content !!}</p>
 						<div class="text-right date">
						<span>{{ date('d M Y', strtotime($item->created_at)) }}</span>
						</div>
					</article>
					@endforeach
				  @endif
				</div>
			</div>
		</div>
	</section>







@endsection
