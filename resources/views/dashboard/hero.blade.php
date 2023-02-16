
<section class="" style="height: 100vh">
    <div class="col-lg-12 container py-5">
        <div class="row">
          {{-- SIDEBAR --}}
          <div class="col-lg-3" data-aos="fade-left" data-aos-duration="500">
              <ul class="list-group">

                  <li class="list-group-item bg-dark text-white" aria-current="true">
                    <div class="d-flex justify-content-between align-items-center my-secondary-font">
                      Dashboard
                      <i class='bx bxs-dashboard'></i>
                    </div>
                  </li>

                  <a class="nav-link" style="font-style: none" href="{{route('dashboard.add_task')}}">
                    <li class="list-group-item" aria-current="true">
                      <div class="d-flex justify-content-between align-items-center my-secondary-font">
                        Add Task
                        <i class='bx bx-add-to-queue'></i>
                      </div>
                    </li>
                  </a>

                  @if($user->isAdmin == true)
                  <a class="nav-link" style="font-style: none" href="{{route('admin.view_list_user')}}">
                    <li class="list-group-item" aria-current="true">
                      <div class="d-flex justify-content-between align-items-center my-secondary-font">
                        List User
                        <i class='bx bx-add-to-queue'></i>
                      </div>
                    </li>
                  </a>
                  @endif

                  @if($user->isAdmin == false)
                  <a class="nav-link" style="font-style: none; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#send_feedback_Modal">
                    <li class="list-group-item" aria-current="true">
                      <div class="d-flex justify-content-between align-items-center my-secondary-font">
                        Send Feedback
                        <i class='bx bx-mail-send'></i>
                      </div>
                    </li>
                  </a>
                  @endif
              </ul>
          </div>
          {{-- CONTENT --}}
          <div class="col-lg-9" data-aos="fade-up" data-aos-duration="2000" id="hero_main_content">
              <div class="container-fluid">
                  <div class="mb-5">
                    <div class="row">
                      <div class="col-sm-10 mb-2">
                        <button class="btn btn-danger btnTaskCategory my-secondary-font" value=0>All</button>
                        <button class="btn btn-secondary btnTaskCategory my-secondary-font" value=1>School/Work</button>
                        <button class="btn btn-secondary btnTaskCategory my-secondary-font" value=2>Sports/Games</button>
                        <button class="btn btn-secondary btnTaskCategory my-secondary-font" value=4>Shopping</button>
                        <button class="btn btn-secondary btnTaskCategory my-secondary-font" value=5>Religions</button>
                        <button class="btn btn-secondary btnTaskCategory my-secondary-font" value=6>Socials</button>
                        <button class="btn btn-secondary btnTaskCategory my-secondary-font" value=7>Others</button>
                      </div>
                      <div class="col-sm-2">
                        <select class="form-select" aria-label="Default select example" id="sort_task">
                          <option selected class="my-secondary-font" value="0">Sort By</option>
                          <option class="my-secondary-font" value="1">Alphabet</option>
                          <option class="my-secondary-font" value="2">Deadline</option>
                          <option class="my-secondary-font" value="3">Latest</option>
                          <option class="my-secondary-font" value="4">Level</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <select class="form-select select_importance_level" aria-label="Default select example" id="select_importance_level">
                          <option value="0" selected class="my-secondary-font">All Level</option>
                          <option value="1" class="my-secondary-font">None</option>
                          <option value="2" class="my-secondary-font">Low</option>
                          <option value="3" class="my-secondary-font">Normal</option>
                          <option value="4" class="my-secondary-font">High</option>
                          <option value="5" class="my-secondary-font">Very High</option>
                          <option value="6" class="my-secondary-font">Critical</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <select class="form-select select_status_task" aria-label="Default select example" id="select_task_status">
                          <option selected class="my-secondary-font" value="0">All Status</option>
                          <option class="my-secondary-font" value="1">Pending</option>
                          <option class="my-secondary-font" value="2">Ongoing</option>
                          <option class="my-secondary-font" value="3">Done</option>
                          <option class="my-secondary-font" value="4">Cancel</option>
                          <option class="my-secondary-font" value="5">Delay</option>
                          <option class="my-secondary-font" value="6">Undone</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  {{-- TASK LIST --}}
                  <div id="task_content">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                      @foreach ($tasks['tasks'] as $tasks)
                          <div class="accordion-item shadow mb-2 bg-body-tertiary rounded">
                            <h2 class="accordion-header my-third-font" id="flush-heading{{$tasks['id']}}">
                              <button class="accordion-button collapsed gap-2 align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$tasks['id']}}" aria-expanded="false" aria-controls="flush-collapse{{$tasks['id']}}">
                                  @if($tasks['status_id'] == 3)
                                    <div class="">
                                      <i class="fa-sharp fa-solid fa-circle-check text-success fs-5"></i>
                                    </div>
                                  @endif
                                  <div class="p-0 mt-2">
                                    <h5 class="fw-light my-third-font fs-5">{{$tasks['name']}}</h5>
                                  </div>
                              </button>
                            </h2>
                            <div id="flush-collapse{{$tasks['id']}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$tasks['id']}}" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">
                                <div class="col-md-12">
                                  <div class="d-flex justify-content-between align-items-center">
                                      <div class="">
                                        <h6 class="fw-bold my-third-font">{{$tasks['todo_list_detail']['name']}}</h6>
                                      </div>
                                      <div class="">
                                        <div class="m-0 p-0 w-auto">
                                          {{-- <input type="checkbox" name="" id="ck" class="w-auto bg-warning">
                                          <label for="ck" class="form-label fs-6 me-2 my-0"><p class="fs-6">Mark as done</p></label> --}}
                                          <div class="btn-group">
                                            <button class="btn btn-light btn-sm my-third-font" type="button">
                                              Actions
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                              <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li class="dropdown-item d-flex justify-content-between align-items-center task_done" value="3" task_id="{{$tasks['id']}}">
                                                <a class="nav-link">
                                                  <span class="my-third-font">Done</span>
                                                  <i class="fa-solid fa-square-check text-success"></i>
                                                </a>
                                              </li>
                                              <li class="dropdown-item d-flex justify-content-between align-items-center task_done" value="4" task_id="{{$tasks['id']}}">
                                                <a class="nav-link" value={{$tasks['id']}}>
                                                  <span class="my-third-font">Cancel</span>
                                                  <i class="fa-solid fa-square-xmark text-danger"></i>
                                                </a>
                                              </li>
                                            </ul>
                                          </div>
                                          <button class="btn btn-light btn-sm my-third-font button_delay_task" data-bs-toggle="modal" data-bs-target="#delay_task_Modal" value="{{$tasks['id']}}">Delay</button>
                                          <button class="btn btn-light btn-sm button_delete_task my-third-font" value="{{$tasks['id']}}">Delete</button>
                                          <button class="btn btn-light btn-sm button_edit_task my-third-font" data-bs-toggle="modal" data-bs-target="#edit_task_Modal" id="" value="{{$tasks['id']}}">Edit</button>
                                        </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="row d-flex justify-content-between align-items-center my-3">
                                  <div class="w-auto row">
                                    <div class="hstack gap-3">
                                      <?php $x = $tasks['todo_status']['id'];?>
                                      <span class="badge text-dark w-auto my-third-font text-uppercase task_status_color" value="{{$tasks['todo_status']['id']}}">{{$tasks['todo_status']['name']}}</span>
                                      <div class="vr"></div>
                                      @foreach (range(1,$tasks['todo_level']['id'] , 1) as $number)
                                        <div class="w-auto">
                                          <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                      @endforeach
                                    </div>
                                  </div>
                                  <div class="row d-flex justify-content-end w-auto">
                                      <span class="w-auto my-third-font">{{$tasks['todo_list_detail']['date_started']}}</span>
                                      <span class="w-auto my-third-font">until</span>
                                      <span class="w-auto my-third-font">{{$tasks['todo_list_detail']['date_end']}}</span>
                                  </div>
                                </div>
                                <div class="row d-flex justify-content-between align-items-center">
                                  <div class="container border-dark">
                                    <u class="my-third-font">
                                      {{$tasks['todo_list_detail']['description_one']}}
                                    </u>
                                    <br>
                                    <u class="my-third-font">
                                      {{$tasks['todo_list_detail']['description_two']}}
                                    </u>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>

                      @endforeach
                    </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
</section>


<script>
  AOS.init();
</script>
