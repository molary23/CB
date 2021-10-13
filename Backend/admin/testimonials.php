<?php require_once('../includes/nav.php');?>
<div class="testimonyContent">

<div class="holderCard">
    <h1>All <em><?php echo $countTe; ?></em> Testimonials</h1>
    <div class="searchTop">
    <div class="row">
        <div class="col-12 col-sm-4">
            <input type="text" class="form-control form-control searchInput" placeholder="Enter your Search Keywords here...">
        </div>
        <div class="col-12 col-sm-3">
        <span class="searchResult"></span>
        </div>
        <div class="col-12 col-sm-3">
        <div class="loading">Loading... <div class="spinner-border text-muted spinner-border-sm"></div>
            </div>
        </div>
        <div class="col-12 col-sm-2">
        <button class="btn btn-light btn-sm addNewBTN">Add New <i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
</div>

<div class="cardSection">
<div class="testContents"></div>
<div class="searchTestContents"></div>
<div class="viewMore">
<button class="btn btn-light btn-sm getMoreBTN"><span class="getMoreWord">More</span> <i class="spinner-border text-muted spinner-border-sm getMoreLoader loader"></i></button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="testModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add a New Testimony</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="addNewTest">
       <p class="addError"></p>
      <form action="#" id="addTestForm">
      <input type="text" name="testName" id="testName" class="form-control form-control searchInput" placeholder="Testifier's Name" required minlength="3" maxlength="20">
      <input type="text" name="testChannel" id="testChannel" class="form-control form-control searchInput" placeholder="Testimony Channel" required maxlength="10" minlength="3">
      <input type="hidden" name="testStatus" id="testStatus" class="form-control form-control searchInput" placeholder="Testimony Status">
        <textarea  name="testimony" id="testimony" class="form-control form-control searchInput" placeholder="Testimony" rows="4" maxlength="250" minlength="20"></textarea>
        <button class="btn submitAD" type="submit">Add Testimony <i class="fas fa-check"></i> <i class="spinner-grow text-muted spinner-grow-sm loader"></i></button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){
    const myUrl = '//localhost/fljc/request/adminRequest.php',
  sendURL = '//localhost/fljc/request/adminSend.php';
  var allQuote = "<?php echo $cTe;?>";
    let recordsPerPage = 3,
    currentPage = 1,
    start = (currentPage * recordsPerPage) - recordsPerPage,
    search = 'default';

    if (allQuote > ((currentPage * recordsPerPage))) {
        $('.getMoreBTN').show();
    }

    allTestimony(recordsPerPage, start, search)

function allTestimony(recordsPerPage, start, search){
    $('.loading').show();
axios.get(myUrl, {
    params: {
        recordsPerPage,
        start,
        call: 'testimonials',
        search
    }
  })
.then(function (response) {
    $('.loading').hide();
var serverResponse = response.data;
search !== 'default' ?  $('.searchResult ').html(`${serverResponse.length} record(s) found`) :   $('.searchResult ').html(); 
$(serverResponse).each(function(index){
var output = $('<div class="card"><div class="card-header"><p>'+ serverResponse[index].test_name +'</p><time>'+ serverResponse[index].t_date +'</time></div><div class="card-body">'+ serverResponse[index].test_content +'</div><div class="card-footer"><div class="row"><div class="col-sm-6 col-12 testChannel">'+ serverResponse[index].test_channel +'</div><div class="col-sm-6 col-12 cardAction" data-id="'+ serverResponse[index].test_id +'"><i class="far fa-edit editTest" data-action="EditTest"></i><i class="far fa-trash-alt deleteTest" data-action="DeleteTest"></i></div></div></div></div>');
if (search === 'default') {   
output.appendTo('.testContents'); 
}else{
output.appendTo('.searchTestContents'); 
$('.searchTestContents p').each(function() {
//mySearchString($(this), search);
});
}

output.find('.deleteTest').click(function(){
var elem = $(this)
clickedID = elem.parent().attr('data-id')
pr = elem.parent().closest('div.card'),
testN = pr.find('div.card-header p').html()

var con = confirm(`Are you sure you want to delete ${testN}'s Testimony`)  
    if (!con) {
        return false;
    }else{
        elem.attr('disabled', 'disabled')
        axios.get(sendURL, {
    params: {
        clickedID,
        send: 'Delete Car'
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data

    if (resp === 0) {
        alert('Oops! Something went wrong. Try after some time.')
    } else if (resp === 200) {
        alert('Car deleted')
        window.location.reload(true)
    }
})
.catch(function (error) {
console.log(error);
})
    }
})

output.find('.editTest').click(function(){
    var elem = $(this)
clickedID = elem.parent().attr('data-id'),
pr = elem.parent().closest('div.card'),
testN = pr.find('div.card-header p').html(),
testB = pr.find('div.card-body').html(),
testC = pr.find('div.testChannel').html()
console.log(testN)

tN.val(testN)
tM.val(testB)
tS.val(clickedID)
tC.val(testC)

$('#carModal').modal('show')

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


var typingTimer,
doneTypingInterval = 3000;       

$('.searchInput').keyup(function(){
clearTimeout(typingTimer);
typingTimer = setTimeout(function(){
$('.searchTestContents').empty();     
search = $('.searchInput').val().trim();    
if (search !== '') {
$('.testContents').hide(); 
$('.searchTestContents').show(); 
allTestimony(recordsPerPage, start, search)  
}else{
$('.testContents').show();    
$('.searchTestContents').hide();    
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
allTestimony(recordsPerPage, start, search);  
currentPage++;
$('.getMoreWord').show()
$('.getMoreLoader').hide()
$('.getMoreBTN').removeAttr('disabled');
});


    var tN = $('#testName'),
    tC =$('#testChannel'),
    tM = $('#testimony'),
    tS = $('#testStatus');


$('.addNewBTN').click(function(){
    $("#modal [type=input], select").val('')
    tS.val('new')
    $('#testModal').modal('show')

})


$('#addTestForm').submit(function(e){
    e.preventDefault()
    var testName = tN.val().trim(),
    testChannel = tC.val().trim(),
    testimony = tM.val().trim(),
    testStat = tS.val().trim()
    var res;
    if (testStat === 'new') {
        res = `${testName}'s testimony has been added to the list`
    }else{
        res = `${testName}'s testimony has been edited`
    }
    if (testName === '') {
        $('.addError').html('Kindly enter the Testifier\'s Name')
    } else if (testChannel === '') {
        $('.addError').html('Kindly enter the Testimony\'s Channel')
    } else if (testimony === '') {
        $('.addError').html('Kindly enter the Testimony')
    } else {
        console.log(`Year: ${testName} RYear: ${testChannel} Brand: ${testimony}`)

        axios.get(sendURL, {
    params: {
        testName,
        testChannel,
        testimony,
        testStat,
        send: 'Testimony'
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data

    if (resp === 0) {
        $('.addError').html('Kindly enter the Testifier\'s Name')
    } else if (resp === 1) {
        $('.addError').html('Kindly enter the Testimony\'s Channel')
    } else if (resp === 2) {
        $('.addError').html('Kindly enter the Testimony')
    } else if (resp === 200) {
        alert(res)
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