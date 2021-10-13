<?php require_once('../includes/nav.php');?>
<div class="quotationContent">

<div class="holderCard">
<h2>Add an Offline Car Information</h2>
<div class="addQuoteContent">
<form id="addQuoteForm">

<div class="row">
    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="carYear" required>
    <option value="">Select Car Year</option>
  </select>
</div> 
    </div>
    <div class="col-12 col-sm-4">
    <div class="form-group">
    <input type="text" name="car_brand" list="carBrand" id="car_brand" class="form-control form-control" placeholder="Enter/Select Car Brand" required>
            <datalist id="carBrand">
            <?php 
            foreach($getCars as $car){
                echo '<option value="'.$car['car_brand'].'">';
            }
            ?> 
            </datalist>
</div> 
    </div>
    <div class="col-12 col-sm-4">
    <div class="form-group">
    <input type="text" name="car_model" list="carModel" id="car_model" class="form-control form-control" placeholder="Enter/Select Car Model" required>
            <datalist id="carModel">
            </datalist>
</div> 
    </div>
    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_location" required>
    <option value="">Car Location</option>
    <option value="r">Residence</option>
    <option value="b">Business</option>
  </select>
</div> 
    </div>

    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_title" required>
    <option value="">Car Title</option>
    <option value="c">Clean</option>
    <option value="s">Salvage/Rebuilt</option>
    <option value="n">No Title</option>
  </select>
</div> 
    </div>

    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_tires" required>
    <option value="">Does the car have Tire(s)?</option>
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select>
</div> 
    </div>

    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="carFlatTires" required>
    <option value="">Does the car have any Flat tire(s)?</option>
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select>
</div> 
    </div>
    <div class="col-12 col-sm-4 ifNo" id="flatNo">
    <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Driver Front">Driver Front
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Driver Rear">Driver Rear
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Passenger Front">Passenger Front
  </label>
</div> 
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Passenger Rear">Passenger Rear
  </label>
</div> 
    </div>

    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_wheel" required>
    <option value="">Are all wheels mounted?</option>
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select>
</div> 
    </div>
    <div class="col-12 col-sm-4 ifNo" id="wheelNo">
    <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Driver Front">Driver Front
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Driver Rear">Driver Rear
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Passenger Front">Passenger Front
  </label>
</div> 
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Passenger Rear">Passenger Rear
  </label>
</div> 
    </div>

    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_key" required>
    <option value="">Does the Car have Key?</option>
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select>
</div> 
    </div>

    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_drive" required>
    <option value="">Does it drive?</option>
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select>
</div> 
    </div>

    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_engine" required>
    <option value="">What is the car Engine Status?</option>
    <option value="i">Intact Engine and Transmission</option>
    <option value="m">Some Parts are Missing</option>
    <option value="r">Engine Removed</option>
  </select>
</div> 
    </div>

    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_ext" required>
    <option value="">Is any exterior body part removed?</option>
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select>
</div> 
    </div>
    <div class="col-12 col-sm-4 ifNo" id="extNo">
    <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Driver Front">Driver Front
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Driver Rear">Driver Rear
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Passenger Front">Passenger Front
  </label>
</div> 
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Passenger Rear">Passenger Rear
  </label>
</div> 
    </div>

    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_int" required>
    <option value="">Any damaged Interior Part?</option>
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select>
</div> 
    </div>


    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_body" required>
    <option value="">Is any Body Part damaged?</option>
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select>
</div> 
    </div>
    <div class="col-12 col-sm-4 ifNo" id="bodyNo">
    <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Driver Front">Driver Front
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Driver Rear">Driver Rear
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Passenger Front">Passenger Front
  </label>
</div> 
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Passenger Rear">Passenger Rear
  </label>
</div> 
    </div>

    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_flood" required>
    <option value="">Any Flood damages?</option>
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select>
</div> 
    </div>


    <div class="col-12 col-sm-4">
    <div class="form-group">
  <select class="form-control" id="car_mirror" required>
    <option value="">Is any Mirror, Light or Glass Damaged?</option>
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select>
</div> 
    </div>
    <div class="col-12 col-sm-4 ifNo" id="mirrorNo">
    <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Driver Front">Driver Front
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Driver Rear">Driver Rear
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Passenger Front">Passenger Front
  </label>
</div> 
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Passenger Rear">Passenger Rear
  </label>
</div> 
    </div>
    <div class="col-12 col-sm-4">
    <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Car Mileage" id="carMileage">
    <div class="input-group-append">
      <span class="input-group-text">,000</span>
    </div>
  </div>
    </div>
    <div class="col-12 col-sm-4">
    <input type="text" class="form-control" placeholder="Quantity(ies)" id="carQty"/>
  </div>

