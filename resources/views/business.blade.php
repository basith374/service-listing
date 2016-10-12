@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-8">
		<div itemscope itemtype="http://schema.org/LocalBusiness">
			<div class="row">
				<div class="col-md-6">
					<div class="listing">
						<h1 itemprop="name">{{ $business->name }}</h1>
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
				<div class="col-md-6">
					<img src="holder.js/200x200">
				</div>
				<div class="col-md-12">

					<form class="review-form" method="POST" action="{{ url('/post-review') }}">
						<h3>Post review</h3>
						{{ csrf_field() }}
						<input type="hidden" name="facebook_id" value="asdasd">
						<input type="hidden" name="business_id" value="{{ $business->id }}">
						<div class="form-group">
							<label>Review</label>
							<textarea class="field" name="review" rows="5"></textarea>
						</div>
						<div class="form-group">
							<label>Rating</label>
							<span class="rating-buttons">
								<input type="hidden" name="rating" v-model="rating">
								<button type="button" v-on:click="setRating(i)" v-for="i in [1,2,3,4,5]"><i class="glyphicon" v-bind:class="rating >= i ? 'glyphicon-star' : 'glyphicon-star-empty'"></i></button>
							</span>
						</div>
						<div class="form-group">
							<button type="submit" class="button">Submit</button>
						</div>
					</form>
					<div class="reviews">
						<div>
							<h3>Reviews</h3>
							@forelse($business->reviews as $review)
							<div class="review-item">
								<img src="holder.js/50x50">
								<div>
									<h4>{{ $review->name }}</h4>
									<p>{{ $review->review }}</p>
									<div>
										<span class="ratings">
										@for($i=1;$i<6;$i++)
										<span class="star-cover">
											<i class="glyphicon glyphicon-{{ $review->rating >= $i ? 'star' : 'star-empty' }}"></i>
										</span>
										@endfor
										</span>
									</div>
								</div>
							</div>
							@empty
							<p>No reviews</p>
							@endforelse
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<img src="holder.js/360x500">
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('/js/vendor/vue.min.js') }}"></script>
<script>
	var vm = new Vue({
		el: 'body',
		data: function() {
			return {
				rating: 0
			}
		},
		methods: {
			setRating: function(rating) {
				this.rating = rating;

			}
		}
	})
</script>
@endsection
