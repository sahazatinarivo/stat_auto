@extends ("../layout")

@section('content')
	<div class="container-fluid">
		@include ('content/page')
		<hr>
		<div class="mask_page_html">
			@if(isset($mask))
				@foreach($mask as $masks)
					<div class="container-fluid content-mask">
						{!! html_entity_decode($masks->html) !!}
						<input type="hidden" id="stock_slug_pers" value="{{ isset($pers) ? $pers : 0 }}">
					</div>
				@endforeach
			@endif
		</div>
		@include ('content/footer_page')
	</div>
@endsection

