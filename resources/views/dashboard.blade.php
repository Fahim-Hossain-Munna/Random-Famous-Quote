@extends("layouts.backendmaster")

@section('content')


<h1>
    <marquee class="text-success"> Wellcome <span class="text-danger">" {{auth()->user()->name}} "</span> Have a Nice Exprience. </marquee>
</h1>

@endsection



@section("footer-script")

@if (session('entry_massege'))
<script>
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    Toast.fire({
    icon: 'success',
    title: "{{ session('entry_massege')}} {{ auth()->user()->name }}",
    })
</script>
@endif

@endsection