</div>


<fieldset class="border p-3">
    <legend  class="w-auto">Contact Information</legend>

    <div class="row">
    <div class="col-12 col-sm-6">
    <input type="text" class="form-control" placeholder="Owner's Name" id="contactName" required/>
  </div>
  <div class="col-12 col-sm-6">
    <input type="email" class="form-control" placeholder="Owner's Email" id="contactEmail" required/>
  </div>
  <div class="col-12 col-sm-6">
    <input type="text" class="form-control" placeholder="Owner's Phone" id="contactPhone" required/>
  </div>
  <div class="col-12 col-sm-6">
    <input type="text" class="form-control" placeholder="Owner's Zip Code" id="contactZip"/>
  </div>
    </div>


</fieldset>

<div class="row">
<div class="col-12 col-sm-4">
<button class="btn submitAD" type="submit">Save <i class="fas fa-check"></i> <i class="spinner-grow text-muted spinner-grow-sm loader"></i></button>
</div>  
</div>
</form>
</div>
</div>
<style type="text/css">
</style>
<script type="text/javascript">
$(document).ready(function(){
const getURL = '//localhost/fljc/request/adminRequest.php',
sendURL = '//localhost/fljc/request/adminSend.php';
var thisYear = new Date().getFullYear();
for (i = 1960; i <= thisYear;  i++)
{
$('#carYear').append($('<option />').val(i).html(i));
} 

var typingTimer,
doneTypingInterval = 2000;       

$('#car_brand').change(function(){
$('#car_model').attr("placeholder", "Loading Car Models");    
clearTimeout(typingTimer);
typingTimer = setTimeout(function(){
    var brand = $('#car_brand').val().trim()
axios.get(getURL, {
params: {
brand,
call: 'Get Model'
}
})
.then(function (response) { 
var resp = response.data
$('#car_model').attr("placeholder", "Enter/Select Car Model"); 
for (i = 0; i < resp.length;  i++)
{
    $('#carModel').append($('<option />').val(resp[i].car_model));
}
})
.catch(function (error) {
console.log(error);
}) 

}, doneTypingInterval);
});


openNo = (div, show, par) => {
    div.change(function(){
        var val = div.val().trim()
        if (val === par) {
            show.show();
        }
    })
}
openNo($('#carFlatTires'), $('#flatNo'), 'y');
openNo($('#car_mirror'), $('#mirrorNo'), 'y');
openNo($('#car_body'), $('#bodyNo'), 'y');
openNo($('#car_wheel'), $('#wheelNo'), 'n');
openNo($('#car_ext'), $('#extNo'), 'y');

popCheck = (select, popHolder, pop, arg) => {
  if (select === arg) {
    $(popHolder + ' input[type="checkbox"]:checked').each(function(i,v){
    pop.push($(v).val());
});
  }
}


$('#addQuoteForm').submit(function(e){
    e.preventDefault()
    var flatNo = [], mirrorNo = [], bodyNo = [], wheelNo = [], extNo = [],
    car_year = $('#carYear').val().trim(),
    car_brand = $('#car_brand').val().trim(),
    car_model = $('#car_model').val().trim(),
    car_location = $('#car_location').val().trim(),
    car_title = $('#car_title').val().trim(),
    carFlatTires = $('#carFlatTires').val().trim(),
    car_wheel = $('#car_wheel').val().trim(),
    car_key = $('#car_key').val().trim(),
    car_drive = $('#car_drive').val().trim(),
    car_engine = $('#car_engine').val().trim(),
    car_ext = $('#car_ext').val().trim(),
    car_int = $('#car_int').val().trim(),
    car_body = $('#car_body').val().trim(),
    car_mirror = $('#car_mirror').val().trim(),
    carMileage = $('#carMileage').val().trim(),
    contactName = $('#contactName').val().trim(),
    contactEmail = $('#contactEmail').val().trim(),
    contactPhone = $('#contactPhone').val().trim(),
    contactZip = $('#contactZip').val().trim(),
    carQty = $('#carQty').val().trim(),
    car_tires = $('#car_tires').val().trim(),
    car_flood = $('#car_flood').val().trim();

    console.log(`Year: ${car_year} brand: ${car_brand} model: ${car_model} location: ${car_location} title: ${car_title} flattire: ${carFlatTires} wheel: ${car_wheel} key: ${car_key} drive: ${car_drive} engine: ${car_engine} ext: ${car_ext} int: ${car_int} body: ${car_body} mirror: ${car_mirror} mile: ${carMileage} name: ${contactName} email: ${contactEmail} phone: ${contactPhone} zip: ${contactZip} `)

    popCheck(carFlatTires, ('#flatNo'), flatNo, 'y')
    popCheck(car_wheel, ('#wheelNo'), wheelNo, 'n')
    popCheck(car_ext, ('#extNo'), extNo, 'y')
    popCheck(car_body, ('#bodyNo'), bodyNo, 'y')
    popCheck(car_mirror, ('#mirrorNo'), mirrorNo, 'y')

    if (car_year === '') {
      $('#carYear').addClass('errorClass')
    }else if (car_brand === '') {
      $('#car_brand').addClass('errorClass')
    }else if (car_model === '') {
      $('#car_model').addClass('errorClass')
    }else if (car_location === '') {
      $('#car_location').addClass('errorClass')
    }else if (car_title === '') {
      $('#car_title').addClass('errorClass')
    }else if (car_tires === '') {
      $('#car_tires').addClass('errorClass')
    }else if (carFlatTires === '' ) {
      $('#carFlatTires').addClass('errorClass')
    }else if (car_wheel === '' ) {
      $('#car_wheel').addClass('errorClass')
    }else if (car_key === '') {
      $('#car_key').addClass('errorClass')
    }else if (car_drive === '') {
      $('#car_drive').addClass('errorClass')
    }else if (car_engine === '') {
      $('#car_engine').addClass('errorClass')
    }else if (car_ext === '' ) {
      $('#car_ext').addClass('errorClass')
    }else if (car_int === '') {
      $('#car_int').addClass('errorClass')
    }else if (car_body === '' ) {
      $('#car_body').addClass('errorClass')
    }else if (car_flood === '' ) {
      $('#car_flood').addClass('errorClass')
    }else if (car_mirror === '') {
      $('#car_mirror').addClass('errorClass')
    }else if (contactName === '') {
      $('#contactName').addClass('errorClass')
    }else if (contactEmail === '') {
      $('#contactEmail').addClass('errorClass')
    }else if (contactPhone === '') {
      $('#contactPhone').addClass('errorClass')
    }else if (carQty === '') {
      $('#carQty').addClass('errorClass')
    }else{
      if (carFlatTires === 'y') {
      carFlatTires = flatNo
    }

    if (car_wheel === 'n') {
      car_wheel = wheelNo
    }

    if (car_ext === 'y') {
      car_ext = extNo
    }

    if (car_body === 'y') {
      car_body = bodyNo
    }

    if (car_mirror === 'y') {
      car_mirror = mirrorNo
    }

    axios.get(sendURL, {
    params: {
      car_year, car_brand, car_model, car_location, car_title, carFlatTires, car_wheel, car_key, car_drive, car_engine, car_ext, car_int, car_body, car_mirror, carMileage, contactName, contactEmail, contactPhone, contactZip, carQty, car_tires,car_flood,
      send: 'Save New Quote',
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data
    if (resp === 0) {
      $('#carYear').addClass('errorClass')
    }else if (resp === 1) {
      $('#car_brand').addClass('errorClass')
    }else if (resp === 2) {
      $('#car_model').addClass('errorClass')
    }else if (resp === 3) {
      $('#car_location').addClass('errorClass')
    }else if (resp === 4) {
      $('#car_title').addClass('errorClass')
    }else if (resp === 17) {
      $('#car_tires').addClass('errorClass')
    }else if (resp === 5 ) {
      $('#carFlatTires').addClass('errorClass')
    }else if (resp === 6 ) {
      $('#car_wheel').addClass('errorClass')
    }else if (resp === 7) {
      $('#car_key').addClass('errorClass')
    }else if (resp === 8) {
      $('#car_drive').addClass('errorClass')
    }else if (resp === 9) {
      $('#car_engine').addClass('errorClass')
    }else if (resp === 10 ) {
      $('#car_ext').addClass('errorClass')
    }else if (resp === 11) {
      $('#car_int').addClass('errorClass')
    }else if (resp === 12 ) {
      $('#car_body').addClass('errorClass')
    }else if (resp === 18 ) {
      $('#car_flood').addClass('errorClass')
    }else if (resp === 13) {
      $('#car_mirror').addClass('errorClass')
    }else if (resp === 14) {
      $('#contactName').addClass('errorClass')
    }else if (resp === 15) {
      $('#contactEmail').addClass('errorClass')
    }else if (resp === 16) {
      $('#contactPhone').addClass('errorClass')
    }else if (resp === 19) {
      $('#carQty').addClass('errorClass')
    }else if (resp === 20) {
      alert('Oops! Something went wrong. Try after some time.');
    }else if (resp === 200) {
      alert("Quote Saved.")
      $('#addQuoteForm').trigger('reset');
    }
})
.catch(function (error) {
console.log(error);
})
    }
})


})
</script>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/includes/footer.php');?>