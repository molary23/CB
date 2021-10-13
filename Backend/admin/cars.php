<?php require_once('../includes/nav.php');?>
<div class="quotationContent">

<div class="holderCard">
    <h1>All <em><?php echo $countC; ?></em>  Cars</h1>
    <div class="searchTop">
    <div class="row">
        <div class="col-12 col-sm-3">
        <input type="text" name="car" list="carBrand" class="form-control form-control searchInput" placeholder="Filter by Car Brand Name...">
            <datalist id="carBrand">
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
            <button type="submit" class="btn downloadCSV" name="carsCSV"><i class="fas fa-file-csv"></i></button>
            <button type="submit" class="btn downloadPDF" name="carsPDF"><i class="far fa-file-pdf"></i></button>
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
        <button class="btn btn-light btn-sm addNewBTN" data-toggle="modal" data-target="#carModal">Add New <i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
</div>

<div class="tableSection">
<div class="table-responsive">    
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>S/N</th> 	 
<th>Car Name</th>  
<th>Car Model</th>  
<th>Car year</th>  
<th>Car Revised Year</th>  
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


<div class="modal fade" id="carModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add a New Car</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="addNewCar">
       <p class="addError"></p>
      <form action="#" id="addCarForm">

        <select class="form-control searchInput" id="addCarYear" required>
        <option value="">Select Car Year</option>
        </select>

        <select class="form-control searchInput" id="addCarRemodel">
        <option value="">Select Car Remodeled Year</option>
        </select>

      <input type="text" name="car" list="carBrand" id="addCarBrand" class="form-control form-control searchInput" placeholder="Car Brand" required maxlength="10" minlength="2">
            <datalist id="carBrand">
            <?php 
            foreach($getCars as $car){
                echo '<option value="'.$car['car_brand'].'">';
            }
            ?> 
            </datalist>
            <input type="text" class="form-control form-control searchInput" placeholder="Car Model" id="addCarModel" required maxlength="20" minlength="2">
            <input type="text" class="form-control form-control searchInput" placeholder="Car Status" id="addCarStatus" required value="new">
        <button class="btn submitAD" type="submit">Add Car <i class="fas fa-check"></i> <i class="spinner-grow text-muted spinner-grow-sm loader"></i></button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
</style>


<script type="text/javascript">

checkYear = (year) => {
    var yr
    if (year) {
        yr = year 
    }else{
        yr = '-'
    }
    return yr
}

