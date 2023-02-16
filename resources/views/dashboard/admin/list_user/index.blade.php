@extends('layout.app')
@include('dashboard.admin.list_user.navbar')
<div class="container py-5" style="min-height: 100vh">
    @include('dashboard.admin.list_user.breadcrumb')
    @include('dashboard.admin.list_user.hero')
</div>
@include('dashboard.footer')

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('#table_list_user').DataTable({
            serverSide: true,
            processing: true,
            retrieve  : true,
            ajax:'{{route("admin.list_user")}}',
            columns:[
                {data:"id", name:"id"},
                {data:"name", name:"name"},
                {data:"email", name:"email"},
                {data:"actions", name:"actions",orderable:false,searchable:false},
            ]
        });
    });
</script>

<script src=""></script>