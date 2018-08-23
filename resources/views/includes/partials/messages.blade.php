@if (Session::get('success'))
    <script>
        swal({
            text: "{!! Session::get('success') !!}",
            title: "{!! trans('default.success') !!}",
            timer: 3000,
            type: "success",
            html: true
        });
    </script>
@elseif (Session::get('warning'))
    <script>
        swal({
            text: "{!! Session::get('warning') !!}",
            title: "{!! trans('default.warning') !!}",
            type: "warning",
            html: true
        });
    </script>
@elseif (Session::get('info'))
    <script>
        swal({
            text: "{!! Session::get('info') !!}",
            title: "{!! trans('default.info') !!}",
            timer: 3000,
            type: "info",
            html: true
        });
    </script>
@elseif (Session::get('danger'))
    <script>
        swal({
            text: "{!! Session::get('danger') !!}",
            title: "{!! trans('default.warning') !!}",
            timer: 3000,
            type: "danger",
            html: true
        });
    </script>
@elseif (Session::get('message'))
    <script>
        swal({
            text: "{!! Session::get('message') !!}",
            title: "{!! trans('default.info') !!}",
            timer: 3000,
            type: "danger",
            html: true
        });
    </script>
{{-- @else
    @foreach ($errors->all() as $error)
        {{ $message = $error }}
    @endforeach
    <script>
        swal({
            text: "{!! $message !!}",
            title: "{!! trans('default.warning') !!}",
            timer: 3000,
            type: "danger"
        });
    </script>--}}
@endif