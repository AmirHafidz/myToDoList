@extends('layout.app')

@include('dashboard.modal.feedback')

@include('dashboard.modal.view_feedback')

@include('dashboard.edit_task')

@include('dashboard.navbar')

@include('dashboard.task-view.delay_task')

@if (\Session::has('login_failed'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('login_failed') !!}</li>
        </ul>
    </div>
@endif

    <div class="min-height:100vh; display:flex; flex-direction:column; 
    justify-content:space-between;">
        @include('dashboard.hero')
        @include('dashboard.footer')
    </div>


<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    AOS.init();
</script>

<script>
    // $(document).ready(function () {
    //     $('.select_importance_level').select2();
    //     $('.select_status_task').select2();
    // });

    $('.btnTaskCategory').on('click', function () {
        const category_id = $(this).val();
        const user_id = {{$user->id}};
        // console.log(category_id);
        var route = 'http://todolist.test/api/show-task-by-category/'+user_id+'/'+category_id;
        $.ajax({
            type: "get",
            url: route,
            data: {
                _token: '{{csrf_token()}}',
            },
            success: function (response) {
                // console.log(response.tasks[0].todo_level.id);
                $('#task_content').html('');
                if(response.tasks.length == 0){
                    $('#task_content').html(`@include("dashboard.task-view.no_data")`);
                }else{
                    response.tasks.forEach(element => {
                        $('#task_content').append( '<div class="accordion accordion-flush shadow mb-2 bg-body-tertiary rounded" id="accordionFlushExample">\
                    <div class="accordion-item ">\
                        <h2 class="accordion-header" id="flush-heading'+element.id+'">\
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'+element.id+'" aria-expanded="false" aria-controls="flush-collapse'+element.id+'">\
                                <h5 class="fw-light my-third-font">'+element.name+'</h5>\
                            </button>\
                        </h2>\
                        <div id="flush-collapse'+element.id+'" class="accordion-collapse collapse my-secondary-font" aria-labelledby="flush-heading'+element.id+'" data-bs-parent="#accordionFlushExample">\
                            <div class="accordion-body">\
                                <div class="col-md-12">\
                                    <div class="d-flex justify-content-between align-items-center">\
                                        <div class=">\
                                            <h6 class="fw-bold my-third-font">'+element.todo_list_detail.name+'</h6>\
                                        </div>\
                                        <div class="">\
                                            <div class="btn-group">\
                                            <button class="btn btn-light btn-sm my-third-font" type="button">\
                                              Actions\
                                            </button>\
                                            <button type="button" class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">\
                                              <span class="visually-hidden">Toggle Dropdown</span>\
                                            </button>\
                                            <ul class="dropdown-menu">\
                                              <li class="dropdown-item d-flex justify-content-between align-items-center task_done" value="3" task_id="'+element.id+'">\
                                                <a class="nav-link">\
                                                  <span class="my-third-font">Done</span>\
                                                  <i class="fa-solid fa-square-check text-success"></i>\
                                                </a>\
                                              </li>\
                                              <li class="dropdown-item d-flex justify-content-between align-items-center task_done" value="4" task_id="'+element.id+'">\
                                                <a class="nav-link" value="'+element.id+'"">\
                                                  <span class="my-third-font">Cancel</span>\
                                                  <i class="fa-solid fa-square-xmark text-danger"></i>\
                                                </a>\
                                              </li>\
                                            </ul>\
                                            <button class="btn btn-light btn-sm my-third-font">Delay</button>\
                                            <button class="btn btn-light btn-sm my-third-font">Delete</button>\
                                            <button class="btn btn-light btn-sm my-third-font button_edit_task" data-bs-toggle="modal" data-bs-target="#edit_task_Modal" id="" value="'+element.id+'">Edit</button>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="row d-flex justify-content-between align-items-center my-3">\
                                    <div class="w-auto row">\
                                        <div class="hstack gap-3">\
                                            <span class="badge bg-warning text-dark w-auto my-third-font">'+element.todo_status.name+'</span>\
                                            <div class="vr"></div>\
                                        </div>\
                                    </div>\
                                    <div class="row d-flex justify-content-end w-auto">\
                                        <span class="w-auto my-third-font">'+element.todo_list_detail.date_started+'</span>\
                                        <span class="w-auto">until</span>\
                                        <span class="w-auto my-third-font">'+element.todo_list_detail.date_started+'</span>\
                                    </div>\
                                </div>\
                                <div class="row d-flex justify-content-between align-items-center">\
                                    <div class="container border-dark">\
                                    <u class="my-third-font">\
                                        '+element.todo_list_detail.description_one+'\
                                    </u>\
                                    <br>\
                                    <u class="my-third-font">\
                                        '+element.todo_list_detail.description_two+'\
                                    </u>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>');
                    });
                }
                

            }
        });
    });

    $(document).on('click','.button_edit_task', function () {

        const task_id = $(this).val();

        var route = 'http://todolist.test/api/edit-task/'+task_id;
        $.ajax({
            type: "get",
            url: route,
            data: {
                _token:'{{csrf_token()}}',
            },
            success: function (response) {
                $('#edit_task_id').val(task_id);
                $('#edit_task_user_id').val(response.task.user_id);
                $('#edit_task_main_title').val(response.task.name);
                $('#edit_task_sub_title').val(response.task.todo_list_detail.name);
                $('#edit_task_date_start').val(response.task.todo_list_detail.date_started);
                $('#edit_task_date_end').val(response.task.todo_list_detail.date_end);
                $('#edit_task_time_start').val(response.task.todo_list_detail.time_start);
                $('#edit_task_time_end').val(response.task.todo_list_detail.time_end);
                $('#edit_task_description_one').val(response.task.todo_list_detail.description_one);
                $('#edit_task_description_two').val(response.task.todo_list_detail.description_two);
                $('#edit_task_level').val(response.task.todo_level.id);
                $('#edit_task_status').val(response.task.todo_status.name);
                $('#edit_task_category').val(response.task.todo_category.id);

            }
        });
    });

    $(document).on('submit','#edit_task_form', function () {
        const edit_task_id = $('#task_user_id').val();
        const fd = new FormData(this);
        var update_route = 'http://todolist.test/api/update-task/'+edit_task_id;
        $.ajax({
            type: "post",
            url: update_route,
            data: fd,
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {
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
                title: response.message
                })

                $('#edit_task_form')[0].reset();
                $('#edit_task_Modal').modal('hide');
            }
        });
    });

    $(document).on('click','.button_delete_task', function () {
        const task_id = $(this).val();
        Swal.fire({
                title: 'Are you sure you want to delete this task?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "http://todolist.test/api/delete-task/"+task_id,
                        data: {
                            _token: '{{csrf_token()}}'
                        },
                        success: function (response) {
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
                            title: 'Deleted Successfully'
                            })
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
        })
    });

    $('#select_task_status').change(function (e) { 
        e.preventDefault();
        // console.log($(this).val());
        const task_status_id = $(this).val();
        const user_id = {{$user->id}};
        var route = 'http://todolist.test/api/show-task-by-status/'+user_id+'/'+task_status_id;
        $.ajax({
            type: "get",
            url: route,
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function (response) {
                $('#task_content').html('');
                if(response.tasks.length == 0){
                    $('#task_content').html(`@include("dashboard.task-view.no_data")`);
                }
                else{
                    response.tasks.forEach(element => {
                        $('#task_content').append( '<div class="accordion accordion-flush" id="accordionFlushExample">\
                    <div class="accordion-item shadow mb-2 bg-body-tertiary rounded">\
                        <h2 class="accordion-header" id="flush-heading'+element.id+'">\
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'+element.id+'" aria-expanded="false" aria-controls="flush-collapse'+element.id+'">\
                                <h5 class="fw-light my-third-font">'+element.name+'</h5>\
                            </button>\
                        </h2>\
                        <div id="flush-collapse'+element.id+'" class="accordion-collapse collapse my-secondary-font" aria-labelledby="flush-heading'+element.id+'" data-bs-parent="#accordionFlushExample">\
                            <div class="accordion-body">\
                                <div class="col-md-12">\
                                    <div class="d-flex justify-content-between align-items-center">\
                                        <div class=">\
                                            <h6 class="fw-bold my-third-font">'+element.todo_list_detail.name+'</h6>\
                                        </div>\
                                        <div class="">\
                                            <div class="btn-group">\
                                            <button class="btn btn-light btn-sm my-third-font" type="button">\
                                              Actions\
                                            </button>\
                                            <button type="button" class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">\
                                              <span class="visually-hidden">Toggle Dropdown</span>\
                                            </button>\
                                            <ul class="dropdown-menu">\
                                              <li class="dropdown-item d-flex justify-content-between align-items-center task_done" value="3" task_id="'+element.id+'">\
                                                <a class="nav-link">\
                                                  <span class="my-third-font">Done</span>\
                                                  <i class="fa-solid fa-square-check text-success"></i>\
                                                </a>\
                                              </li>\
                                              <li class="dropdown-item d-flex justify-content-between align-items-center task_done" value="4" task_id="'+element.id+'">\
                                                <a class="nav-link" value="'+element.id+'"">\
                                                  <span class="my-third-font">Cancel</span>\
                                                  <i class="fa-solid fa-square-xmark text-danger"></i>\
                                                </a>\
                                              </li>\
                                            </ul>\
                                            <button class="btn btn-light btn-sm my-third-font">Delay</button>\
                                            <button class="btn btn-light btn-sm my-third-font">Delete</button>\
                                            <button class="btn btn-light btn-sm my-third-font button_edit_task" data-bs-toggle="modal" data-bs-target="#edit_task_Modal" id="" value="'+element.id+'">Edit</button>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="row d-flex justify-content-between align-items-center my-3">\
                                    <div class="w-auto row">\
                                        <div class="hstack gap-3">\
                                            <span class="badge bg-warning text-dark w-auto my-third-font">'+element.todo_status.name+'</span>\
                                            <div class="vr"></div>\
                                        </div>\
                                    </div>\
                                    <div class="row d-flex justify-content-end w-auto">\
                                        <span class="w-auto my-third-font">'+element.todo_list_detail.date_started+'</span>\
                                        <span class="w-auto">until</span>\
                                        <span class="w-auto my-third-font">'+element.todo_list_detail.date_started+'</span>\
                                    </div>\
                                </div>\
                                <div class="row d-flex justify-content-between align-items-center">\
                                    <div class="container border-dark">\
                                    <u class="my-third-font">\
                                        '+element.todo_list_detail.description_one+'\
                                    </u>\
                                    <br>\
                                    <u class="my-third-font">\
                                        '+element.todo_list_detail.description_two+'\
                                    </u>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>');
                    });
                }
            }
        });
    });

    $(document).ready(function () {
        
        $(document).on('click','.task_done', function () {
            const task_id = $(this).attr('task_id');
            const done_task = $(this).val();
            const user_id = {{$user->id}};
            var route = 'http://todolist.test/api/done-status/'+user_id+'/'+task_id+'/'+done_task;

            if(done_task == "3"){
                Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you have done it?",
                // icon: 'warning',
                // imageUrl: 'https://unsplash.it/400/200',
                imageUrl: '{{asset("images/wow.jpg")}}',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, I have done!'
                }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: route,
                            data: {
                                _token:'{{csrf_token()}}',
                            },
                            success: function (response) {
                                Swal.fire(
                                'Congratz !',
                                response.message,
                                'success'
                                )
                            }
                        });
                    }
                })
            }
            else{
                Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to cancel it?",
                // icon: 'warning',
                // imageUrl: 'https://unsplash.it/400/200',
                imageUrl: '{{asset("images/sad.jfif")}}',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
                }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: route,
                            data: {
                                _token:'{{csrf_token()}}',
                            },
                            success: function (response) {
                                Swal.fire(
                                'Done !',
                                response.message,
                                'success'
                                )
                            }
                        });
                    }
                })
            }
        });
    });

    $(document).on('click','.button_delay_task', function () {
        const task_id = $(this).val();
        

    });

    $(document).ready(function () {
        $(document).ready(function () {
            $('.button_delay_task').on('click', function () {
                const user_id = {{$user->id}};
                const task_id = $(this).val();
                // var route = 'http://todolist.test/api/view_datetime_task/{date_start?}';
                var route = 'http://todolist.test/api/fetch_datetime_task/'+task_id;
                $.ajax({
                    type: "get",
                    url: route,
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        // console.log(response.task[0].date_started)
                        $('#delay_task_id').val(task_id);
                        $('#delay_start_date').val(response.task[0].date_started);
                        $('#delay_end_date').val(response.task[0].date_end);
                        $('#delay_start_time').val(response.task[0].time_start);
                        $('#delay_end_time').val(response.task[0].time_end);
                    }
                });
            });
            $('#delay_task_Modal').submit(function (e) { 
                e.preventDefault();
                var route = 'http://todolist.test/api/delay_datetime_task';
                const task_id = $('#delay_task_id').val();
                const date_started = $('#delay_start_date').val();
                const date_end = $('#delay_end_date').val();
                const time_start = $('#delay_start_time').val();
                const time_end = $('#delay_end_time').val();
                const delay_data = {
                    'date_started': $('#delay_start_date').val(),
                    'date_end' : $('#delay_end_date').val(),
                    'time_start' : $('#delay_start_time').val(),
                    'time_end' : $('#delay_end_time').val(),
                };
                $.ajax({
                    type: "post",
                    url: route,
                    data: {
                        delay_data,
                        task_id,
                    },
                    dataType: 'json',
                    // cache:false,
                    // contentType:'application/json',
                    // processData:false,
                    success: function (response) {

                        if(response.isChange == true){
                            swal.fire('Success!',response.message,'success');
                        }else{
                            swal.fire('Success!',response.message,'info');
                        }

                        $('#delay_task_form')[0].reset();
                        $('#delay_task_Modal').modal('hide');
                    }
                });
            });
        });
    });

    $(document).ready(function () {
        $(document).ready(function () {
            $('#select_importance_level').change(function (e) { 
                e.preventDefault();
                const task_level = $(this).val();
                const user_id = {{$user->id}}
                var route = 'http://todolist.test/api/fetch-task-by-level/'+user_id+'/'+task_level;
                $.ajax({
                    type: "get",
                    url: route,
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        $('#task_content').html('');
                        if(response.tasks.length == 0){
                            $('#task_content').html(`@include("dashboard.task-view.no_data")`);
                        }else{
                            response.tasks.forEach(element => {
                            $('#task_content').append( '<div class="accordion accordion-flush shadow mb-2 bg-body-tertiary rounded" id="accordionFlushExample">\
                        <div class="accordion-item ">\
                            <h2 class="accordion-header" id="flush-heading'+element.id+'">\
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'+element.id+'" aria-expanded="false" aria-controls="flush-collapse'+element.id+'">\
                                    <h5 class="fw-light my-third-font">'+element.name+'</h5>\
                                </button>\
                            </h2>\
                            <div id="flush-collapse'+element.id+'" class="accordion-collapse collapse my-secondary-font" aria-labelledby="flush-heading'+element.id+'" data-bs-parent="#accordionFlushExample">\
                                <div class="accordion-body">\
                                    <div class="col-md-12">\
                                        <div class="d-flex justify-content-between align-items-center">\
                                            <div class=">\
                                                <h6 class="fw-bold my-third-font">'+element.todo_list_detail.name+'</h6>\
                                            </div>\
                                            <div class="">\
                                                <div class="btn-group">\
                                                <button class="btn btn-light btn-sm my-third-font" type="button">\
                                                  Actions\
                                                </button>\
                                                <button type="button" class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">\
                                                  <span class="visually-hidden">Toggle Dropdown</span>\
                                                </button>\
                                                <ul class="dropdown-menu">\
                                                  <li class="dropdown-item d-flex justify-content-between align-items-center task_done" value="3" task_id="'+element.id+'">\
                                                    <a class="nav-link">\
                                                      <span class="my-third-font">Done</span>\
                                                      <i class="fa-solid fa-square-check text-success"></i>\
                                                    </a>\
                                                  </li>\
                                                  <li class="dropdown-item d-flex justify-content-between align-items-center task_done" value="4" task_id="'+element.id+'">\
                                                    <a class="nav-link" value="'+element.id+'"">\
                                                      <span class="my-third-font">Cancel</span>\
                                                      <i class="fa-solid fa-square-xmark text-danger"></i>\
                                                    </a>\
                                                  </li>\
                                                </ul>\
                                                <button class="btn btn-light btn-sm my-third-font">Delay</button>\
                                                <button class="btn btn-light btn-sm my-third-font">Delete</button>\
                                                <button class="btn btn-light btn-sm my-third-font button_edit_task" data-bs-toggle="modal" data-bs-target="#edit_task_Modal" id="" value="'+element.id+'">Edit</button>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="row d-flex justify-content-between align-items-center my-3">\
                                        <div class="w-auto row">\
                                            <div class="hstack gap-3">\
                                                <span class="badge bg-warning text-dark w-auto my-third-font">'+element.todo_status.name+'</span>\
                                                <div class="vr"></div>\
                                            </div>\
                                        </div>\
                                        <div class="row d-flex justify-content-end w-auto">\
                                            <span class="w-auto my-third-font">'+element.todo_list_detail.date_started+'</span>\
                                            <span class="w-auto">until</span>\
                                            <span class="w-auto my-third-font">'+element.todo_list_detail.date_started+'</span>\
                                        </div>\
                                    </div>\
                                    <div class="row d-flex justify-content-between align-items-center">\
                                        <div class="container border-dark">\
                                        <u class="my-third-font">\
                                            '+element.todo_list_detail.description_one+'\
                                        </u>\
                                        <br>\
                                        <u class="my-third-font">\
                                            '+element.todo_list_detail.description_two+'\
                                        </u>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>');
                        });
                        }




                    }
                });
            });
        });
    });

    $(document).ready(function () {
        $(document).ready(function () {
            $('#sort_task').change(function (e) { 
                e.preventDefault();
                const sort_id = $(this).val();
                const user_id = {{$user->id}};
                var route = 'http://todolist.test/api/sort-by-task/'+user_id+'/'+sort_id;
                $.ajax({
                    type: "get",
                    url: route,
                    data: {
                        sort_id:sort_id,
                        _token:'{{csrf_token()}}'
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response.tasks[0]);
                        $('#task_content').html('');
                        response.tasks.forEach(element => {
                        $('#task_content').append( '<div class="accordion accordion-flush" id="accordionFlushExample">\
                    <div class="accordion-item shadow mb-2 bg-body-tertiary rounded">\
                        <h2 class="accordion-header" id="flush-heading'+element.id+'">\
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'+element.id+'" aria-expanded="false" aria-controls="flush-collapse'+element.id+'">\
                                <h5 class="fw-light my-third-font">'+element.name+'</h5>\
                            </button>\
                        </h2>\
                        <div id="flush-collapse'+element.id+'" class="accordion-collapse collapse my-secondary-font" aria-labelledby="flush-heading'+element.id+'" data-bs-parent="#accordionFlushExample">\
                            <div class="accordion-body">\
                                <div class="col-md-12">\
                                    <div class="d-flex justify-content-between align-items-center">\
                                        <div class=">\
                                            <h6 class="fw-bold my-third-font">'+element.todo_list_detail.name+'</h6>\
                                        </div>\
                                        <div class="">\
                                            <div class="btn-group">\
                                            <button class="btn btn-light btn-sm my-third-font" type="button">\
                                              Actions\
                                            </button>\
                                            <button type="button" class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">\
                                              <span class="visually-hidden">Toggle Dropdown</span>\
                                            </button>\
                                            <ul class="dropdown-menu">\
                                              <li class="dropdown-item d-flex justify-content-between align-items-center task_done" value="3" task_id="'+element.id+'">\
                                                <a class="nav-link">\
                                                  <span class="my-third-font">Done</span>\
                                                  <i class="fa-solid fa-square-check text-success"></i>\
                                                </a>\
                                              </li>\
                                              <li class="dropdown-item d-flex justify-content-between align-items-center task_done" value="4" task_id="'+element.id+'">\
                                                <a class="nav-link" value="'+element.id+'"">\
                                                  <span class="my-third-font">Cancel</span>\
                                                  <i class="fa-solid fa-square-xmark text-danger"></i>\
                                                </a>\
                                              </li>\
                                            </ul>\
                                            <button class="btn btn-light btn-sm my-third-font">Delay</button>\
                                            <button class="btn btn-light btn-sm my-third-font">Delete</button>\
                                            <button class="btn btn-light btn-sm my-third-font button_edit_task" data-bs-toggle="modal" data-bs-target="#edit_task_Modal" id="" value="'+element.id+'">Edit</button>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="row d-flex justify-content-between align-items-center my-3">\
                                    <div class="w-auto row">\
                                        <div class="hstack gap-3">\
                                            <span class="badge bg-warning text-dark w-auto my-third-font">'+element.todo_status.name+'</span>\
                                            <div class="vr"></div>\
                                        </div>\
                                    </div>\
                                    <div class="row d-flex justify-content-end w-auto">\
                                        <span class="w-auto my-third-font">'+element.todo_list_detail.date_started+'</span>\
                                        <span class="w-auto">until</span>\
                                        <span class="w-auto my-third-font">'+element.todo_list_detail.date_end+'</span>\
                                    </div>\
                                </div>\
                                <div class="row d-flex justify-content-between align-items-center">\
                                    <div class="container border-dark">\
                                    <u class="my-third-font">\
                                        '+element.todo_list_detail.description_one+'\
                                    </u>\
                                    <br>\
                                    <u class="my-third-font">\
                                        '+element.todo_list_detail.description_two+'\
                                    </u>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>');
                    });
                    }
                });
            });
        });
    });

    $('#feedback_ux').change(function (e) { 
        e.preventDefault();
        $('#point_feedback_ux').html($(this).val()+'%');
    });

    $('#feedback_ui').change(function (e) { 
        e.preventDefault();
        $('#point_feedback_ui').html($(this).val()+'%');
    });

    $('#feedback_functionality').change(function (e) { 
        e.preventDefault();
        $('#point_feedback_functionality').html($(this).val()+'%');
    });

    $('.notification_read').change(function (e) {

        e.preventDefault();
        let n_id = $(this).attr('notification_id');
        $(this).attr('disabled', true);
        $('#notification_'+n_id).removeClass('bg-secondary');
        $('#notification_'+n_id).removeClass('text-white');
        $('#notification_'+n_id).addClass('text-dark');
        $('#notification_'+n_id).append('<span class="text-secondary"><i> (read)</i></span>');

        $.ajax({
            type: "post",
            url: "{{route('notificaiton.mark_as_read')}}",
            data: {
                _token: '{{csrf_token()}}',
                id: n_id,
            },
            success: function (response) {
                
            }
        });
        
    });

    $('#feedback_form').submit(function (e) { 
        e.preventDefault();
        $user_id = {{$user->id}};
        const fd = new FormData(this);
        var route = 'http://todolist.test/api/send-feedback/'+$user_id;
        var error_text = '';
        
        $.ajax({
            type: "post",
            url: route,
            data: fd,
            dataType: "json",
            contentType:false,
            cache:false,
            processData:false,
            success: function (response) {
                if(response.status == 422){
                    response.error.forEach(element => {
                        error_text = error_text+element+'<br>';
                    });
                    swal.fire('Fail',error_text,'error')
                }
                else if(response.status == 200){
                    swal.fire('Success',response.message,'success');
                    $('#feedback_form')[0].reset();
                    $('#send_feedback_Modal').modal('hide');
                }
            }
        });
    });

    $('.notification_li').on('click', function () {
        var feedback_id = $(this).attr('feedback_id');
        const user_id = {{$user->id}};
        var route = 'http://todolist.test/api/fetch-notification/'+user_id+'/'+feedback_id;
        $.ajax({
            type: "get",
            url: route,
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function (response) {
                $('#view_feedback_title').val(response.feedback.id);
                $('#view_feedback_comment').val(response.feedback.comment);
                $('#view_feedback_ux').val(response.feedback.feedback_ux);
                $('#view_feedback_ui').val(response.feedback.feedback_ui);
                $('#view_feedback_functionality').val(response.feedback.feedback_functionality);
                $('#view_point_feedback_ux').html(response.feedback.feedback_ux);
                $('#view_point_feedback_ui').html(response.feedback.feedback_ui);
                $('#view_point_feedback_functionality').html(response.feedback.feedback_functionality);
            }
        });
    });

</script>

