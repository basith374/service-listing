@extends('layout')

@section('content')

	<div class="row">
		<div class="col-md-8">
			@if(Session::has('success'))
			<div class="alert alert-success">
				<i class="glyphicon glyphicon-ok"></i> {{ Session::get('success') }}
			</div>
			@endif
			@foreach($businesses as $business)
			<div class="listing listing__item" itemscope itemtype="http://schema.org/LocalBusiness">
				<figure>
					<img src="holder.js/100x100" itemprop="image">
				</figure>
				<div>
					<h2><a href="{{ url('/' . $business->locality->slug . '/' . $business->category->slug . '/' . $business->slug) }}" itemprop="name">{{ $business->name }}</a></h2>
					<p itemprop="description" class="desc">{{ $business->description }}</p>
					<div class="other_desc">
						<address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							Address : <span itemprop="streetAddress">{{ $business->street_address }}</span>, <span itemprop="addressLocality">{{ $business->locality->name }}</span>, <span itemprop="addressRegion">{{ $business->district->name }}</span><br>
							PIN : <span itemprop="postalCode">{{ $business->postcode }}</span>
						</address>
						<p>TEL : <span itemprop="telephone">{{ $business->telephone }}</span></p>
						<p>
							<span class="ratings">
							@for($i=1;$i<6;$i++)
							<span class="star-cover">
								<i class="glyphicon glyphicon-{{ $business->ratings >= $i ? 'star' : 'star-empty' }}"></i>
							</span>
							@endfor
							</span>
							<span itemprop="ratingValue">{{ $business->ratings or 0 }}</span>/
							<span itemprop="bestRating">5</span> stars from
							<span itemprop="reviewCount">{{ $business->reviews->count() }}</span> users.
						</p>
					</div>
				</div>
			</div>
			@endforeach
			<div>
				{!! $businesses->links() !!}
			</div>
		</div>
		<div class="col-md-4">
			<img src="holder.js/360x500">
		</div>
	</div>

@endsection