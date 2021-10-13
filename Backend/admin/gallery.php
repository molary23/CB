<?php require_once('../includes/nav.php');?>
<div class="galleryContent">

<div class="holderCard">
    <h1>All <em><?php echo $countG; ?></em> Photos</h1>
    <div class="searchTop">
    <div class="row">
        <div class="col-12 col-sm-3">
            <input type="text" class="form-control form-control searchInput" placeholder="Enter your Search Keywords here...">
        </div>
        <div class="col-12 col-sm-3">
        <div class="loading">Loading... <div class="spinner-border text-muted spinner-border-sm"></div>
            </div>
        </div>
        <div class="col-12 col-sm-3">
        <span class="searchResult"></span>
        </div>
        <div class="col-12 col-sm-3">
        <button class="btn btn-light btn-sm addGallery addNewBTN" data-toggle="modal" data-target="#pixModal">Add New <i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
</div>
<div class="gallerySection">
<div class="row contentGallery">
</div>
  <div class="row gallerySearchContent">
</div>
<div class="viewMore">
<button class="btn btn-light btn-sm getMoreBTN"><span class="getMoreWord">More</span> <i class="spinner-border text-muted spinner-border-sm getMoreLoader loader"></i></button>
</div>
</div>

</div>



<div class="modal fade" id="pixModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content" id="modalBody">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Past Project Image</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="container-fluid">
<div class="row">
  <div class="col-md-5 col-sm-12">
              <div id="drop-zone">
                <span class="dragMsg">Drop files here...</span>
                  <div id="clickHere">
                  or Click Here
                        <input type="file" name="file" id="file" accept="image/*"/>
                      </div>
              </div>  
  </div>




<div class="col-md-7 col-sm-12">
<div id="canvasHolder">
  <canvas id="canvas">
    Your browser does not support the HTML5 canvas element.
  </canvas>
</div>
<div class="editImageBTN">
<button class="btn btn-primary" id="btnCrop" > Crop Image <i class="fas fa-crop-alt"></i></button>
<button class="btn btn-info" id="btnRestore" >Restore Image <i class="fas fa-sync"></i></button>
</div>
</div>
<div class="col-md-5 col-sm-12">
  <form id="addImageForm" class="was-validated">
  <div class="form-group">
    <input type="text" class="form-control" id="imageCaption" placeholder="Enter Image Caption" name="imageCaption" required>
    <div class="invalid-feedback">Image Caption is important</div>
  </div>
  <div class="form-group">
    <textarea type="" class="form-control" placeholder="Enter Image Description" name="imageDes" id="imageDes" rows="5"></textarea>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <button type="submit" class="btn submitAD">Save <i class="far fa-image"></i></button>
  </form>
</div>
<div class="col-md-7 col-sm-12">
<div id="result"></div>
</div>
</div>
        </div>
        
      </div>
    </div>
  </div>
  </div>
</div>

  <div class="modal fade" id="editPixModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Image Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="addNewTest">
       <p class="addError"></p>
      <form action="#" id="editImageForm">
      <input type="text" name="imgCap" id="imgCap" class="form-control form-control searchInput" placeholder="Image Caption" required minlength="3" maxlength="20">
      <input type="text" name="imageID" id="imageID" class="form-control form-control searchInput">
        <textarea  name="imgDes" id="imgDes" class="form-control form-control searchInput" placeholder="Image Description" rows="5" maxlength="300" minlength="20"></textarea>
        <button class="btn submitAD" type="submit">Save Image Info<i class="fas fa-check"></i> <i class="spinner-grow text-muted spinner-grow-sm loader"></i></button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
</style>


<link rel="stylesheet" href="//localhost/fljc/assets/cropper.css"/>
<script src="//localhost/fljc/js/croppers.js"></script>
<script type="text/javascript">

$.fn.dropZone = function() {
  var buttonId = "clickHere",
   mouseOverClass = "mouse-over",

   dropZone = this[0],
   $dropZone = $(dropZone),
   ooleft = $dropZone.offset().left,
   ooright = $dropZone.outerWidth() + ooleft,
   ootop = $dropZone.offset().top,
   oobottom = $dropZone.outerHeight() + ootop,
   inputFile = $dropZone.find("input[type='file']");
  dropZone.addEventListener("dragleave", function() {
    this.classList.remove(mouseOverClass);
  });
  dropZone.addEventListener("dragover", function(e) {
    //console.dir(e);
    e.preventDefault();
    e.stopPropagation();
    this.classList.add(mouseOverClass);
    var x = e.pageX,
     y = e.pageY;

    if (!(x < ooleft || x > ooright || y < ootop || y > oobottom)) {
      inputFile.offset({
        top: y - 15,
        left: x - 100
      });
    } else {
      inputFile.offset({
        top: -400,
        left: -400
      });
    }
  }, true);
  dropZone.addEventListener("drop", function(e) {
    this.classList.remove(mouseOverClass);
  }, true);
}

