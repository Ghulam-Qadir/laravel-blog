@include('layouts.header')
<div class="container mt-5">
	<div class="row">
		<div class="col-md-12">
			@yield('content')		
		</div>
	</div>
</div>
<!-- Optional JavaScript -->
@yield('scripts')
@include('layouts.footer')