<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/connect/connect.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/down/fpdf/fpdf.php');

$date = date('Y-m-d H:i:s');
$date = date_create($date);
$date = date_format($date,"h:i A, D F jS, Y");
$logo = 'http://rccg-crmsod.org/image/sod_logo.png';


if ((isset($_POST['quoteCSV'])) || (isset($_POST['quotePDF']))) {
$fileName = 'quotation';
$title = "This is the Quotation report today, " . $date;


$sql = $connect -> query("SELECT contact_name, contact_email, contact_phone, car_brand, car_model, car_year,
  (CASE 
  WHEN car_location = 'r' THEN 'Resident'
  WHEN car_location = 'b' THEN 'Business'
  END) AS location, 
  (CASE 
  WHEN car_title = 'c' THEN 'Clean Title'
  WHEN car_title = 's' THEN 'Salvaged/Rebuilt'
  WHEN car_title = 'n' THEN 'No Title'
  END) AS title,
  (CASE 
  WHEN car_tires = 'y' THEN 'Yes'
  WHEN car_tires = 'n' THEN 'No'
  END) AS tires,
  IF(car_flat_tires = 'n', 'No', car_flat_tires) AS flatTires, 
  (CASE 
  WHEN car_key = 'y' THEN 'Yes'
  WHEN car_key = 'n' THEN 'No'
  END) AS carKey, 
  IF(car_wheel = 'y', 'Yes', car_wheel) AS wheel, 
  (CASE 
  WHEN car_engine = 'i' THEN 'Intact'
  WHEN car_engine = 'm' THEN 'Missing Parts'
  WHEN car_engine = 'r' THEN 'Removed'
  END) AS engine, 
  (CASE 
  WHEN car_drive = 'y' THEN 'Yes'
  WHEN car_drive = 'n' THEN 'No'
  END) AS drive, 
  IF(car_exterior = 'n', 'No', car_exterior) AS exterior, car_mileage, 
  (CASE 
  WHEN car_interior = 'y' THEN 'Yes'
  WHEN car_interior = 'n' THEN 'No'
  END) AS interior, IF(car_body = 'n', 'No', car_body) AS body, 
  (CASE 
  WHEN car_flood = 'y' THEN 'Yes'
  WHEN car_flood = 'n' THEN 'No'
  END) AS flood,
  IF(car_mirror = 'n', 'No', car_mirror) AS mirror, quote_qty,
  (CASE 
  WHEN quote_status = 'n' THEN 'New'
  WHEN quote_status = 'q' THEN 'Quoted'
  WHEN quote_status = 'd' THEN 'Deal Successfully'
  WHEN quote_status = 'r' THEN 'Deleted'
  END) AS qStatus,  
  (CASE 
  WHEN quote_origin = 'o' THEN 'Online'
  WHEN quote_origin = 'p' THEN 'Offline'
  END) AS origin, 
  DATE_FORMAT(quote_time, '%l:%i %p %w, %e%D %M, %Y') AS q_time  FROM quotation ORDER BY quotation_id DESC");

if (isset($_POST['quotePDF'])) {
class PDF extends FPDF {
  function Header()
{
  global $title, $logo;
    // Logo
    $this->Image($logo,10,6,15);
    // Times bold 15
    $this->SetFont('Times','B',15);
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
    // Times italic 8
    $this->SetFont('Times','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','b',12);

$pdf->Cell(40,10,'Contact Name',1, 0, 'C');
$pdf->Cell(22,10,'Car Brand',1, 0, 'C');
$pdf->Cell(25,10,'Car Model',1, 0, 'C');
$pdf->Cell(20,10,'Car Year',1, 0, 'C');
$pdf->Cell(30,10,'Car Title',1, 0, 'C');
$pdf->Cell(20,10,'Quantity',1, 0, 'C');
$pdf->Cell(35,10,'Status',1, 0, 'C');
$pdf->Cell(20,10,'Origin',1, 0, 'C');
$pdf->Cell(60,10,'Time',1, 1, 'C');

$pdf->SetFont('Times','',10);
while($rows = $sql -> fetch(PDO::FETCH_ASSOC)){
  $pdf->Cell(40,10,$rows['contact_name'],1, 0, 'C');
  $pdf->Cell(22,10,$rows['car_brand'],1, 0, 'C');
  $pdf->Cell(25,10,$rows['car_model'],1, 0, 'C');
  $pdf->Cell(20,10,$rows['car_year'],1, 0, 'C');
  $pdf->Cell(30,10,$rows['title'],1, 0, 'C');
  $pdf->Cell(20,10,$rows['quote_qty'],1, 0, 'C');
  $pdf->Cell(35,10,$rows['qStatus'],1, 0, 'C');
  $pdf->Cell(20,10,$rows['origin'],1, 0, 'C');
  $pdf->Cell(60,10,$rows['q_time'],1, 1, 'C');
}
$fileName = $fileName .'.pdf';
$pdf->Output('D', $fileName);
}elseif (isset($_POST['quoteCSV'])) {
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; fileName=' .$fileName.'.csv');
// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');	

fputcsv($output, array($title));
fputcsv($output, array('Contact Name', 'Contact Email', 'Contact Phone', 'Car Brand', 'Car Model', 'Car Year', 'Car Location', 'Car Title', 'Car Tires','Flat Tires', 'Car Key', 'Car Wheel', 'Car Engine', 'Car Drive','Car Exterior', 'Car Mileage', 'Car Interior','Car Body', 'Car Flood', 'Car Mirror','Quantity', 'Quote Status', 'Origin', 'Time'));

while ($row = $sql -> fetch(PDO::FETCH_ASSOC)) fputcsv($output, $row);
}
}if ((isset($_POST['transCSV'])) || (isset($_POST['transPDF']))) {
  $fileName = 'transactions';
  $title = "This is the Transactions report today, " . $date;
  
  $sql = $connect -> query("SELECT q.contact_name, q.contact_email, q.contact_phone, q.car_brand, q.car_model, q.car_year,
    (CASE 
    WHEN q.car_location = 'r' THEN 'Resident'
    WHEN q.car_location = 'b' THEN 'Business'
    END) AS location, 
    (CASE 
    WHEN q.car_title = 'c' THEN 'Clean Title'
    WHEN q.car_title = 's' THEN 'Salvaged/Rebuilt'
    WHEN q.car_title = 'n' THEN 'No Title'
    END) AS title,
    (CASE 
    WHEN q.car_tires = 'y' THEN 'Yes'
    WHEN q.car_tires = 'n' THEN 'No'
    END) AS tires,
    IF(q.car_flat_tires = 'n', 'No', q.car_flat_tires) AS flatTires, 
    (CASE 
    WHEN q.car_key = 'y' THEN 'Yes'
    WHEN q.car_key = 'n' THEN 'No'
    END) AS carKey, 
    IF(q.car_wheel = 'y', 'Yes', q.car_wheel) AS wheel, 
    (CASE 
    WHEN q.car_engine = 'i' THEN 'Intact'
    WHEN q.car_engine = 'm' THEN 'Missing Parts'
    WHEN q.car_engine = 'r' THEN 'Removed'
    END) AS engine, 
    (CASE 
    WHEN q.car_drive = 'y' THEN 'Yes'
    WHEN q.car_drive = 'n' THEN 'No'
    END) AS drive, 
    IF(car_exterior = 'n', 'No', car_exterior) AS exterior, car_mileage, 
    (CASE 
    WHEN q.car_interior = 'y' THEN 'Yes'
    WHEN q.car_interior = 'n' THEN 'No'
    END) AS interior, IF(car_body = 'n', 'No', car_body) AS body, 
    (CASE 
    WHEN q.car_flood = 'y' THEN 'Yes'
    WHEN q.car_flood = 'n' THEN 'No'
    END) AS flood,
    IF(car_mirror = 'n', 'No', car_mirror) AS mirror, quote_qty,
    (CASE 
    WHEN q.quote_status = 'n' THEN 'New'
    WHEN q.quote_status = 'q' THEN 'Quoted'
    WHEN q.quote_status = 'd' THEN 'Deal Successfully'
    WHEN q.quote_status = 'r' THEN 'Deleted'
    END) AS qStatus,  
    (CASE 
    WHEN q.quote_origin = 'o' THEN 'Online'
    WHEN q.quote_origin = 'p' THEN 'Offline'
    END) AS origin, 
    DATE_FORMAT(q.quote_time, '%l:%i %p %w, %e%D %M, %Y') AS q_time, t.quote_price, DATE_FORMAT(t.quote_date, '%l:%i %p %w, %e%D %M, %Y') AS q_date, t.deal_price, DATE_FORMAT(t.deal_date, '%l:%i %p %w, %e%D %M, %Y') AS d_date FROM quotation q INNER JOIN transactions t ON q.quotation_id = t.quote_id ORDER BY t.quote_id DESC");
  
  if (isset($_POST['transPDF'])) {
  class PDF extends FPDF {
    function Header()
  {
    global $title, $logo;
      // Logo
      $this->Image($logo,10,6,15);
      // Times bold 15
      $this->SetFont('Times','B',15);
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
      // Times italic 8
      $this->SetFont('Times','I',8);
      // Page number
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
  }
  $pdf = new PDF('L','mm','A4');
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Times','b',12);
  

  $pdf->Cell(22,10,'Car Brand',1, 0, 'C');
  $pdf->Cell(25,10,'Car Model',1, 0, 'C');
  $pdf->Cell(20,10,'Car Year',1, 0, 'C');
  $pdf->Cell(20,10,'Quantity',1, 0, 'C');
  $pdf->Cell(20,10,'Origin',1, 0, 'C');
  $pdf->Cell(25,10,'Quote Price',1, 0, 'C');
  $pdf->Cell(60,10,'Quote Date',1, 0, 'C');
  $pdf->Cell(25,10,'Quote Date',1, 0, 'C');
  $pdf->Cell(60,10,'Deal Date',1, 1, 'C');
  
  $pdf->SetFont('Times','',10);
  while($rows = $sql -> fetch(PDO::FETCH_ASSOC)){
      $pdf->Cell(22,10,$rows['car_brand'],1, 0, 'C');
      $pdf->Cell(25,10,$rows['car_model'],1, 0, 'C');
      $pdf->Cell(20,10,$rows['car_year'],1, 0, 'C');
      $pdf->Cell(20,10,$rows['quote_qty'],1, 0, 'C');
      $pdf->Cell(20,10,$rows['origin'],1, 0, 'C');
      $pdf->Cell(25,10,$rows['quote_price'],1, 0, 'C');
      $pdf->Cell(60,10,$rows['q_date'],1, 0, 'C');
      $pdf->Cell(25,10,$rows['deal_price'],1, 0, 'C');
      $pdf->Cell(60,10,$rows['d_date'],1, 1, 'C');
  }
  $fileName = $fileName .'.pdf';
  $pdf->Output('D', $fileName);
  exit;
  }elseif (isset($_POST['transCSV'])) {
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; fileName=' .$fileName.'.csv');
  // create a file pointer connected to the output stream
  $output = fopen('php://output', 'w');   
  
  fputcsv($output, array($title));
  fputcsv($output, array('Contact Name', 'Contact Email', 'Contact Phone', 'Car Brand', 'Car Model', 'Car Year', 'Car Location', 'Car Title', 'Car Tires','Flat Tires', 'Car Key', 'Car Wheel', 'Car Engine', 'Car Drive','Car Exterior', 'Car Mileage', 'Car Interior','Car Body', 'Car Flood', 'Car Mirror','Quantity', 'Quote Status', 'Origin', 'Time', 'Quote Price', 'Quote Time', 'Deal Price', 'Deal Time'));
  
  while ($row = $sql -> fetch(PDO::FETCH_ASSOC)) fputcsv($output, $row);
  }
  }else if ((isset($_POST['carsCSV'])) || (isset($_POST['carsPDF']))) {
    $sql = $connect -> query("SELECT car_brand, car_model, car_year, car_remodel_year FROM cars ORDER BY car_brand ASC");
    $fileName = 'cars';
    $title = "This is the List of Cars as at today, " . $date;

  if (isset($_POST['carsPDF'])) {
    class PDF extends FPDF {
      function Header()
    {
      global $title, $logo;
        // Logo
        $this->Image($logo,10,6,15);
        // Times bold 15
        $this->SetFont('Times','B',15);
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
        // Times italic 8
        $this->SetFont('Times','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
    $pdf = new PDF('P','mm','A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','b',12);
    
  
    $pdf->Cell(40,10,'Car Brand',1, 0, 'C');
    $pdf->Cell(40,10,'Car Model',1, 0, 'C');
    $pdf->Cell(40,10,'Car Year',1, 0, 'C');
    $pdf->Cell(40,10,'Car Remodel Year',1, 1, 'C');
    
    $pdf->SetFont('Times','',10);
    while($rows = $sql -> fetch(PDO::FETCH_ASSOC)){
      $pdf->Cell(40,10,$rows['car_brand'],1, 0, 'C');
      $pdf->Cell(40,10,$rows['car_model'],1, 0, 'C');
      $pdf->Cell(40,10,$rows['car_year'],1, 0, 'C');
      $pdf->Cell(40,10,$rows['car_remodel_year'],1, 1, 'C');
    }
    $fileName = $fileName .'.pdf';
    $pdf->Output('D', $fileName);
    exit;
    }elseif (isset($_POST['carsCSV'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; fileName=' .$fileName.'.csv');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');   
    
    fputcsv($output, array($title));
    fputcsv($output, array('Car Brand', 'Car Model', 'Car Year', 'Car Remodel Year'));
    
    while ($row = $sql -> fetch(PDO::FETCH_ASSOC)) fputcsv($output, $row);
    }
  }else if ((isset($_POST['logCSV'])) || (isset($_POST['logPDF']))) {
    $sql = $connect -> query("SELECT u.user_name, 
    (CASE 
    WHEN l.user_action = 'n' THEN 'Change Password'
    WHEN l.user_action = 'd' THEN 'Entered Deal Price'
    WHEN l.user_action = 'l' THEN 'Logged in'
    WHEN l.user_action = 'a' THEN 'Add a New User'
    WHEN l.user_action = 'r' THEN 'Request for Password Reset'
    WHEN l.user_action = 'p' THEN 'Recover Password'
    WHEN l.user_action = 't' THEN 'Delete User'
    WHEN l.user_action = 'e' THEN 'Edit User Info'
    WHEN l.user_action = 'c' THEN 'Delete Quote'
    END) AS act, DATE_FORMAT(l.act_time, '%l:%i %p %w, %e%D %M, %Y') AS action_time FROM userLog l INNER JOIN user_info u ON l.user = u.user_id ORDER BY l.log_id DESC");
    $fileName = 'User Activities';
    $title = "This is the reports of activity as at today, " . $date;

  if (isset($_POST['logPDF'])) {
    class PDF extends FPDF {
      function Header()
    {
      global $title, $logo;
        // Logo
        $this->Image($logo,10,6,15);
        // Times bold 15
        $this->SetFont('Times','B',10);
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
        // Times italic 8
        $this->SetFont('Times','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
    $pdf = new PDF('P','mm','A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','b',12);
    
  
    $pdf->Cell(40,10,'User Name',1, 0, 'C');
    $pdf->Cell(40,10,'User Action',1, 0, 'C');
    $pdf->Cell(60,10,'Action Time',1, 1, 'C');
    
    $pdf->SetFont('Times','',10);
    while($rows = $sql -> fetch(PDO::FETCH_ASSOC)){
      $pdf->Cell(40,10,$rows['user_name'],1, 0, 'C');
      $pdf->Cell(40,10,$rows['act'],1, 0, 'C');
      $pdf->Cell(60,10,$rows['action_time'],1, 1, 'C');
    }
    $fileName = $fileName .'.pdf';
    $pdf->Output('D', $fileName);
    exit;
    }elseif (isset($_POST['logCSV'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; fileName=' .$fileName.'.csv');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');   
    
    fputcsv($output, array($title));
    fputcsv($output, array('User Name', 'User Action', 'Action TIme'));
    
    while ($row = $sql -> fetch(PDO::FETCH_ASSOC)) fputcsv($output, $row);
    }
  }else if ((isset($_POST['usersPDF'])) || (isset($_POST['usersCSV']))) {
    $sql = $connect -> query("SELECT i.user_name, u.user_email, u.user_phone, 
    (CASE 
    WHEN u.user_level = 'p' THEN 'Principal'
    WHEN u.user_level = 's' THEN 'Super'
    WHEN u.user_level= 'm' THEN 'Normal'
    END) AS level, 
    (CASE 
    WHEN u.user_status = 'a' THEN 'Active'
    WHEN u.user_status = 'd' THEN 'Deleted'
    END) AS status
     FROM user u INNER JOIN user_info i ON u.id_user = i.user_id ORDER BY u.id_user DESC");
    $fileName = 'Users';
    $title = "This is the list of users as at today, " . $date;

  if (isset($_POST['usersPDF'])) {
    class PDF extends FPDF {
      function Header()
    {
      global $title, $logo;
        // Logo
        $this->Image($logo,10,6,15);
        // Times bold 15
        $this->SetFont('Times','B',15);
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
        // Times italic 8
        $this->SetFont('Times','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
    $pdf = new PDF('P','mm','A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','b',12);
    
  
    $pdf->Cell(40,10,'User Name',1, 0, 'C');
    $pdf->Cell(40,10,'User Email',1, 0, 'C');
    $pdf->Cell(40,10,'User Phone',1, 0, 'C');
    $pdf->Cell(40,10,'User Level',1, 0, 'C');
    $pdf->Cell(40,10,'User Status',1, 1, 'C');
    
    $pdf->SetFont('Times','',10);
    while($rows = $sql -> fetch(PDO::FETCH_ASSOC)){
      $pdf->Cell(40,10,$rows['user_name'],1, 0, 'C');
      $pdf->Cell(40,10,$rows['uer_email'],1, 0, 'C');
      $pdf->Cell(40,10,$rows['user_phone'],1, 0, 'C');
      $pdf->Cell(40,10,$rows['level'],1, 0, 'C');
      $pdf->Cell(40,10,$rows['status'],1, 1, 'C');
    }
    $fileName = $fileName .'.pdf';
    $pdf->Output('D', $fileName);
    exit;
    }elseif (isset($_POST['usersCSV'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; fileName=' .$fileName.'.csv');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');   
    
    fputcsv($output, array($title));
    fputcsv($output, array('User Name', 'User Email', 'User Phone', 'User Level', 'User Status'));
    
    while ($row = $sql -> fetch(PDO::FETCH_ASSOC)) fputcsv($output, $row);
    }
  }



?>