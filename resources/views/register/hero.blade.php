{{-- <div class="container py-5">
    <div class="card shadow mb-2 bg-body-tertiary rounded p-5">
        <h3 class="fs-3 my-third-font">Register . . .<i class='bx bxs-user-plus'></i></h3>
        <div class="py-5">
            <form action="">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </form>
        </div>
    </div>
</div> --}}

<div class="container py-5" data-aos="fade-up" data-aos-duration="2000">
    <div class="col-lg-12" data-aos="fade-left" data-aos-duration="2000">
        <div class="row d-flex justify-content-center" id="register_content">
            <div class="col-lg-6">
                <div class="card px-3 py-3 shadow mb-2 bg-body-tertiary rounded" data-aos="fade-down" data-aos-duration="1000">
                    <div class="mb-3 mt-0 text-center">
                        <h3 class="fs-3 my-third-font">Register Now!</h3>
                    </div>
                    <form action="" method="" id="user_register_form">
                        @csrf
                        <div class="input-group mb-3 shadow mb-2 bg-body-tertiary rounded" data-aos="fade-right" data-aos-duration="2000">
                            <span class="input-group-text bg-dark text-white my-primary-font" id="inputGroup-sizing-default">Username</span>
                            <input type="text" class="form-control my-secondary-font" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="register_name" name="register_name">
                        </div>
                        <div class="input-group mb-3 shadow mb-2 bg-body-tertiary rounded" data-aos="fade-right" data-aos-duration="2000">
                            <span class="input-group-text bg-dark text-white  my-primary-font" id="inputGroup-sizing-default">Email</span>
                            <input type="email" class="form-control my-secondary-font" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="register_email" name="register_email">
                        </div>
                        <div class="input-group mb-3 shadow mb-2 bg-body-tertiary rounded" data-aos="fade-right" data-aos-duration="2000">
                            <span class="input-group-text bg-dark text-white my-primary-font" id="inputGroup-sizing-default">Password</span>
                            <input type="password" class="form-control my-secondary-font" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="register_password" name="register_password">
                        </div>
                        <div class="input-group mb-3 shadow mb-2 bg-body-tertiary rounded" data-aos="fade-right" data-aos-duration="2000">
                            <span class="input-group-text bg-dark text-white my-primary-font" id="inputGroup-sizing-default">Confirm Password</span>
                            <input type="password" class="form-control my-secondary-font" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="register_password2" name="register_password2">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-light text-dark shadow my-primary-font me-1" type="button" onclick="history.back()">Cancel</button>
                            <button class="btn btn-dark text-light shadow my-primary-font" type="submit" id="button_submit_register">
                                <span class="fs-6 h-stack">Join <i class='bx bxs-user-plus mt-2'></i></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4" id="rule_content" hidden>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<script>
    AOS.init();
</script>