$(document).ready(function(){

    $('.addNewBTN').click(function(){
    $("#modal [type=input], select").val('')
    tS.val('new')
    $('#testModal').modal('show')

})

    var addYear = $('#addCarYear'),
    addRemodelYear = $('#addCarRemodel'),
    addBrand = $('#addCarBrand'),
    addModel = $('#addCarModel'),
    addStatus = $('#addCarStatus')

var thisYear = new Date().getFullYear();
for (i = 1960; i <= thisYear;  i++)
{
$('#addCarYear, #addCarRemodel').append($('<option />').val(i).html(i));
} 



$('#addCarForm').submit(function(e){
    e.preventDefault()
    var carYear = addYear.val().trim(),
    carRemodelYear = addRemodelYear.val().trim(),
    carBrand = addBrand.val().trim(),
    carModel = addModel.val().trim()
    carStatus = addStatus.val().trim()

    if (carYear === '') {
        $('.addError').html('Kindly select the year the Car was manufactured')
    } else if (carBrand === '') {
        $('.addError').html('Kindly select/enter the Car Brand')
    } else if (carModel === '') {
        $('.addError').html('Kindly enter the model of the Car')
    } else {
        console.log(`Year: ${carYear} RYear: ${carRemodelYear} Brand: ${carBrand} Model: ${carModel}`)

        axios.get(sendURL, {
    params: {
        carYear,
        carRemodelYear,
        carBrand,
        carModel,
        carStatus,
        send: 'Car',
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data

    if (resp === 0) {
        $('.addError').html('Kindly select the year the Car was manufactured')
    } else if (resp === 1) {
        $('.addError').html('Kindly select/enter the Car Brand')
    } else if (resp === 2) {
        $('.addError').html('Kindly enter the model of the Car')
    } else if (resp === 3) {
        $('.addError').html('Car already exist in the Car List')
    }  else if (resp === 200) {
        alert(`${carBrand} ${carModel} has been added to the car list`)
        window.location.reload(true)
    } 
})
.catch(function (error) {
console.log(error);
})
    }
})


  const myUrl = '//localhost/fljc/request/adminRequest.php',
  sendURL = '//localhost/fljc/request/adminSend.php';
  var allCarsCount = "<?php echo $cC;?>";
    let recordsPerPage = 200,
    currentPage = 1,
    //numberOfPages = Math.ceil(allQuote / recordsPerPage),
    start = (currentPage * recordsPerPage) - recordsPerPage,
    search = 'default';

console.log(allCarsCount)
    if (allCarsCount > ((currentPage * recordsPerPage))) {
        $('.getMoreBTN').show();
    }


    allCars(recordsPerPage, start, search)

function allCars(recordsPerPage, start, search){
    $('.loading').show();
axios.get(myUrl, {
    params: {
        recordsPerPage,
        start,
        call: 'cars',
        search
    }
  })
.then(function (response) {
    $('.loading').hide();
var serverResponse = response.data;
search !== 'default' ?  $('.searchResult ').html(`${serverResponse.length} record(s) found`) :   $('.searchResult ').html(); 
$(serverResponse).each(function(index){
var output = $('<tr><td></td><td><p class="">'+ serverResponse[index].car_brand +'</p></td><td><p class="">'+ serverResponse[index].car_model  +'</p></td><td><p class="">'+ serverResponse[index].car_year  +'</p></td><td><p class="">'+ checkYear(serverResponse[index].car_remodel_year)  +'</p></td><td><div class="action" data-id="'+ serverResponse[index].car_id  +'"><button class="btn btn-danger btn-sm deleteCar"  title="Delete Car">Delete <i class="far fa-trash-alt"></i></button><button class="btn btn-info btn-sm editCar" title="Edit Car" >Edit <i class="far fa-edit"></i></button></td></tr>');
if (search === 'default') {   
output.appendTo('.normalTableBody'); 
}else{
output.appendTo('.searchTableBody'); 
$('.searchTableBody p').each(function() {
//mySearchString($(this), search);
});
}
output.find('.deleteCar').click(function(){
var elem = $(this)
clickedID = elem.parent().attr('data-id')
pr = elem.parent().closest('tr'),
carB = pr.find('td:nth-child(2) p').html()
carM = pr.find('td:nth-child(3) p').html()

var con = confirm(`Are you sure you want to delete ${carB} ${carM}`)  
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
$('.loading').hide();
console.log(error);
})
    }
})

output.find('.editCar').click(function(){
    var elem = $(this)
clickedID = elem.parent().attr('data-id'),
pr = elem.parent().closest('tr'),
carB = pr.find('td:nth-child(2) p').html()
carM = pr.find('td:nth-child(3) p').html()
carY = pr.find('td:nth-child(4) p').html()
carRY = pr.find('td:nth-child(5) p').html()
console.log(`car brand ${carB}, car model: ${carM} car year ${carY}, car model year: ${carRY}`)
addYear.val(carY)
addRemodelYear.val(carRY)
addBrand.val(carB)
addModel.val(carM)
addStatus.val(clickedID)

$('#carModal').modal('show')

})

});
})
.catch(function (error) {
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
allCars(recordsPerPage, start, search)  
}else{
$('.normalTableBody').show();    
$('.searchTableBody').hide();    
}

}, doneTypingInterval);
});

currentPage = 2;
$('.getMoreBTN').click(function(){
if (allCarsCount <= ((currentPage * recordsPerPage))) {
$('.getMoreBTN').hide();
} 
$('.getMoreWord').hide()
$('.getMoreLoader').show()
$('.getMoreBTN').attr('disabled', 'disabled');
start = (currentPage * recordsPerPage) - recordsPerPage;
allCars(recordsPerPage, start, search);  
currentPage++;
$('.getMoreWord').show()
$('.getMoreLoader').hide()
$('.getMoreBTN').removeAttr('disabled');
});

});
</script>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/includes/footer.php');?>