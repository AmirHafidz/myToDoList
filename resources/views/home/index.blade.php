<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layout.app')

@include('home.navbar')

@if (\Session::has('login_failed'))
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
        icon: 'error',
        title: '{!! \Session::get('login_failed') !!}'
        })
    </script>
@endif


@include('home.hero')

@include('home.footer')
