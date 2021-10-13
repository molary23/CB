<?php include('../includes/nav.php');?>
<div class="userContent">
<div class="holderCard">
    <div class="personalInfo">
<div class="userIntro">
    <h1>User Personal Info</h1>
</div>
<div class="row">
        <div class="col-12 col-sm-4">
        <label for="">User Full Name:</label>
  <p class="" id=""><?php echo @$name;?></p>
        </div>

        <div class="col-12 col-sm-4">
        <label for="">User Email:</label>
  <p class="" id=""><?php echo @$email;?></p>
        </div>

        <div class="col-12 col-sm-4">
        <label for="">User Phone:</label>
  <p class="" id=""><?php echo @$phone;?></p>
        </div>
</div>
</div>

<div class="passwordSection">
<div class="userIntro">
<h1>User Password Info</h1>
</div>
<div class="row">
    <div class="col-sm-3 d-none d-sm-block"></div>
    <div class="col-sm-6 col-12">
    <form class="was-validated" id="editPasswordForm">
  <div class="form-group">
    <input type="password" class="form-control passIn" id="pwd1" placeholder="Enter password" name="pswd1" required minlength="5"/>
    <div class="invalid-feedback pwdNot">Please enter your password.</div>
  </div>
  <div class="form-group">
  <div class="input-group mb-3">
    <input type="password" class="form-control passIn" id="pwd2" placeholder="Confirm password" name="pswd2" required minlength="5"/>
    <div class="input-group-append">
      <span class="input-group-text viewPass"><i class="far fa-eye" id="openPass"></i><i class="fas fa-eye-slash" id="closePass"></i></span>
    </div>
    <div class="invalid-feedback pwdNot2">Please confirm your password.</div>
  </div>
  </div>
  <button type="submit" class="btn subBTN">Change Password</button>
</form> 
    </div>
    <div class="col-sm-3 d-none d-sm-block"></div>
</div>
</div>
<div class="photoSection">
<div class="userIntro">
<h1>User Photo Section</h1>
</div>
<div class="row">
    <div class="col-12 col-sm-6">
    <form class="was-validated" id="editPhotoForm" enctype="multipart/form-data">
    <input type="file" class="form-control-file border" id="userFile" name="userFile" accept="image/*"/>
    <button type="submit" class="btn subBTN">Save Picture</button>
    </form>
    </div>
    <div class="col-12 col-sm-6">
    <div id="outbox">
        <img src="" alt="" id="preview">
    </div>
    </div>
</div>


</div>


</div>
</div>


<style type="text/css">
</style>
<script type="text/javascript">
/*reduceNumber = (number) => {
  var num;
  if ((number > 1000) && (number < 1000000)) {
    num = `${Math.round(number / 1000)}k+`
  }else if(number > 1000000){
    num = `${Math.round(number / 1000000)}m+`
  }
  return num;
}

$(document).ready(function(){
  var myUrl = '//localhost/fljc/request/adminRequest.php';
  axios.get(myUrl, {
    params: {
      normal: 'normal'
    }
  })
  .then(function (response) {
    var serverResponse = response.data;
    $('.quotationCard h4').html(reduceNumber(serverResponse[0] + 10000));
    $('.transactionsCard h4').html(reduceNumber(serverResponse[1] + 13200));
    $('.clientsCard h4').html(reduceNumber(serverResponse[2] + 1000000));
    $('.testimonialsCard h4').html(reduceNumber(serverResponse[3] + 13200));
    $('.galleryCard h4').html(reduceNumber(serverResponse[4] + 10000));
    $('.usersCard h4').html(reduceNumber(serverResponse[5] + 1320000));
  })
  .catch(function (error) {
    console.log(error);
  })
  .then(function () {
    // always executed
  }); 
});*/

const sendURL = '//localhost/fljc/request/adminSend.php';


$('#userFile').change(function(evt) { 
$('#output').attr('src', '');
var files = evt.target.files;
var file = files[0];
var size = $(this)[0].files[0].size;
var sizeInKB = Math.round(size/1000);
var imgname  =  $(this).val(),
ext =  imgname.substr( (imgname.lastIndexOf('.') +1) ); 

var imgname  =  $(this).val(),
ext =  imgname.substr( (imgname.lastIndexOf('.') +1) ); 
if (ext =='jpg' || ext =='jpeg' || ext =='png' || ext =='PNG' || ext =='JPG' || ext =='JPEG') {
if (file) {
var reader = new FileReader();
reader.onload = function(e) {
document.getElementById('preview').src = e.target.result;
document.getElementById('preview').style.display = "block";
};
reader.readAsDataURL(file);
} 
}else{
errorFunc($('#drop-zone'), $('.dragMsg'), 'Wrong File Format');   
}
});


$('#editPasswordForm').submit(function(e){
    e.preventDefault()
    var pwd1 = $('#pwd1').val(),
    pwd2 = $('#pwd2').val()

    if (pwd1 === '') {
        $('.pwdNot').show()
    } else if (pwd2 === '') {
        $('.pwdNot2').show()
    }else if (pwd2 !== pwd1) {
        $('#pwd2').addClass('addError')
        $('.pwdNot').html("Password Mismatched").show()
        $('.pwdNot2').html("Password Mismatched").show()
    }  else {
        axios.get(sendURL, {
    params: {
        pwd1,
        send: 'Change Password'
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data
    if (resp === 0) {
        $('.pwdNot').show()
        $('.pwdNot2').show()
    } else if (resp === 1) {
        alert('Oops! Something went wrong. Try after some time.')
    } else if (resp === 200) {
        alert('Password Changed successful. The system will nowlog you out in 3 seconds')
        //window.location.her = '//localhost/fljc/login.php'
    } 
})
.catch(function (error) {
console.log(error);
})
    }
})


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


    $('#editPhotoForm').submit(function(e){
e.preventDefault();
var formData = new FormData(),
imagefile = document.querySelector('#userFile');
formData.append("image", imagefile.files[0]);
formData.append("send", 'Change Photo');
var imgname  =  $('#userFile').val();
if (imgname == '') {
alert("Please select a Picture or Drag and Drop"); 
}else{
var size  =  $('#userFile')[0].files[0].size; 
var ext =  imgname.substr( (imgname.lastIndexOf('.') +1) ); 
if(ext =='jpg' || ext =='jpeg' || ext =='png' || ext =='PNG' || ext =='JPG' || ext =='JPEG'){
axios.post(sendURL, formData,
{
headers: {
'Content-Type': 'multipart/form-data',
'Access-Control-Allow-Origin': '*'
}
})
.then(response => {
// Do something with response
var output = response.data
if (output === 0) {
   //image can't be empty 
}else if (output === 1) {
    alert('Oops! Something went wrong. Try after some time.')
}else if (output === 200) {
    alert('Photo uploaded successfully.')
    window.location.reload(true)
}
console.log(response)
}).catch(err => {
// Do something with err
});
}else{
alert("Only JPEG,JPG,PNG,jpg,jpeg,png Files are allowed");  
}  
}
});

</script>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/includes/footer.php');?>