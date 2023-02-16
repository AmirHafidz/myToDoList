@extends('layout.app')

@include('register.navbar')

@include('register.hero')

@include('register.footer')

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<script>
    AOS.init();
</script>

<script>

    $('#button_submit_register').hover(function () {
            // over
            $(this).addClass('bx-tada');
        }, function () {
            // out
            $(this).removeClass('bx-tada');
        }
    );

    $('#user_register_form').submit(function (e) { 
        e.preventDefault();
        //
    });

    $('#user_register_form').on('input',function(e){
        $('#rule_content').removeAttr('hidden');
        $('#rule_content').html(`@include("register.rule_register")`);
        $('#rule_content').attr('id', 'nan');
    });

    $('#user_register_form').submit(function (e) { 
        e.preventDefault();
        const fd = new FormData(this);

        var name =  $('#register_name').val();
        var password =  $('#register_email').val();
        var email =  $('#register_password').val();

        var data_register = {
            'name': name,
            'email': email,
            'password': password,
        };

        $.ajax({
            type: "post",
            url: '{{route("user.register")}}',
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {

                swal.fire('Success !',response.message,'success');

                setTimeout(() => {
                    window.location.href =  "{{route('user.dashboard')}}";
                }, 2000);
                
            }
        });
    });
</script>