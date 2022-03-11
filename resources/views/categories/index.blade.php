@extends('layouts.main')

@section('title', $cat->title)

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/categories.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
@endsection

@section('custom_js')
    <script>
        $(document).ready(function() {
            $('.product_sorting_btn').click(function(){
                let orderBy = $(this).data('order');

                $.ajax({
                    url: "{{route('showCategory', $cat->alias)}}",
                    type: 'GET',
                    data: {
                        orderBy: orderBy
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.product_grid').html(data);
                        // $('.product_grid').isotope('desctroy');
                        // $('.product_grid').imagesLoaded(function() {
                        //     var grid = $('.product_grid').isotope({
                        //         itemSelector: '.product',
                        //         layoutMode: 'fitRows',
                        //         fitRows:
                        //         {
                        //             gutter: 30
                        //         },
                        //     });
                        // });
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/5.0.0/imagesloaded.pkgd.min.js" integrity="sha512-kfs3Dt9u9YcOiIt4rNcPUzdyNNO9sVGQPiZsub7ywg6lRW5KuK1m145ImrFHe3LMWXHndoKo2YRXWy8rnOcSKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/categories.js"></script>
@endsection

@section('content')
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(/images/categories.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">{{$cat->title}}<span>.</span></div>
								<div class="home_text"><p>{{$cat->description}}</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
						<div class="results">Showing <span>{{$cat->products->count()}}</span> results</div>
						<div class="sorting_container ml-md-auto">
							<div class="sorting">
								<ul class="item_sorting">
									<li>
										<span class="sorting_text">Sort by</span>
										<i class="fa fa-chevron-down" aria-hidden="true"></i>
										<ul>
											<li class="product_sorting_btn" data-order="default" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
											<li class="product_sorting_btn" data-order="price-low-high" data-isotope-option='{ "sortBy": "price" }'><span>Price: Low-High</span></li>
											<li class="product_sorting_btn" data-order="price-high-low" data-isotope-option='{ "sortBy": "price" }'><span>Price: High-Low</span></li>
											<li class="product_sorting_btn" data-order="name-a-z" data-isotope-option='{ "sortBy": "stars" }'><span>Name: A-Z</span></li>
											<li class="product_sorting_btn" data-order="name-z-a" data-isotope-option='{ "sortBy": "stars" }'><span>Name: Z-A</span></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">

						<!-- Product -->
						
						@foreach($products as $product)
							@php
								$image = '';
								if(count($product->images) > 0) {
									$image = $product->images[0]['img'];
								} else {
									$image = 'no-image.png';
								}
							@endphp
							<!-- Product -->
							<div class="product">
								<div class="product_image"><img src="images/{{$image}}" alt=""></div>
								<div class="product_extra product_sale"><a href="{{route('showCategory', $product->category['alias'])}}">{{$product->category['title']}}</a></div>
								<div class="product_content">
									<div class="product_title"><a href="{{route('showProduct', ['category', $product->id])}}">{{$product->title}}</a></div>
									@if($product->new_price)
									<div class="product_price" style="text-decoration:line-through;color:red">${{$product->price}}</div>
									<div class="product_price">${{$product->new_price}}</div>
									@else
									<div class="product_price">${{$product->price}}</div>
									@endif
								</div>
							</div>
						@endforeach

					</div>
					<div class="product_pagination">
						<ul>
							<li class="active"><a href="#">01.</a></li>
							<li><a href="#">02.</a></li>
							<li><a href="#">03.</a></li>
						</ul>
					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Free Shipping Worldwide</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Free Returns</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">24h Fast Support</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
						<div class="newsletter_title">Subscribe to our newsletter</div>
						<div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required">
								<button class="newsletter_button trans_200"><span>Subscribe</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection