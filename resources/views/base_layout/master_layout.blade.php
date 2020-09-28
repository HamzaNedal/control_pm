
<!DOCTYPE html>

<html lang="en">

<head>
  @include('base_layout.header._meta_header')

</head>

<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
@include('base_layout.header._header')
@push('css')

@endpush
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
     @include('base_layout.nav')
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			@yield('content')
		</div>
	</div>
	<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
 @include('base_layout.footer._footer')
<!-- END FOOTER -->
@include('base_layout._script')
@stack('js')

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
