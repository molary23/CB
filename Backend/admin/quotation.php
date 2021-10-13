<?php require_once('../includes/nav.php');

if (isset($_GET['quo'])) {
    $quote_id = $_GET['quo'];
    
    
    $sqlCheck = $connect -> query("SELECT * FROM transactions WHERE quote_id = '$quote_id' LIMIT 1");
    $checkT = $sqlCheck -> rowCount();    
    if ($checkT > 0) {
    $sql = $connect -> query("SELECT q.*, t.* FROM quotation q INNER JOIN transactions t ON q.quotation_id = t.quote_id WHERE q.quotation_id = '$quote_id'");
    }else{
    $sql = $connect -> query("SELECT * FROM quotation WHERE quotation_id = '$quote_id'");   
    }

    $getQuote = $sql -> fetch(PDO::FETCH_ASSOC);
   // echo json_encode($getQuote);

    $car_brand = $getQuote['car_brand'];
    $car_year = $getQuote['car_year'];
    $car_model = $getQuote['car_model'];
    $car_location = $getQuote['car_location'];
    $car_title = $getQuote['car_title'];
    $car_tires = $getQuote['car_tires'];
    $car_flat_tires = $getQuote['car_flat_tires'];
    $car_key = $getQuote['car_key'];
    $car_wheel = $getQuote['car_wheel'];
    $car_engine = $getQuote['car_engine'];
    $car_drive = $getQuote['car_drive'];
    $car_exterior = $getQuote['car_exterior'];
    $car_mileage = $getQuote['car_mileage'];
    $car_interior = $getQuote['car_interior'];
    $contact_zip = $getQuote['contact_zip'];
    $quote_time = $getQuote['quote_time'];
    $quote_qty = $getQuote['quote_qty'];
    $quote_origin = $getQuote['quote_origin'];
    $quote_price = @$getQuote['quote_price'];
    $quote_status = $getQuote['quote_status'];
    $deal_price = @$getQuote['deal_price'];
    $quote_who = @$getQuote['quote_who'];
    $deal_who = @$getQuote['deal_who'];
    $quote_date = @$getQuote['quote_date'];
    $deal_date = @$getQuote['deal_date'];
    $transaction_client = @$getQuote['transaction_client'];
    $contact_name = $getQuote['contact_name'];
    $contact_email = $getQuote['contact_email'];
    $contact_phone = $getQuote['contact_phone'];
    $car_mirror = $getQuote['car_mirror'];
    $car_flood = $getQuote['car_flood'];
    $car_body = $getQuote['car_body'];


    function checkYes($val){
      if (@$val === 'y') {
            echo 'Yes';
        }elseif (@$val === 'n') {
            echo 'No';
        }
    }

    function checkYesArray($val){
      if (@$val === 'y') {
            echo 'Yes';
        }elseif (@$val === 'n') {
            echo 'No';
        }else{
              echo @$val;
        }
    }

    function getUser($val, $connect){
      $sql = $connect -> query("SELECT user_name FROM user_info WHERE user_id = '$val' LIMIT 1");
      $check = $sql -> rowCount();

      if ($check >= 1) {
      $getUser = $sql -> fetch(PDO::FETCH_ASSOC);
      $username = $getUser['user_name'];
      }else{
            $username = '';    
      }
      echo ucwords($username);
    }

    function changeDate($date){
          if (!empty($date)) {
            $date = date_create(@$date);
            echo date_format($date,"h:i A, D F jS, Y");
          }
    }
}else{
    //redirect and die
}

?>
<div class="quoteContent">

