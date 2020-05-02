<!doctype html>
<html lang="en">

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
        {{-- <!-- NAVBAR --> --}}
        @include('includes.navbar')
		
        <!-- END NAVBAR -->
        

        {{-- <!-- LEFT SIDEBAR --> --}}
        @include('includes.sidebar')
		
        <!-- END LEFT SIDEBAR -->
        

		<!-- MAIN -->
		<div class="main">
            {{-- <!-- MAIN CONTENT --> --}}

            {{-- jika bagian mau di isi maka menggunakan yield --}}
            @yield('content')
			
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			@include('includes.footer')
		</footer>
	</div>
    <!-- END WRAPPER -->
    
    {{-- <!-- Javascript --> --}}
    @stack('before-script') {{-- digunakan untuk memanggil hanya beberapa baris supaya tidak ketimpa semua --}}
    @include('includes.script')
    @stack('after-script')
	
</body>

</html>