$('#drop-zone').dropZone();


$(document).ready(function(){
  const myUrl = '//localhost/fljc/request/adminRequest.php',
  sendURL = '//localhost/fljc/request/adminSend.php',
  postURL = '//localhost/fljc/request/adminPost.php'
  var allQuote = "<?php echo $cG;?>";
    let recordsPerPage = 1,
    currentPage = 1,
    start = (currentPage * recordsPerPage) - recordsPerPage,
    search = 'default';

    const imageDir = '//localhost/fljc/upload/gallery/'

    if (allQuote > ((currentPage * recordsPerPage))) {
        $('.getMoreBTN').show();
    }


    allGallery(recordsPerPage, start, search)

function allGallery(recordsPerPage, start, search){
  $('.loading').show();
axios.get(myUrl, {
    params: {
        recordsPerPage,
        start,
        call: 'gallery',
        search
    }
  })
.then(function (response) {
  $('.loading').hide();
var serverResponse = response.data;
console.log(response)
search !== 'default' ?  $('.searchResult ').html(`${serverResponse.length} record(s) found`) :   $('.searchResult ').html(); 
$(serverResponse).each(function(index){
var output = $('<div class="col-xs-12 col-md-4"><div class="card"><img class="card-img-top" src="'+ imageDir +  serverResponse[index].image_location +'" alt="'+ serverResponse[index].image_alt +'"><div class="card-body"><h4 class="card-title">'+ serverResponse[index].image_alt +'</h4><p class="card-text">'+ serverResponse[index].image_description +'</p><div class="cardAction" data-id="'+ serverResponse[index].image_id +'"><i class="far fa-edit editImage"></i><i class="far fa-trash-alt deleteImage"></i></div></div></div></div>');
if (search === 'default') {   
output.appendTo('.contentGallery'); 
}else{
output.appendTo('.gallerySearchContent'); 
$('.gallerySearchContent p').each(function() {
//mySearchString($(this), search);
});
}
output.find('.deleteImage').click(function(){
var elem = $(this)
clickedID = elem.parent().attr('data-id')
console.log(`$ id: ${clickedID}`)

var con = confirm(`Are you sure you want to delete this Image?`)  
    if (!con) {
        return false;
    }else{
        elem.attr('disabled', 'disabled')
        axios.get(sendURL, {
    params: {
        clickedID,
        send: 'Delete Image'
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data

    if (resp === 0) {
        alert('Oops! Something went wrong. Try after some time.')
    } else if (resp === 200) {
        alert('Image deleted')
        window.location.reload(true)
    }
})
.catch(function (error) {
console.log(error);
})
    }
})

output.find('.editImage').click(function(){
    var elem = $(this)
clickedID = elem.parent().attr('data-id'),
pr = elem.parent().closest('div.card'),
imgTitle = pr.find('.card-title').html(),
imgDesc = pr.find('.card-text').html(),

console.log(`title:  ${imgTitle} Desc: ${imgDesc} id ${clickedID}`)

imgCap.val(imgTitle)
imgDes.val(imgDesc)
imageID.val(clickedID)

$('#editPixModal').modal('show')

})

});
})
.catch(function (error) {
  $('.loading').hide();
console.log(error);
})
.then(function () {
// always executed
}); 
} 

var imgCap = $('#imgCap'),
imgDes = $('#imgDes'),
imageID = $('#imageID');

var typingTimer,
doneTypingInterval = 3000;       

$('.searchInput').keyup(function(){
clearTimeout(typingTimer);
typingTimer = setTimeout(function(){
$('.gallerySearchContent').empty();     
search = $('.searchInput').val().trim();    
if (search !== '') {
$('.contentGallery').hide(); 
$('.gallerySearchContent').show(); 
allGallery(recordsPerPage, start, search)  
}else{
$('.contentGallery').show();    
$('.gallerySearchContent').hide();    
}

}, doneTypingInterval);
});

currentPage = 2;
$('.getMoreBTN').click(function(){
if (allQuote <= ((currentPage * recordsPerPage))) {
$('.getMoreBTN').hide();
} 
$('.getMoreWord').hide()
$('.getMoreLoader').show()
$('.getMoreBTN').attr('disabled', 'disabled');
start = (currentPage * recordsPerPage) - recordsPerPage;
allGallery(recordsPerPage, start, search);  
currentPage++;
$('.getMoreWord').show()
$('.getMoreLoader').hide()
$('.getMoreBTN').removeAttr('disabled');
});



var canvas  = $("#canvas"),
    context = canvas.get(0).getContext("2d"),
    $result = $('#result'),
    croppedImage = 0,
    cropper = '',
    canvasHolder = $("#canvasHolder");

$('#file').on( 'change', function(){
 cropper = canvas.cropper('destroy');
    if (this.files && this.files[0]) {
      if ( this.files[0].type.match(/^image\//) ) {
        var reader = new FileReader();
        reader.onload = function(evt) {
          img = new Image();
           img.onload = function() {
             context.canvas.height = img.height;
             context.canvas.width  = img.width;
             context.drawImage(img, 0, 0);
              cropper = canvas.cropper({
               aspectRatio: 16 / 9,
                cropBoxResizable: false,
                guides: false,
					      dragMode: 'move',
             });
             $('#btnCrop').click(function() {
                // Get a string base 64 data url
                var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/png"); 
                $result.html( $('<img>').attr('src', croppedImageDataURL) );
                croppedImage = 1;
             });
             $('#btnRestore').click(function() {
               canvas.cropper('reset');
               $result.empty();
               croppedImage = 0;
             });
           };
           img.src = evt.target.result;
				};
        reader.readAsDataURL(this.files[0]);
        $('.editImageBTN').show();
      }
      else {
        alert("Invalid file type! Please select an image file.");
      }
    }
    else {
      alert('No file(s) selected.');
    }
});



$('#addImageForm').submit(function(e){
  e.preventDefault()
  var uplImage = $('#result img'),
  imgSrc = uplImage.attr('src'),
  caption = $('#imageCaption').val().trim(),
  desc = $('#imageDes').val().trim();

  if (croppedImage === 0) {
    alert('Kindly crop the Image.')
  }else if (caption === '') {
    alert('Kindly enter Image Caption')
  } else {

    axios({
                method: "post",
                url: postURL,
                timeout: 5000, // Wait for 5 seconds
                headers: {
                    'Content-Type': 'application/json;charset=UTF-8',
                    "Access-Control-Allow-Origin": "*"
                },
                data: {
                  imgSrc,
                  caption,
                  desc,
                  send: 'Save Image'
                }
                })

.then(function (response) { console.log(response)
    var resp = response.data
    if (resp === 0) {
      alert('Kindly crop the Image.') 
    } else if (resp === 1) {
      alert('Kindly enter Image Caption')
    } else if (resp === 2) {
      alert('Oops! Something went wrong. Try after some time.');
    } else if (resp === 200) {
        alert(`Picture saved successfully`)
        window.location.reload(true)
    } 
})
.catch(function (error) {
console.log(error);
})
  }


  
})


$('#addGallery').click(function(){
  $('#canvasHolder').hide();
  $('.editImageBTN').hide();
  $(".modal [type=input], select").val('')
  $('#pixModal').modal('show')
})


$('#editImageForm').submit(function(e){
  e.preventDefault();
  var imgCapt = imgCap.val().trim(),
imgDesc = imgDes.val().trim(),
imageId = imageID.val();

if (imgCapt === '') {
  imgCap.addClass('errorClass')
} else if (imgDesc === '') {
  imgDes.addClass('errorClass')
}else{
  axios.get(sendURL, {
    params: {
      imgCapt,
      imgDesc,
      imageId,
        send: 'Edit Image'
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data

    if (resp === 0) {
      imgCap.addClass('errorClass')
    } else if (resp === 1) {
      imgDes.addClass('errorClass')
    } else if (resp === 2) {
      alert('Oops! Something went wrong. Try after some time.');
    } else if (resp === 200) {
        alert('Image Info saved successfully.')
        window.location.reload(true)
    }
})
.catch(function (error) {
console.log(error);
})
}

})

});






</script>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/includes/footer.php');?>