<div class="holdCard">
    <div class="carInfoContent">
    <h1>Quotation Information</h1>
    <fieldset class="border p-3">
    <legend  class="w-auto">Car Information</legend>
    <div class="row">
        <div class="col-12 col-sm-4">
        <label for="cName">Car Brand:</label>
  <p class="" id=""><?php echo @$car_brand;?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Car Model:</label>
  <p class="" id=""><?php echo @$car_model;?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Year of Manufacture:</label>
  <p class="" id=""><?php echo @$car_year;?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Car Title:</label>
  <p class="" id=""><?php 
      if (@$car_title === 'c') {
            echo 'Clean';
      } else if (@$car_title === 's') {
            echo 'Salvaged/Rebuilt';
      }else if (@$car_title === 'n') {
            echo 'No Title';
      }
           
      
  ;?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Car Location:</label>
  <p class="" id=""><?php 
  if (@$car_location === 'b') {
      echo 'Business';
  }else if (@$car_location === 'r') {
      echo 'Residence';
  }
  
  ?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Car Tires:</label>
  <p class="" id=""><?php checkYes(@$car_tires);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Does the car have any Flat Tire?:</label>
  <p class="" id=""><?php echo checkYesArray(@$car_flat_tires);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Is all the Car Wheel mounted?:</label>
  <p class="" id=""><?php echo checkYesArray(@$car_wheel);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Does the Car have Key?:</label>
  <p class="" id=""><?php echo checkYes(@$car_key);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Does it drive?:</label>
  <p class="" id=""><?php echo checkYes(@$car_drive);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Any Removed Exterior Body Part?:</label>
  <p class="" id=""><?php echo checkYesArray(@$car_exterior);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Any Interior Damage?:</label>
  <p class="" id=""><?php echo checkYes(@$car_interior);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Any Body Damage?:</label>
  <p class="" id=""><?php echo checkYesArray(@$car_body);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Any Flood Damage:</label>
  <p class="" id=""><?php echo checkYes(@$car_flood);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Any Mirror, Light or Glass Damage?:</label>
  <p class="" id=""><?php echo checkYesArray(@$car_mirror);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Car Mileage:</label>
  <p class="" id=""><?php echo @$car_mileage;?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Entry Time:</label>
  <p class="" id=""><?php changeDate(@$quote_time);?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Quantity(ies):</label>
  <p class="" id=""><?php echo $quote_qty;?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Car Source:</label>
  <p class="" id=""><?php
  if (@$quote_origin === 'o') {
      echo 'Online';
  }else if (@$quote_origin === 'p') {
      echo 'Offline';
}
  ?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Status:</label>
  <p class="" id=""><?php 
  if (@$quote_status === 'n') {
      echo 'New';
  }else if (@$quote_status === 'q') {
      echo 'Quoted';
}else if (@$quote_status === 'd') {
      echo 'Bought';
}
  ?></p>
        </div>
    </div>
    </fieldset>
</div>

<div class="carOwnerInfo">
<fieldset class="border p-3">
   <legend  class="w-auto">Car Owner Information</legend>
        <div class="row">
        <div class="col-12 col-sm-4">
        <label for="cName">Owner's Name:</label>
  <p class="" id=""><?php echo @$contact_name;?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Owner's Email:</label>
  <p class="em" id=""><?php echo @$contact_email;?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Owner's Phone:</label>
  <p class="" id=""><?php echo @$contact_phone;?></p>
        </div>
        <div class="col-12 col-sm-4">
        <label for="cName">Owner's Zip:</label>
  <p class="" id=""><?php echo @$contact_zip;?></p>
        </div>
        </div>
    </fieldset>
</div>

<div class="dealInfo">
<div class="table-responsive">    
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>S/N</th> 
<th>Quote ($)</th>  	
<th>Deal ($)</th>   	 
</tr>
</thead>
<tbody class="">
<tr>
<td>Price</td> 
<td><h2><?php echo @$quote_price;?></h2></td>  	
<td><h2><?php echo @$deal_price;?></h2></td>   	 
</tr>
<tr>
<td>Date</td> 
<td><?php echo changeDate(@$quote_date);?></td>  	
<td><?php echo changeDate(@$deal_date);?></td>  	
</tr>
<tr>
<td>Authorised by</td> 
<td><?php echo getUser(@$quote_who, $connect);?></td>  		
<td><?php echo getUser(@$deal_who, $connect);?></td>  		 
</tr>
</tbody>
</table> 
</div>
</div>

<div class="transBTN">
      <?php 
      if (empty(@$quote_price)) {
           echo '<button class="btn btn-info sendQuoteBTN">Send Quote Price</button>';
      }
      if (empty(@$deal_price) || $level === 's') {
            echo '<button class="btn btn-primary sendDealBTN">Enter Deal Price</button>';
       }

       if ($quote_origin === 'p'|| $level === 's') {
            echo '<button class="btn btn-danger deleteQuote">Delete Information</button>';
       }
      ?>
