<?php require_once('../includes/nav.php');?>
<div class="quotationContent">

<div class="holderCard">
    <h1>All <em><?php echo $countQ; ?></em> Quotations</h1>
    <div class="searchTop">
    <div class="row">
        <div class="col-12 col-sm-3">
        <input type="text" name="car" list="carBrand" class="form-control form-control searchInput" placeholder="Filter by Car Brand Name...">
            <datalist id="carBrand">
            <option value="Offline">
            <option value="Online">
            <option value="Read">
            <option value="Unread">
            <?php 
            foreach($getCars as $car){
                echo '<option value="'.$car['car_brand'].'">';
            }
            foreach($getCars2 as $car){
                echo '<option value="'.$car['car_model'].'">';
            }
            ?> 
            </datalist>
        </div>
        <div class="col-12 col-sm-3">
            <div class="download">
            <div class="btn-group">
            <form action="//localhost/fljc/down/download.php" method="post">
            <button type="button" class="btn" disabled><i class="fas fa-download"></i> Download</button>    
            <button type="submit" class="btn downloadCSV" name="quoteCSV"><i class="fas fa-file-csv"></i></button>
            <button type="submit" class="btn downloadPDF" name="quotePDF"><i class="far fa-file-pdf"></i></button>
            </form>
            </div> 
            </div>
        </div>
        <div class="col-12 col-sm-2">
        <div class="loading">Loading... <div class="spinner-border text-muted spinner-border-sm"></div>
            </div>
        </div>
        <div class="col-12 col-sm-2">
            <span class="searchResult"></span>
        </div>
        <div class="col-12 col-sm-2">
        <a type="button" class="btn btn-light btn-sm addNewBTN" href="//localhost/fljc/admin/addquote.php">Add New <i class="fas fa-plus-circle"></i></a>
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
<th>Email</th>  
<th>Phone</th>  
<th>Car Name</th>  
<th>Car Model</th>  
<th>Car year</th>  
<th>Quote Status</th> 
<th>Action</th>  
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
quoteStatus = (status) => {
    var stat
    if (status === 'n') {
        stat = 'NEW'
    }else if (status === 'q') {
        stat = 'QUOTED'
    }else if (status === 'd') {
        stat = 'DEAL'
    }
    return stat
}


$(document).ready(function(){
  var myUrl = '//localhost/fljc/request/adminRequest.php',
  allQuote = "<?php echo $cQ;?>";
    let recordsPerPage = 1,
    currentPage = 1,
    //numberOfPages = Math.ceil(allQuote / recordsPerPage),
    start = (currentPage * recordsPerPage) - recordsPerPage,
    search = 'default';

    if (allQuote > ((currentPage * recordsPerPage))) {
        $('.getMoreBTN').show();
    }


    allQuotation(recordsPerPage, start, search)

function allQuotation(recordsPerPage, start, search){
    $('.loading').show();
axios.get(myUrl, {
    params: {
        recordsPerPage,
        start,
        call: 'quote',
        search
    }
  })
.then(function (response) {
    $('.loading').hide();
var serverResponse = response.data;
search !== 'default' ?  $('.searchResult ').html(`${serverResponse.length} record(s) found`) :   $('.searchResult ').html(); 
$(serverResponse).each(function(index){console.log(serverResponse)
var output = $('<tr><td></td><td><p class="capName">'+ serverResponse[index].contact_name +'</p></td><td><p class="">'+ serverResponse[index].contact_email +'</p></td><td><p class="">'+ serverResponse[index].contact_phone +'</p></td><td><p class="">'+ serverResponse[index].car_brand +'</p></td><td><p class="">'+ serverResponse[index].car_model  +'</p></td><td><p class="">'+ serverResponse[index].car_year  +'</p></td><td><p class="">'+ quoteStatus(serverResponse[index].quote_status)  +'</p></td><td><a type="button" class="btn btn-primary btn-sm" href="quotation.php?quo='+ serverResponse[index].quotation_id  +'" title="View Students">View</a></td></tr>');
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
allQuotation(recordsPerPage, start, search)  
}else{
$('.normalTableBody').show();    
$('.searchTableBody').hide();    
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
allQuotation(recordsPerPage, start, search);  
currentPage++;
$('.getMoreWord').show()
$('.getMoreLoader').hide()
$('.getMoreBTN').removeAttr('disabled');
});


});
</script>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/includes/footer.php');?>