@extends('layout.app')

@include('add_task.navbar')

<div class="container py-5">
    
    @include('add_task.breadcrumb')
    
    @include('add_task.hero')
    
</div>


@include('add_task.footer')

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#add_task_form').submit(function (e) {
        const fd = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "{{route('task.store')}}",
            data: fd,
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {
                Swal.fire('Success',response.message,'success');
            }
        });        
    });
</script>