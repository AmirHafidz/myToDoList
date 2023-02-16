
<div data-aos="fade-up" data-aos-duration="1000">
    <div class="container my-5" data-aos="fade-up">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-8" style="background-image: url('{{asset('images/bg6.webp')}}'); background-size:contain">
                    <h1 class="display-1 fw-bold lh-1 mb-3 align-items-center text-align-center my-5 my-secondary-font text-shadow">
                        Arrange your task today Now !
                    </h1>
                    <p class="lead">
                        Arrange your task so you can be more productive
                        in your work. Join us and feel the difference.
                        <button class="btn btn-outline-primary btn-sm m-0">Join Us</button>
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-light">
                        <div class="card-header">
                            <div class="fs-3 text-center my-primary-font">Login</div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.login')}}" id="login_form" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default"><i class='bx bxs-user' ></i></span>
                                    <input type="text" class="form-control my-secondary-font" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Email" name="login_email">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default"><i class='bx bxs-key'></i></span>
                                    <input type="password" class="form-control my-secondary-font" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Password" name="login_password">
                                </div>
                                <div class="fs-6 d-flex justify-content-end">
                                    <p class="fw-lighter fst-italic fs-6"><a href="" class="nav-link fs-6 text-secondary">Forgot Password?</a></p>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <button class="btn btn-success w-100 bg-dark text-white" type="submit">Login</button>
                            </form>
                            <div class="text-center mb-3">
                                <span class="text-center">not a member? <a href="{{route('user.view_register')}}">Register</a> </span>
                            </div>
                            <div class="text-center mb-3">
                                <span class="text-center mb-3">or sign up with</span>
                            </div>
                            <div class="d-flex justify-content-center my-3">
                                <i class="fa-brands fa-facebook-f mx-3"></i>
                                <i class="fa-brands fa-google mx-3"></i>
                                <i class="fa-brands fa-twitter mx-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">

                {{-- <div style="min-height: 200px" class="my-2 col-lg-3 bg-secondary">

                </div>
                <div style="min-height: 200px" class="my-2 col-lg-3 bg-dark">
                    <img src="" alt="" class="img-thumbnail">
                </div> --}}
                <div class="my-2 col-lg-6 shadow">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="{{asset('images/p1.jpg')}}" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body my-0">
                                <p class="card-text mt-0">“Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma—which is living with the results of other people's thinking. Don't let the noise of others' opinions drown out your own inner voice. And most important, have the courage to follow your heart and intuition.”</p>
                                <h6 class="card-title my-0">Steve Jobs</h6>
                                <p class="card-text"><small class="text-muted"><i>10 Aug 2018</i></small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="my-2 col-lg-6 shadow">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="{{asset('images/p1.jpg')}}" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="embed-responsive embed-responsive-21by9 bg-dark d-flex justify-content-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/fbAYK4KQrso" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>

        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<script>
    AOS.init();
</script>