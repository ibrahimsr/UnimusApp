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

		
                        
                        {{-- <!-- MAIN CONTENT --> --}}

                        {{-- jika bagian mau di isi maka menggunakan yield --}}
                        @yield('content')
                        
                        <!-- END MAIN CONTENT -->

					
	</div>
	<!-- END WRAPPER -->
</body>

</html>
