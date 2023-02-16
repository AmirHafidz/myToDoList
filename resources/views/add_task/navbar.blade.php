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
                <li class="navbar-item dropdown text-white">
                    <a href="" class="nav-link dropdown-toggle bg-warning text-dark" id="navbarDropdown" ole="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$user->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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