@if (session()->has('flash_message'))
    <script>
        swal({
            title: "{{ session('flash_message.title') }}",
            html: "{{ session('flash_message.message') }}",
            type: "{{ session('flash_message.level') }}",
            timer: 2000,
            showConfirmButton: false
        }).done();
    </script>
@endif

@if (session()->has('flash_message_overlay'))
    <script>
        swal({
            title: "{{ session('flash_message.title') }}",
            html: "{{ session('flash_message.message') }}",
            type: "{{ session('flash_message.level') }}",
            confirmButtonText: 'Okay'
        }).done();
    </script>
@endif