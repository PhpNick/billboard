@if (session()->has('flash_message'))

<script>
	Swal.fire(
	  '{{ session('flash_message.title') }}',
	  '{{ session('flash_message.message') }}',
	  '{{ session('flash_message.level') }}'
	)	
</script>

@endif