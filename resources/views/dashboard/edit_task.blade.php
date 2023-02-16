<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_task_Modal">
    Launch demo modal
  </button> --}}
  
<!-- Modal -->
<div class="modal modal-lg fade" id="edit_task_Modal" tabindex="-1" aria-labelledby="edit_task_ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="edit_task_ModalLabel">Edit Task</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" id="edit_task_form" method="">
                @csrf
                <div class="row">
                    <input type="text" name="edit_task_user_id" value="" id="edit_task_user_id">
                    <input type="text" name="edit_task_id" value="" id="edit_task_id">
                    <!-- Task Category -->
                    <div class="col-sm-6">
                        <label for="task_category" class="form-label">Category</label>
                        <select name="edit_task_category" id="edit_task_category" class="form-control">
                            <option value="1">School/Work</option>
                            <option value="2">Sports/Games</option>
                            <option value="3">Shopping</option>
                            <option value="4">Religions</option>
                            <option value="5">Socials</option>
                            <option value="6">Others</option>
                        </select>
                    </div>
                    <!-- Task Level -->
                    <div class="col-sm-3">
                        <label for="task_level" class="form-label">Importance</label>
                        <input type="range" name="edit_task_level" min="1" max="5" step="1" class="form-range mt-1" id="edit_task_level"/>
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="form-label" style="visibility: hidden">c</label>
                        <div class="row" id="star_level">
                        </div>
                    </div>
                    <!-- Task Main Title -->
                    <div class="col-sm-6">
                        <label for="task_main_title" class="form-label">Main Title</label>
                        <input type="text" class="form-control" id="edit_task_main_title" name="edit_task_main_title">
                    </div>
                    <!-- Task Date -->
                    <div class="col-sm-3">
                        <label for="task_date_start" class="form-label">Date Started</label>
                        <input type="date" class="form-control" name="edit_task_date_start" id="edit_task_date_start">
                    </div>
                    <div class="col-sm-3">
                        <label for="task_date_end" class="form-label">Date End</label>
                        <input type="date" class="form-control" name="edit_task_date_end" id="edit_task_date_end">
                    </div>
                    <!-- Task Sub Title -->
                    <div class="col-sm-6">
                        <label for="task_sub_title" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="edit_task_sub_title" name="edit_task_sub_title">
                    </div>
                    <!-- Task Time -->
                    <div class="col-sm-3">
                        <label for="task_time_start" class="form-label">Time Start</label>
                        <input type="time" class="form-control" name="edit_task_time_start" id="edit_task_time_start">
                    </div>
                    <div class="col-sm-3">
                        <label for="task_time_end" class="form-label">Time End</label>
                        <input type="time" class="form-control" name="edit_task_time_end" id="edit_task_time_end">
                    </div>
                    <!-- Task Description -->
                    <div class="col-md-6">
                        <label for="task_description_one" class="form-label">Description One</label>
                        <textarea name="edit_task_description_one" id="edit_task_description_one" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="task_description_two" class="form-label">Description Two</label>
                        <textarea name="edit_task_description_two" id="edit_task_description_two" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="text-center mt-4 mb-0">
                    <button type="reset" class="btn btn-danger">
                        <div class="hstack gap-3">
                            <span>Reset</span>
                            <div class="vr"></div>
                            <span class="material-symbols-rounded">
                                Delete
                            </span>
                        </div>
                    </button>
                    <button type="submit" class="btn btn-success">
                        <div class="hstack gap-3">
                            <span>Update</span>
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
    </div>
</div>