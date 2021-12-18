@include('layouts.header')
<div class="container">
	<div class="row">
		<div class="col-md-12 mx-auto">
			@yield('content')		
		</div>
	</div>
</div>
@yield('scripts')
@include('layouts.footer')
