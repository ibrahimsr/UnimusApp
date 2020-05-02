<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	@include('includes.head')
	{{-- <!-- VENDOR CSS / Style --> --}}
    @stack('before-style') {{-- digunakan untuk memanggil hanya beberapa baris supaya tidak ketimpa semua --}}
    @include('includes.style')
    @stack('after-style')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">

		@include('includes.navlog')

		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
                        
                        {{-- <!-- MAIN CONTENT --> --}}

                        {{-- jika bagian mau di isi maka menggunakan yield --}}
                        @yield('content')
                        
                        <!-- END MAIN CONTENT -->

					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Free Bootstrap dashboard template</h1>
							<p>by The Develovers</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
