<?php require('includes/header.php');?>
<div class="loginPageBG">
<div class="BGLoginPage">
    <div class="loginCover card">
        <div class="loginLogo">
        <img src="/fljc/assets/images/logo.png" alt="LOGO">
        </div>
    <div class="contentLoginForm">
        <p class="loginErrorDisplay"></p>
<form action="#" id="loginForm">
            <div class="input-group mb-3">
            <input type="text" class="form-control loginUsername" placeholder="Phone Number/Email Address" required>
            <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control loginPassword passIn" placeholder="*********" required>
            <div class="input-group-append">
            <span class="input-group-text viewPass"><i class="far fa-eye" id="openPass"></i><i class="fas fa-eye-slash" id="closePass"></i></span>
            </div>
        </div>
        <button class="btn loginSubmit btnSubmit" type="submit">Log In <i class="fas fa-check marker"></i> <i class="spinner-grow text-muted spinner-grow-sm loader"></i></button>
        </form>
        <p class="needHelp">Need help?</p>
        </div>
    </div>
    <div class="footCopy"><p>Copy © School of Disciples 2020. All Rights Reserved </p></div>
</div>
</div>



<div class="modal fade" id="loginModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Forgot your Password?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="forgotPassword">
       <p class="loginErrorDisplay"></p>
           <p class="fpError">You have tried more than 3 times to login without success. Do you need help?</p>
           <div class=""><p>If you have forgotten your password, kindly enter your email address below and a <b>Password Reset Request</b> will be sent to the Principal Administrator.</p></div>
      <form action="#" id="passForm">
      <input type="text" class="form-control form-control forgotUser" placeholder="Email Address/Phone Number">
        <button class="btn passSubmit btnSubmit" type="submit">Reset Password <i class="fas fa-check"></i> <i class="spinner-grow text-muted spinner-grow-sm loader"></i></button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
html{
    display: block;
}
body {
    overflow: hidden;
    -ms-overflow: hidden;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    var myURL = '//localhost/fljc/request/checklog.php';
    var passCheck = 0,
    userCheck = 0,
    forCheck = 0;
    $('#loginForm').submit(function(e){
        e.preventDefault();
        var formData = new FormData(),
        username = $('.loginUsername').val().trim(),
        pwd = $('.loginPassword').val();
        if (username === '') {
            $('.loginErrorDisplay').html('Kindly enter your Username');   
        } else if (pwd === '') {
            $('.loginErrorDisplay').html('Kindly enter your Password'); 
        }else{
            formData.append("username", username);
        formData.append("password", pwd);
        formData.append("type", 'Log In');

            $('.marker').hide();
            $('.loader').show();
            axios.post(myURL, formData,
                {
                headers: {
                'Content-Type': 'multipart/form-data',
                'Access-Control-Allow-Origin': '*'
                }
                })
                .then(function (response) {
                    $('.marker').show();
                    $('.loader').hide();
                    var serverResponse = response.data;
                    console.log(serverResponse)
                    if ((serverResponse === 0) && (userCheck < 3)) {
                        $('.loginErrorDisplay').html('Username doesn\'t exist');
                        userCheck++;
                    }else if ((serverResponse === 0 )&& (userCheck >= 3)) {
                        $('.loginErrorDisplay').html('You have tried to login with a wrong username for 3 consecutive time. Kindly contact the admin. Bye!');
                        setTimeout(function() {window.location.href = '//lucipost.com';},3000);
                    }else if ((serverResponse === 1) && (passCheck < 3)) {
                        $('.loginErrorDisplay').html('Incorrect Password');
                        passCheck++;
                    }else if ((serverResponse === 1) && (passCheck >= 3)) {
                        $('.fpError').show();
            $('#loginModal').modal('show');
                    }else if (serverResponse === 2) {
                        window.location.href = '//localhost/fljc/admin/index.php';
                        exit();
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }       
                
    });

    $('.needHelp').click(function(){
        $('#loginModal').modal('show');
    });


    $('.viewPass i').click(function(){
       var clicked = $(this).attr('id');
       if (clicked === 'openPass') {
           $('.passIn').removeAttr('type', 'password').attr('type', 'text');
           $('#openPass').hide();
           $('#closePass').show();
       }else if(clicked === 'closePass'){
        $('.passIn').removeAttr('type', 'text').attr('type', 'password');
           $('#openPass').show();
           $('#closePass').hide();
       }
    });

$('#passForm').submit(function(e){
    e.preventDefault()
    var forgotData = new FormData(),
    forgotUser = $('.forgotUser').val().trim()

    if (forgotUser === '') {
        $('.forgotPassword .loginErrorDisplay').html('Email Address/Phone number can\'t be empty')
    } else {
        forgotData.append('forgot', forgotUser)
        forgotData.append('type', 'Password Help')
        axios.post(myURL, forgotData,
                {
                headers: {
                'Content-Type': 'multipart/form-data',
                'Access-Control-Allow-Origin': '*'
                }
                })
                .then(function (response) {         console.log(response)
                    var resp = response.data;
                    if ((resp === 0) && (forCheck < 3)) {
                        forCheck++
                $('.forgotPassword .loginErrorDisplay').html('Email Address/Phone number doesn\'t exist')
                    }else if ((resp === 0 )&& (forCheck >= 3)) {
                $('.forgotPassword .loginErrorDisplay').html('You have tried a wrong Email/Password more than thrice. Kindly contact the admin. Bye!');
                        setTimeout(function() {window.location.href = '//lucipost.com';},3000);
                    }else if (resp === 200) {
                        alert('A Password reset request has been sent to the Admin')
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
    }
})


});



</script>
<?php include('includes/loginFooter.php');?>