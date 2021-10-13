<?php
 require_once('includes/header.php');
//require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/connect/connect.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/down/fpdf/fpdf.php');
/*
$sql = $connect -> query("SELECT q.contact_name, q.contact_email, q.contact_phone, q.car_brand, q.car_model, q.car_year, t.quote_price, t.deal_price, t.trans_id FROM transactions t INNER JOIN quotation q ON t.quote_id = q.quotation_id");  


try{
    $yes = $sql -> fetchAll();
    echo json_encode($yes);
    }catch (PDOException $e) {
    echo $e->getMessage();
    }

    echo '<br>';
   
$alphanum = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$special  = '~!@#$%^&*?';
$alphabet = $alphanum . $special;
$len = 15;
$random = openssl_random_pseudo_bytes($len);
$alphabet_length = strlen($alphabet);
$password = '';
for ($i = 0; $i < $len; ++$i) {
$password .= $alphabet[ord($random[$i]) % $alphabet_length];
}
echo $password;

$options = [
    'cost' => 11
  ];
  
$pword = password_hash('molary12345', PASSWORD_BCRYPT, $options);
echo $pword;




$array = ["Drive", "", "Passenger", ""];

$arr = array_filter($array);  
$arr = implode(", ", $arr);
echo json_encode($arr);

$imgID = 3;
$sql = $connect -> query("SELECT image_location FROM gallery WHERE image_id = '$imgID'");
$getI = $sql -> fetch(PDO::FETCH_ASSOC);
//$imgLoc = $getI['image_location'];
$response = json_encode($getI);
$date = date('Y-m-d H:i:s');
$date = date_create($date);
$date = date_format($date,"h:i A, D F jS, Y");
$fileName = 'quotation';
$title = "This is the Quotation report today " . $date;

class PDF extends FPDF {
  function Header()
{
  global $title;
    // Logo
    $this->Image('http://rccg-crmsod.org/image/sod_logo.png',10,6,15);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(60,10,$title,0,0,'C');
    // Line break
    $this->Ln(20);
}
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','b',10);


$pdf->Cell(22,10,'Car Brand',1, 0, 'C');
$pdf->Cell(25,10,'Car Model',1, 0, 'C');
$pdf->Cell(20,10,'Car Year',1, 0, 'C');
$pdf->Cell(20,10,'Quantity',1, 0, 'C');
$pdf->Cell(20,10,'Origin',1, 0, 'C');
$pdf->Cell(20,10,'Quote Price',1, 0, 'C');
$pdf->Cell(60,10,'Quote Date',1, 0, 'C');
$pdf->Cell(20,10,'Quote Date',1, 0, 'C');
$pdf->Cell(60,10,'Deal Date',1, 1, 'C');
/*
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; fileName=' .$fileName.'.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');	

fputcsv($output, array());
fputcsv($output, array('Contact Name', 'Contact Email', 'Contact Phone', 'Car Brand', 'Car Model', 'Car Year', 'Car Location', 'Car Title', 'Car Tires','Flat Tires', 'Car Key', 'Car Wheel', 'Car Engine', 'Car Drive','Car Exterior', 'Car Mileage', 'Car Interior','Car Body', 'Car Flood', 'Car Mirror','Quantity', 'Quote Status', 'Origin', 'Time'));



$sql = $connect -> query("SELECT car_brand, car_model, car_year, car_remodel_year ORDER BY car_brand ASC");
//while ($row = $sql -> fetch(PDO::FETCH_ASSOC)) fputcsv($output, $row);

$pdf->SetFont('Times','',8);
while($rows = $sql -> fetch(PDO::FETCH_ASSOC)){

  $pdf->Cell(22,10,$rows['car_brand'],1, 0, 'C');
  $pdf->Cell(25,10,$rows['car_model'],1, 0, 'C');
  $pdf->Cell(20,10,$rows['car_year'],1, 0, 'C');
  $pdf->Cell(20,10,$rows['car_remodel_year'],1, 0, 'C');
}
$pdf->Output('i', 'c.pdf');

(
  CASE 
      WHEN qty_1 <= '23' THEN price
      WHEN '23' > qty_1 && qty_2 <= '23' THEN price_2
      WHEN '23' > qty_2 && qty_3 <= '23' THEN price_3
      WHEN '23' > qty_3 THEN price_4
      ELSE 1
  END) AS total*/
  $user_id = 10;
