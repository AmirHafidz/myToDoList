{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delay_task_Modal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
<div class="modal fade shadow" id="delay_task_Modal" tabindex="-1" aria-labelledby="delay_task_ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        {{-- <div class="modal-header">
            <h1 class="modal-title fs-5" id="delay_task_ModalLabel">Delay Task</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> --}}
        <div class="modal-body p-5">
            <h3 class="my-secondary-font mb-3">
                <span>Delay Task</span>
                <i class='bx bxs-timer bx-spin' ></i>
            </h3>
            <form action="" id="delay_task_form">
                @csrf
                <input type="text" name="user_id" id="" value="{{$user->id}}">
                <input type="text" name="task_id" id="delay_task_id" value="">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Start Date</span>
                    <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="delay_start_date" name="delay_start_date">
                </div>                  
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">End Date</span>
                    <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="delay_end_date" name="delay_end_date">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Time Started</span>
                    <input type="time" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="delay_start_time" name="delay_started_time">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Time End</span>
                    <input type="time" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="delay_end_time" name="delay_end_time">
                </div>
                <button class="btn btn-light text-dark" data-bs-dismiss="modal" type="button">Cancel</button>              
                <button class="btn btn-dark text-white" type="submit">Update time</button>              
            </form>
        </div>
        {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
        </div>
    </div>
</div>
