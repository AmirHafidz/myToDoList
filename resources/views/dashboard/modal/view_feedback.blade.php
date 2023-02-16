
  
  <!-- Modal -->
  <div class="modal fade shadow mb-5" id="view_feedback_Modal" tabindex="-1" aria-labelledby="view_feedback_ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h1 class="modal-title fs-5" id="view_feedback_ModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body">
                <div class="p-3">
                    <h3 class="my-primary-font mb-3">
                        <span>Send Feedback</span>
                        <i class='bx bx-mail-send bx-spin bx-flip-horizontal' ></i>
                    </h3>
                    <form action="" id="feedback_form">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                                {{--  --}}
                                <input type="text" value="{{$user->id}}" name="user_id" hidden>
                                <div class="col-sm-6 my-2">
                                    <span class="fs-6 my-third-font">User Friendly</span>
                                </div>
                                <div class="col-md-4 my-2">
                                    <input type="range" name="feedback_ux" id="view_feedback_ux" class="" min="0" max="100" step="1">
                                </div>
                                <div class="col-sm-2 my-2">
                                    <span id="view_point_feedback_ux" class="my-third-font fs-6 m-0"></span>
                                </div>
                                {{--  --}}
                                <div class="col-sm-6 my-2">
                                    <span class="fs-6 my-third-font">Design</span>
                                </div>
                                <div class="col-sm-4 my-2">
                                    <input type="range" name="feedback_ui" id="view_feedback_ui" class="" min="0" max="100" step="1">
                                </div>
                                <div class="col-sm-2 my-2">
                                    <span id="view_point_feedback_ui" class="my-third-font fs-6 m-0"></span>
                                </div>
                                {{--  --}}
                                <div class="col-sm-6 my-2">
                                    <span class="fs-6 my-third-font">Functionality</span>
                                </div>
                                <div class="col-sm-4 my-2">
                                    <input type="range" name="feedback_functionality" id="view_feedback_functionality" class="mt-1">
                                </div>
                                <div class="col-sm-2 my-2">
                                    <span id="view_point_feedback_functionality" class="my-third-font fs-6 m-0"></span>
                                </div>
                                {{--  --}}
                                <hr class="hr my-2">
                                {{--  --}}
                                <div class="col-md-12 mt-2">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="my-third-font input-group-text bg-dark text-white" id="inputGroup-sizing-sm">Title</span>
                                        <input type="text" class="form-control my-secondary-font" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="feedback_title" id="view_feedback_title">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="input-group input-group-sm mb-2">
                                    <span class="my-third-font input-group-text bg-dark text-white">Comments</span>
                                    <textarea class="form-control my-secondary-font" aria-label="With textarea" rows="6" name="feedback_comment" id="view_feedback_comment"></textarea>
                                </div>

                                <hr class="hr my-2">
                                
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-light text-dark my-third-font me-2" data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-sm btn-dark text-white my-third-font" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>