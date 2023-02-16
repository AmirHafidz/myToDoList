<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
    <div class="ms-5">
        <a href="" class="navbar-brand tetx-white">Mirha</a>
    </div>
    <div class="me-5">
        <div class="navbar-collapse" id="">
            {{-- <ul class="navbar-nav">
                <li class="navbar-active navbar-item">
                    <a href="" class="nav-link">Amir</a>
                </li>
                <li class="navbar-item">
                    <a href="" class="nav-link">Amir</a>
                </li>
                <li class="navbar-item">
                    <a href="" class="nav-link">Amir</a>
                </li>
                <li class="navbar-item">
                    <a href="" class="nav-link">Amir</a>
                </li>
                <li class="navbar-item">
                    <a href="" class="nav-link">Amir</a>
                </li>
            </ul> --}}
            <ul class="navbar-nav">
                @if($user->isAdmin)
                <li class="navbar-item me-2">
                    {{-- <a href="" class="nav-link dropdown-toggle bg-warning text-dark h-stack gap-1 px-3" id="admin_notification" ole="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-bell col-sm-6"></i>
                        <span class="fs-6">1</span>
                    </a> --}}
                    {{-- <div class="dropdown-menu p-1 bg-dark" style="border: 1px solid white; width:500px" aria-labelledby="admin_notification">
                        @forelse ($user->notifications as $notification)
                            <div class="notification_{{$notification->id}}">
                                <div class="row d-flex justify-content-start align-items-center">
                                    <input type="checkbox" value="" class="">
                                    <a href="" class="dropdown-item bg-dark text-white fs-6 my-secondary-font col-sm-6">
                                        <p class="fs-6 m-0">
                                            {{$notification->data['name']}} have join us !
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <hr class="hr m-0">
                        @empty
                            <span class="fs-6 my-secondary-font">No new notification</span>
                        @endforelse
                    </div> --}}
                    <div class="btn-group">
                        <a type="button" class="nav-link dropdown-toggle bg-warning text-dark" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <i class="fa-solid fa-bell"></i>
                            @if(count($user->unReadNotifications) != 0)
                                <span class="fs-6">{{count($user->unReadNotifications)}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end p-1" style="width: 400px">
                            @forelse ($user->unreadNotifications as $notification)
                                @if($notification->data['n_type']== 1)
                                    <div class="d-flex justify-content-start text-white">
                                        <input type="checkbox" name="" id="" class="me-1 ms-1 notification_read" notification_id="{{$notification->id}}">
                                        <li class="dropdown-item my-secondary-font bg-secondary text-white overflow-auto" id="notification_{{$notification->id}}">{{$notification->data['name']}} {{$notification->data['sentence']}} {{$notification->data['title']}} </li>
                                    </div>
                                @else              
                                    <div class="d-flex justify-content-start text-white">
                                        <input type="checkbox" name="" id="" class="me-1 ms-1 notification_read" notification_id="{{$notification->id}}">
                                        <li feedback_id="{{$notification->data['feedback_id']}}" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#view_feedback_Modal" class="dropdown-item my-secondary-font bg-secondary text-white overflow-auto notification_li" id="notification_{{$notification->id}}">{{$notification->data['name']}} {{$notification->data['sentence']}} {{$notification->data['title']}} </li>
                                    </div>
                                @endif
                                <hr class="hr m-0 p-0">
                            @empty
                            <div class="d-flex justify-content-start text-white">
                                <li class="dropdown-item my-secondary-font text-center"><i class="fw-light text-secondary">No new notification rigth now...</i></li>
                            </div>
                            @endforelse
                          {{-- <li><button class="dropdown-item" type="button">Another action</button></li>
                          <li><button class="dropdown-item" type="button">Something else here</button></li> --}}
                        </ul>
                    </div>
                </li>
                @endif
                <li class="navbar-item dropdown text-white">
                    <a href="" class="nav-link dropdown-toggle bg-warning text-dark" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$user->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a href="" class="dropdown-item">Satu</a>
                        <a href="" class="dropdown-item">Dua</a>
                        <a href="" class="dropdown-item">Tiga</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{route('user.logout')}}" class="m-0 p-0" method="post">
                            @csrf
                            <div class="hstack gap-3">
                                <i class='bx bx-power-off bx-tada fs-5 mb-0' ></i>
                                <input type="submit" value="Logout" class="mt-0 text-center fs-6" style="border: none; background-color:transparent;">
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>