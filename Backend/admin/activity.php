<?php require_once('../includes/nav.php');?>
<div class="quotationContent">

<div class="holderCard ">
    <h1>All Users' activities</h1>
    <div class="searchTop">
    <div class="row">
        <div class="col-12 col-sm-3">
        <input type="text" name="userAct" class="form-control form-control searchInput" placeholder="Filter by User Name...">
        </div>
        <div class="col-12 col-sm-3">
            <div class="download">
            <div class="btn-group">
            <form action="//localhost/fljc/down/download.php" method="post">
            <button type="button" class="btn" disabled><i class="fas fa-download"></i> Download</button>    
            <button type="submit" class="btn downloadCSV" name="logCSV"><i class="fas fa-file-csv"></i></button>
            <button type="submit" class="btn downloadPDF" name="logPDF"><i class="far fa-file-pdf"></i></button>
            </form>
            </div> 
            </div>
        </div>
        <div class="col-12 col-sm-3">
        <div class="loading">Loading... <div class="spinner-border text-muted spinner-border-sm"></div>
            </div>
        </div>
        <div class="col-12 col-sm-3">
            <span class="searchResult"></span>
        </div>
    </div>
</div>

<div class="tableSection">
<div class="table-responsive">    
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>S/N</th> 	
<th>Name</th>   	
<th>Activity</th>  
<th>Time</th>  
</tr>
</thead>
<tbody class="normalTableBody">
</tbody>
<tbody class="searchTableBody">
</tbody>
</table> 
<div class="viewMore">
<button class="btn btn-light btn-sm getMoreBTN"><span class="getMoreWord">More</span> <i class="spinner-border text-muted spinner-border-sm getMoreLoader loader"></i></button>
</div>
</div>
</div>
</div>
</div>
<style type="text/css">
</style>
<script type="text/javascript">
checkAct = (act) => {
var action  
if (act === 'l') {
    action = 'Logged in' 
} else if (act === 'q') {
    action = 'Sent Quotation' 
} else if (act === 'a') {
    action = 'Added a user' 
} else if (act === 'd') {
    action = 'Entered Deal Price' 
} else if (act === 'r') {
    action = 'Sent Reset Password' 
}   else if (act === 'p'){
    action = 'Recover Password' 
}else if (act === 't') {
    action = 'Deleted a User' 
} else if (act === 'e') {
    action = 'Edit User' 
} else if (act === 'c') {
    action = 'Deleted a Quote' 
} else if (act === 'n') {
    action = 'Change Password' 
}
return action
}

$(document).ready(function(){
  var myUrl = '//localhost/fljc/request/adminRequest.php',
  allLog = "<?php echo $cL;?>";
    let recordsPerPage = 200,
    currentPage = 1,
    start = (currentPage * recordsPerPage) - recordsPerPage,
    search = 'default';

    if (allLog > ((currentPage * recordsPerPage))) {
        $('.getMoreBTN').show();
    }


    allLogs(recordsPerPage, start, search)

function allLogs(recordsPerPage, start, search){
    $('.loading').show();
axios.get(myUrl, {
    params: {
        recordsPerPage,
        start,
        call: 'activity',
        search
    }
  })
.then(function (response) {
    $('.loading').hide();
var serverResponse = response.data;
console.log(response)
search !== 'default' ?  $('.searchResult').html(`${serverResponse.length} record(s) found`) :   $('.searchResult ').html(); 
$(serverResponse).each(function(index){
var output = $('<tr><td></td><td><p class="capName">'+ serverResponse[index].user_name +'</p></td><td><p class="">'+ checkAct(serverResponse[index].user_action)  +'</p></td><td><time class="">'+ serverResponse[index].a_time  +'</time></td></tr>');
if (search === 'default') {   
output.appendTo('.normalTableBody'); 
}else{
output.appendTo('.searchTableBody'); 
$('.searchTableBody p').each(function() {
mySearchString($(this), search);
});
}
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
$('.searchTableBody').empty();     
search = $('.searchInput').val().trim();    
if (search !== '') {
$('.normalTableBody').hide(); 
$('.searchTableBody').show(); 
allLogs(recordsPerPage, start, search)  
}else{
$('.normalTableBody').show();    
$('.searchTableBody').hide();    
}

}, doneTypingInterval);
});

currentPage = 2;
$('.getMoreBTN').click(function(){
if (allLog <= ((currentPage * recordsPerPage))) {
$('.getMoreBTN').hide();
} 
$('.getMoreWord').hide()
$('.getMoreLoader').show()
$('.getMoreBTN').attr('disabled', 'disabled');
start = (currentPage * recordsPerPage) - recordsPerPage;
allLogs(recordsPerPage, start, search);  
currentPage++;
$('.getMoreWord').show()
$('.getMoreLoader').hide()
$('.getMoreBTN').removeAttr('disabled');
});

});
</script>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/includes/footer.php');?>