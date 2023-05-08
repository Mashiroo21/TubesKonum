<!DOCTYPE html>
<html lang="en">

<head>
	@include('Partial.header')
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			@include('Partial.navbar')

            @include('Partial.sidebar')
		</nav>

		<div class="main">
			
			<main class="content">
				@yield('content')
			</main>

			<footer class="footer">
				@include('Partial.footer')
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>