$sqlSetting = $connect -> query("SELECT setting_name, settings FROM setting WHERE user = '$user_id' ");
$checkS = $sqlSetting -> rowCount();

$getS = $sqlSetting -> fetchAll(PDO::FETCH_ASSOC);
$theme = '';
$intro = 0;
foreach ($getS as $setArr) {
  $settingName[] = $setArr['setting_name'];
  $settings[] = $setArr['settings'];
}
$t_pos = array_search('t', $settingName);
$i_pos = array_search('i', $settingName);
if (is_numeric($t_pos)) {
  $theme = $settings[$t_pos];
}
if (is_numeric($i_pos)) {
  $intro = $settings[$i_pos];
}
echo 'Theme: ' .$theme .' Intro: ' . $intro;
?>
<p>
<!-- Below are a series of inputs which allow file selection and interaction with the cropper api -->
		<input type="file" id="fileInput" accept="image/*" />
		<input type="button" id="btnCrop" value="Crop" />
		<input type="button" id="btnRestore" value="Restore" />
</p>
<div>
  <canvas id="canvas">
    Your browser does not support the HTML5 canvas element.
  </canvas>
</div>		

<div id="result"></div>

<br />
<br />
<hr />
<p>If you find this demo useful, please consider <a href="https://www.paypal.com/cgi-bin/webscr?business=rob@robgravelle.com&cmd=_xclick&currency_code=USD&amount=1.00&item_name=donating%20%241%20dollar" target="_blank">donating $1 dollar</a> for a coffee using the button below or purchasing one of my songs from <a href="https://ax.itunes.apple.com/WebObjects/MZSearch.woa/wa/search?term=rob%20gravelle" target="_blank">iTunes.com</a> or <a href="http://www.amazon.com/s/ref=ntt_srch_drd_B001ES9TTK?ie=UTF8&field-keywords=Rob%20Gravelle&index=digital-music&search-type=ss" target="_blank">Amazon.com</a> for only 0.99 cents each. I have also released CDs with my band <a href="https://www.cdbaby.com/Artist/IvoryKnight" target="_blank">Ivory Knight</a> and Annihilator main-man Jeff Waters.</p>
<p>Rob uses and recommends <a href="http://www.mochahost.com/2425.html" target="_blank">MochaHost</a>, which provides Web Hosting for as low as $1.95 per month, as well as unlimited emails and disk space!</p>
		

<style type="text/css">
/* Limit image width to avoid overflow the container */
img {
  max-width: 100%; /* This rule is very important, please do not ignore this! */
}

#canvas {
  height: 600px;
  width: 600px;
  background-color: #ffffff;
  cursor: default;
  border: 1px solid black;
}
</style>


<link rel="stylesheet" href="//localhost/fljc/assets/cropper.css"/>
<script src="//localhost/fljc/js/jquery.js"></script>
<script src="//localhost/fljc/js/JQuery_UI.js"></script>
<script src="//localhost/fljc/js/croppers.js"></script>
<script type="text/javascript">
var canvas  = $("#canvas"),
    context = canvas.get(0).getContext("2d"),
    $result = $('#result');

$('#fileInput').on( 'change', function(){
    if (this.files && this.files[0]) {
      if ( this.files[0].type.match(/^image\//) ) {
        var reader = new FileReader();
        reader.onload = function(evt) {
           var img = new Image();
           img.onload = function() {
             context.canvas.height = img.height;
             context.canvas.width  = img.width;
             context.drawImage(img, 0, 0);
             var cropper = canvas.cropper({
               aspectRatio: 16 / 9
             });
             $('#btnCrop').click(function() {
                // Get a string base 64 data url
                var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/png"); 
                $result.append( $('<img>').attr('src', croppedImageDataURL) );
             });
             $('#btnRestore').click(function() {
               canvas.cropper('reset');
               $result.empty();
             });
           };
           img.src = evt.target.result;
				};
        reader.readAsDataURL(this.files[0]);
      }
      else {
        alert("Invalid file type! Please select an image file.");
      }
    }
    else {
      alert('No file(s) selected.');
    }
});
</script>