</div>


</div>
</div>

<div class="modal fade" id="priceModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="chosenPrice"></span> Price for <?php echo @$car_year .' '. @$car_brand . ' '.@$car_model;?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="sendPrice">
       <p class="addError"></p>
      <form action="#" id="addPriceForm">
      <input type="number" name="quotePrice" id="quotePrice" class="form-control form-control searchInput" placeholder="Quotation Price in $" maxlength="10">
        <input type="hidden" name="dealPrice" id="dealPrice" class="form-control form-control searchInput" placeholder="Deal Price in $" maxlength="10">
        <select class="form-control searchInput" id="transaction_client" required>
        <option value="">Select Client Relation</option>
        <option value="n">New Client</option>
        <option value="o">Old Client</option>
        </select>
        <button class="btn submitAD" type="submit">Submit Price <i class="fas fa-check"></i> <i class="spinner-grow text-muted spinner-grow-sm loader"></i></button>
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
var quotePrice = $('#quotePrice'),
dealPrice = $('#dealPrice'),
transaction_client = $('#transaction_client'),
id = '<?php echo $quote_id; ?>',
chosenPrice;
const sendURL = '//localhost/fljc/request/adminSend.php';
$('.sendQuoteBTN').click(function(){
      quotePrice.attr('type', 'number')
      dealPrice.attr('type', 'hidden')
      $('.chosenPrice').html('Send Quotation')
      chosenPrice = 'Quote'
      $('#priceModal').modal('show');
})
$('.sendDealBTN').click(function(){
      quotePrice.attr('type', 'hidden')
      dealPrice.attr('type', 'number')
      $('.chosenPrice').html('Enter Deal')
      chosenPrice = 'Deal'
      $('#priceModal').modal('show');
})




$('#addPriceForm').submit(function(e){
    e.preventDefault()
    var quotedPrice = quotePrice.val().trim(),
    dealedPrice = dealPrice.val().trim(),
    tClient = transaction_client.val().trim(),
    con;

      if (chosenPrice === 'Quote') {
            con = `Are you sure ${quotedPrice} is the RIGHT QUOTATION PRICE ?`
      } else if (chosenPrice === 'Deal') {
            con = `Are you sure ${dealedPrice} is the RIGHT DEAL PRICE ?`
      }
    

    if ((chosenPrice === 'Quote') && (quotedPrice === '')) {
      $('.addError').html('Kindly enter Quotation Price')     
    }else if ((chosenPrice === 'Quote') && (!$.isNumeric(quotedPrice))) {
      $('.addError').html('Only Numeric Price is allowed')     
    }else if ((chosenPrice === 'Deal') && (dealedPrice === '')) {
      $('.addError').html('Kindly enter Deal Price')  
    }else if ((chosenPrice === 'Deal') && (!$.isNumeric(dealedPrice))) {
      $('.addError').html('Only Numeric Price is allowed')     
    } else if (tClient === '') {
      $('.addError').html('Select Client relationship')     
    }else {
          var x = confirm(con);
          if (!x) {
                return false;
          } else { 
        axios.get(sendURL, {
    params: {
      quotedPrice,
      dealedPrice,
      id,
      tClient,
      send: 'Send Price',
      chosenPrice
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data
    if (resp === 0) {
      $('.addError').html('Kindly enter Quotation Price')  
    } else if (resp === 1) {
      $('.addError').html('Kindly enter Deal Price')  
    } else if (resp === 2) {
      alert('Oops! Something went wrong. Try after some time.');
    } else if (resp === 200) {
        alert(`${chosenPrice} saved successfully`)
        window.location.reload(true)
    } 
})
.catch(function (error) {
console.log(error);
})
    }
    }
})

$('.deleteQuote').click(function(){
      var con = confirm('Are you sure you want to delete this Car Information')

      if (!con) {
       return false;     
      } else {
            axios.get(sendURL, {
    params: {
      id,
      send: 'Delete Quote'
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data
       if (resp === 2) {
      alert('Oops! Something went wrong. Try after some time.');
    } else if (resp === 200) {
        alert(`Car Information deleted`)
        window.location.href = '//localhost/fljc/admin/quotations.php';
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