<section>
    <div class="card" data-aos="fade-left" data-aos-duration="1000" style="min-height: 100vh">
        {{-- <div class="card-header">
            Add Task <i class='bx bx-task bx-tada' ></i>
        </div> --}}
        <div class="card-body p-5 shadow p-3 mb-5 bg-body-tertiary rounded">
            <h3 class="my-secondary-font mb-3">
                <span>Add Task</span>
                <i class='bx bxs-timer bx-spin' ></i>
            </h3>
            <form action="" id="add_task_form" method="">
                @csrf
                <div class="row">
                    <input type="text" name="task_user_id" value="{{$user->id}}" hidden>
                    <!-- Task Category -->
                    <div class="col-sm-6">
                        <label for="task_category my-secondary-font" class="form-label">Category</label>
                        <select name="task_category" id="task_category" class="form-control">
                            <option value="1" class="my-secondary-font">School/Work</option>
                            <option value="2" class="my-secondary-font">Sports/Games</option>
                            <option value="3" class="my-secondary-font">Shopping</option>
                            <option value="4" class="my-secondary-font">Religions</option>
                            <option value="5" class="my-secondary-font">Socials</option>
                            <option value="6" class="my-secondary-font">Others</option>
                        </select>
                    </div>
                    <!-- Task Level -->
                    <div class="col-sm-3">
                        <label for="task_level" class="form-label my-secondary-font">Importance</label>
                        <input type="range" name="task_level" min="1" max="5" step="1" class="form-range mt-1" id="task_level"/>
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="form-label" style="visibility: hidden">c</label>
                        <div class="row" id="star_level">
                        </div>
                    </div>
                    <!-- Task Main Title -->
                    <div class="col-sm-6">
                        <label for="task_main_title" class="form-label my-secondary-font">Main Title</label>
                        <input type="text" class="form-control" id="task_main_title" name="task_main_title">
                    </div>
                    <!-- Task Date -->
                    <div class="col-sm-3">
                        <label for="task_date_start" class="form-label my-secondary-font">Date Started</label>
                        <input type="date" class="form-control" name="task_date_start" id="task_date_start">
                    </div>
                    <div class="col-sm-3">
                        <label for="task_date_end" class="form-label my-secondary-font">Date End</label>
                        <input type="date" class="form-control" name="task_date_end" id="task_date_end">
                    </div>
                    <!-- Task Sub Title -->
                    <div class="col-sm-6">
                        <label for="task_sub_title" class="form-label my-secondary-font">Sub Title</label>
                        <input type="text" class="form-control" id="task_sub_title" name="task_sub_title">
                    </div>
                    <!-- Task Time -->
                    <div class="col-sm-3">
                        <label for="task_time_start" class="form-label my-secondary-font">Time Start</label>
                        <input type="time" class="form-control" name="task_time_start" id="task_time_start">
                    </div>
                    <div class="col-sm-3">
                        <label for="task_time_end" class="form-label my-secondary-font">Time End</label>
                        <input type="time" class="form-control" name="task_time_end" id="task_time_end">
                    </div>
                    <!-- Task Description -->
                    <div class="col-md-6">
                        <label for="task_description_one" class="form-label my-secondary-font">Description One</label>
                        <textarea name="task_description_one" id="task_description_one" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="task_description_two my-secondary-font" class="form-label">Description Two</label>
                        <textarea name="task_description_two" id="task_description_two" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="text-center mt-4 mb-0">
                    <button type="reset" class="btn btn-light text-dark">
                        <div class="hstack gap-3">
                            <span>Reset</span>
                            <div class="vr"></div>
                            <span class="material-symbols-rounded">
                                Delete
                            </span>
                        </div>
                    </button>
                    <button type="submit" class="btn btn-dark text-white">
                        <div class="hstack gap-3">
                            <span>Add</span>
                            <div class="vr"></div>
                            <span class="material-symbols-rounded">
                                add
                            </span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<script>
    
    AOS.init();

    $('#task_level').change(function (e) {
        $('#star_level').html('');
        e.preventDefault();
        const level = $(this).val();
        for (let i = 0; i < level; i++) {
            $('#star_level').append('<div class="w-auto">\
                                        <i class="fa-solid fa-star text-warning"></i>\
                                    </div>');
        }
    });
</script>

