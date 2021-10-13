<?php
$website = '//localhost';
$portal = '//localhost/fljc/login.php';
 $header = '<html>
<head>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" marginheight="0" marginheight="0" style="font-family: \'Georgia\', Helvetica, serif;">

<table border="0" style="width:100%;background-color:#ffffff;padding:0px" align="center">
<tbody>
<tr>
<td align="center" style="padding:0px">
<table border="0" align="center" style="padding:0px">
<tbody>
<tr>
<td class="horizontal_sapcing" width="12" style="min-width:12px;padding:0px;font-size:0px;line-height:1px;padding:0px"> &nbsp; </td>
<td class="horizontal_sapcing" style="padding:0px;font-size:0px;line-height:1px;padding:0px">
<table border="0" class="wrapper" style="padding:0px;width:448px">

<tbody>
<tr>
<td align="center" style="padding:0px">
<table border="0" style="min-width:100%;padding:0px">
<tbody>
<tr>
<td height="24" style="height:24px;padding:0px"> </td>
</tr>
<tr>
<td align="center" style="padding:0px">
<table border="0" cellspacing="0" cellpadding="0" align="center" width="100%" style="min-width:100%;padding:0px">
<tbody>
<tr>
<td class="horizontal_sapcing" style="padding:0px;font-size:0px;line-height:1px;padding:0px">
<table cellpadding="0" cellspacing="0" border="0" align="left" style="padding:0px">
<tbody>
<tr>
<td style="padding:0px"> <a href="https://lucipost.com"> <img src="https://lucipost.com/images/lucipost.png" height="32" class="logoImage" style="border:none;border-radius:24px"> </a> </td>
</tr>
</tbody>
</table>
<table border="0" align="right" style="padding:0px">
<tbody>
<tr>
<td align="right" valign="top" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"> 
	<p style="margin-bottom: 2px;">Cars Buyer</p> 
	<p style="margin-top: 2px;">Platform for Credible Info</p>
</td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td height="12" style="height:12px;padding:0px"></td>
</tr>

</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>';


$footer = '<tr>
<td class="footer_made" style="padding:0px;font-family:Helvetica,Arial,sans-serif;color:#8899a6;font-size:12px;padding:0px;font-weight:normal;line-height:12px" align="center"> Connect and Join the Conversation:&nbsp;&nbsp; <a href="https://facebook.com/thelucipost" style="text-decoration:none;font-family:Helvetica,Arial,sans-serif;color:#8899a6;font-size:12px;padding:0px;font-weight:normal;line-height:12px;display:inline-block" target="_blank" ><img src="https://lucipost.com/images/fb.png" style="height: 20px"></a>&nbsp;&nbsp; <a href="https://twitter.com/thelucipost" style="text-decoration:none;font-family:Helvetica,Arial,sans-serif;color:#8899a6;font-size:12px;padding:0px;font-weight:normal;line-height:12px;display:inline-block" target="_blank" ><img src="https://lucipost.com/images/tw.png" style="height: 20px"></a>&nbsp;&nbsp; <a href="https://instagram.com/thelucipost" style="text-decoration:none;font-family:Helvetica,Arial,sans-serif;color:#8899a6;font-size:12px;padding:0px;font-weight:normal;line-height:12px;display:inline-block" target="_blank" ><img src="https://lucipost.com/images/ig.png" style="height: 20px"></a>&nbsp;&nbsp;</td>
</tr>
<tr>
<td style="height:10px;padding:0px" height="10"> </td>
</tr>
<tr>
<td class="footer_made" style="padding:0px;font-family:Helvetica,Arial,sans-serif;color:#8899a6;font-size:12px;padding:0px;font-weight:normal;line-height:12px" align="center">Need Info about current Offers? Call:&nbsp;&nbsp; <a href="tel:00076567837265624" style="text-decoration:none;font-family:Helvetica,Arial,sans-serif;color:#8899a6;font-size:14px;padding:0px;font-weight:600;line-height:12px;display:inline-block" target="_blank" >00076567837265624</a></td>
</tr>
<tr>
<td style="height:10px;padding:0px" height="10"> </td>
</tr>
<tr>
<td style="padding:0px" align="center">
<table style="padding:0px" width="100%" border="0" align="center">
<tbody>
<tr>
<td class="horizontal_sapcing" style="padding:0px;font-size:0px;line-height:1px;padding:0px" width="48">&nbsp; </td>
<td style="padding:0px" align="center"> <span class="addressLink" style="font-family:Helvetica,Arial,sans-serif;font-size:12px;padding:0px;font-weight:normal;line-height:16px;color:#8899a6!important">Copyright &copy; <a href="'.$website.'" style="color:#8899a6!important;text-decoration:none!important;text-decoration:none" target="_blank">Cars Buyer</a>
'. date('Y').'</span> </td>
<td class="horizontal_sapcing" style="padding:0px;font-size:0px;line-height:1px;padding:0px" width="48">&nbsp; </td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<!--Footer end-->

</tbody>
</table> </td>
</tr>
</tbody>
</table>
</td>
<td class="horizontal_sapcing" width="12" style="min-width:12px;padding:0px;font-size:0px;line-height:1px;padding:0px"> &nbsp; </td>
</tr>
</tbody>
</table>
</td>
</tr>

</tbody>
</table>
</body>
</html>';


function contactAck($contactName){
global $header, $footer;
$contactUs = $header;
$contactUs .= '

<tr>
<td align="center" style="padding:0px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="min-width:100%;padding:0px">
<tbody>
<!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #aab8c2;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="height:8px;padding:0px" height="8"></td>
</tr>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px">
<img style="width:100%;border:none;border-radius:5px" src="https://lucipost.com/images/thankYou.jpg"></td>
</tr>	
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
<tr>
<td style="padding:0px"> 
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"> 
	<div>
<p style="margin: 2em 0em .2em 0em;">Dear '.$contactName .',</p>
<p style="margin: .5em 0; text-align: justify; text-justify: inter-word;">Thank you for contacting us. We will try to reply you as soon as possible.</p>
</div> </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
</tbody>
</table>  </td>
</tr>

</tbody>
</table>
 </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td style="padding:0px">
<table style="width:100%;padding:0px" border="0" align="center">
<tbody>
	<tr>
<td style="height:10px;padding:0px" height="10"> </td>
</tr>';
$contactUs .= $footer;
return $contactUs;
}

function sendQuote($clientName, $carBrand, $carModel, $carYear){
global $header, $footer;
$quote = $header;
$quote .= '<tr>
<td align="center" style="padding:0px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="min-width:100%;padding:0px">
<tbody>
<!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #aab8c2;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="height:8px;padding:0px" height="8"></td>
</tr>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px">
<img style="width:100%;border:none;border-radius:5px" src="//localhost/fljc/assets/images/thumbs.jpg"></td>
</tr>	
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
<tr>
<td style="padding:0px"> 
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"> 
	<div>
<p style="margin: 2em 0em .2em 0em;">Dear ' .$clientName.',</p>
<p style="margin: .5em 0; text-align: justify; text-justify: inter-word;">We have recieved your <b>'.$carBrand. ' ' .$carModel.' ' .$carYear.'\'s</b> information. Our team is working on a perfect quotation for your car and it will be sent to you shortly.</p>
<p style="margin: 1em 0; text-align: justify; text-justify: inter-word;">Thanks.</p>
</div> </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
</tbody>
</table>  </td>
</tr>

</tbody>
</table>
 </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td style="padding:0px">
<table style="width:100%;padding:0px" border="0" align="center">
<tbody>
	<tr>
<td style="height:10px;padding:0px" height="10"> </td>
</tr>';
$quote .= $footer;
 return $quote;
}

function sendQuotePrice($clientName, $carBrand, $carModel, $carYear, $quoted){
    global $header, $footer;
$quotePrice = $header;
$quotePrice .= '<tr>
<td align="center" style="padding:0px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="min-width:100%;padding:0px">
<tbody>
<!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #aab8c2;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="height:8px;padding:0px" height="8"></td>
</tr>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px">
<img style="width:100%;border:none;border-radius:5px" src="//localhost/fljc/assets/images/pay.jpg"></td>
</tr>	
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
<tr>
<td style="padding:0px"> 
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"> 
	<div>
<p style="margin: 2em 0em .2em 0em;">Dear '. $clientName.',</p>
<p style="margin: .5em 0; text-align: justify; text-justify: inter-word;">Our team have carefully reviewed the details of your <b>'.$carYear.' '. $carBrand.' '.$carModel.'</b>.</p>
<p style="margin: .5em 0; text-align: justify; text-justify: inter-word;">We have decided to pay <b>$'. $quoted.'</b> for your car. We will also be offering a truck to pick up the car from the location <b>FREE OF CHARGE</b>.</p>
<p style="margin: .5em 0; text-align: justify; text-justify: inter-word;"><i style="letter-spacing: 0.8px;">The above price is subject to inspection of the said vehicle.</i></p>
<p style="margin: 1em 0; text-align: justify; text-justify: inter-word;">Thanks.</p>
</div> </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
</tbody>
</table>  </td>
</tr>

</tbody>
</table>
 </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td style="padding:0px">
<table style="width:100%;padding:0px" border="0" align="center">
<tbody>
	<tr>
<td style="height:10px;padding:0px" height="10"> </td>
</tr>';
$quotePrice .= $footer;

return $quotePrice;
}

function adminContact($senderName, $senderEmail, $senderPhone, $message){
    global $header, $footer;
$contactAd = $header;
$contactAd .= '<tr>
<td align="center" style="padding:0px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="min-width:100%;padding:0px">
<tbody>
<!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #aab8c2;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="height:8px;padding:0px" height="8"></td>
</tr>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>	
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
<tr>
<td style="padding:0px"> 
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"> 
	<div>
<p style="margin: .2em 0em .2em 0em;">Dear Admin,</p>
<p style="margin: 2em 0em 2em 0em;">A user just sent a message via our Contact Us Form. Kindly find below the content of the message.</p>
<tr><!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #dbdbdb;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="height:8px;padding:0px" height="8"></td>
</tr>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_content" style="padding:0px;font-size:14px;line-height:18px;color:#31373b;"><p style="margin: .2em 0em 2em 0em;">'.$message .'</p>
</td>
</tr>
<tr colspan="2">
<td style="padding:0px;font-size:14px;line-height:18px;color:#31373b;">Sender Name:</td>
<td style="padding:0px;font-size:14px;line-height:18px;color:#31373b;">'. $senderName . '</td>
</tr>

<tr colspan="2">
<td style="padding:0px;font-size:14px;line-height:18px;color:#31373b;">Sender Phone:</td>
<td style="padding:0px;font-size:14px;line-height:18px;color:#31373b;"><a href="tel:'. $senderPhone.'" style="text-decoration:none;font-family:Helvetica,Arial,sans-serif;color:#8899a6;font-size:14px;padding:0px;font-weight:600;line-height:12px;display:inline-block" target="_blank" >'. $senderPhone.'</a></td>
</tr>

<tr colspan="2">
<td style="padding:0px;font-size:14px;line-height:18px;color:#31373b;">Sender Email:</td>
<td style="padding:0px;font-size:14px;line-height:18px;color:#31373b;"><a href="mailto:'.$senderEmail.'" style="text-decoration:none;font-family:Helvetica,Arial,sans-serif;color:#8899a6;font-size:14px;padding:0px;font-weight:600;line-height:12px;display:inline-block" target="_blank" >'.$senderEmail.'</a></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table>
 </td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
</div> </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"><a href="mailto:'.$senderEmail.'" style="border: 1px solid #176dcf; border-radius: 20px; padding: 0.8vw 4vh; text-decoration: none; background: #176dcf; color: #fff; font-weight: 900; margin-right: 10px;" target="_blank">Reply</a>  

<a href="tel:'. $senderPhone.'" style="border: 1px solid #ab47bc; border-radius: 20px; padding: 0.8vw 4vh; text-decoration: none; background: #ab47bc; color: #fff; font-weight: 900;" target="_blank">Call</a></td>


</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
</tbody>
</table>  </td>
</tr>

</tbody>
</table>
 </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td style="padding:0px">
<table style="width:100%;padding:0px" border="0" align="center">
<tbody>
	<tr>
<td style="height:10px;padding:0px" height="10"> </td>
</tr>';
$contactAd .= $footer;
return $contactAd;
}
function quoteForAdmin($clientName, $clientPhone, $clientEmail, $carBrand, $carModel, $carYear){
    global $header, $footer;
$quoteAd = $header;
$quoteAd .= '<tr>
<td align="center" style="padding:0px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="min-width:100%;padding:0px">
<tbody>
<!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #aab8c2;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="height:8px;padding:0px" height="8"></td>
</tr>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>	
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
<tr>
<td style="padding:0px"> 
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"> 
	<div>
<p style="margin: .2em 0em .2em 0em;">Dear Admin,</p>
<p style="margin: 2em 0em 2em 0em;">A client just sent a car details to us for quotation. Kindly find below the details of the car.</p>
<tr><!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #dbdbdb;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="height:8px;padding:0px" height="8"></td>
</tr>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr colspan="2">
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">Car Brand:</td>
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">'.$carBrand .'</td>
</tr>

<tr colspan="2">
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">Model:</td>
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">'.$carModel.'</td>
</tr>

<tr colspan="2">
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">Manufactured Year:</td>
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">'.$carYear.'</td>
</tr>

<tr colspan="2">
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">Client Name:</td>
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">'.$clientName.'</td>
</tr>

<tr colspan="2">
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">Client Phone:</td>
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;"><a href="tel:'.$clientPhone.'" style="text-decoration:none;font-family:Helvetica,Arial,sans-serif;color:#8899a6;font-size:14px;padding:0px;font-weight:600;line-height:12px;display:inline-block" target="_blank" >'.$clientPhone.'</a></td>
</tr>

<tr colspan="2">
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">Client Email:</td>
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;"><a href="mailto:'.$clientEmail.'" style="text-decoration:none;font-family:Helvetica,Arial,sans-serif;color:#8899a6;font-size:14px;padding:0px;font-weight:600;line-height:12px;display:inline-block" target="_blank" >'.$clientEmail.'</a></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table>
 </td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
</div> </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"><a href="//localhost/" style="border: 1px solid #176dcf; border-radius: 20px; padding: 0.8vw 4vh; text-decoration: none; background: #176dcf; color: #fff; font-weight: 900;" target="_blank">Send Quote</a></td>


</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
</tbody>
</table>  </td>
</tr>

</tbody>
</table>
 </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td style="padding:0px">
<table style="width:100%;padding:0px" border="0" align="center">
<tbody>
	<tr>
<td style="height:10px;padding:0px" height="10"> </td>
</tr>';
$quoteAd .= $footer;

return $quoteAd;
}

function createUser($username, $userEmail, $userPhone, $userPass){
    global $header, $footer, $portal;
$newUser = $header;
$newUser .= '<tr>
<td align="center" style="padding:0px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="min-width:100%;padding:0px">
<tbody>
<!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #aab8c2;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px"> 
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"> 
	<div>
<p style="margin: 2em 0em .2em 0em;">Dear '.$username.',</p>
<p style="margin: .5em 0; text-align: justify; text-justify: inter-word;">You have been added as a administrator on Cars Buyer\'s Portal.</p>
<p style="margin: 2em 0em .2em 0em; text-align: justify; text-justify: inter-word;">Your login details are as follow:</p>
</div> 
</td>
</tr>
<tr>
<!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #dbdbdb;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="height:8px;padding:0px" height="8"></td>
</tr>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
</tr>
<tr colspan="2">
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">Userame:</td>
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">'.$userEmail.' OR '.$userPhone.'</td>
</tr>

<tr colspan="2">
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">Password:</td>
<td style="padding:5px 0;font-size:16px;line-height:18px;color:#31373b;font-weight:600;">'.$userPass.'</td>
</tr>

</tbody>
</table> </td>
</tr>
</tbody>
</table>
 </td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"><a href="'.$portal.'" style="border: 1px solid #176dcf; border-radius: 20px; padding: 0.8vw 4vh; text-decoration: none; background: #176dcf; color: #fff; font-weight: 900; margin-right: 10px;" target="_blank">Log In</a></td>


</tr>


<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
</tbody>
</table>  </td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td style="padding:0px">
<table style="width:100%;padding:0px" border="0" align="center">
<tbody>
	<tr>
<td style="height:10px;padding:0px" height="10"> </td>
</tr>';
$newUser .= $footer;

return $newUser;
}

function passwordRequest($username){
    global $header, $footer;
$passRequest = $header;
$passRequest .= '<tr>
<td align="center" style="padding:0px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="min-width:100%;padding:0px">
<tbody>
<!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #aab8c2;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px"> 
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"> 
	<div>
<p style="margin: 2em 0em .2em 0em;">Dear Admin,</p>
<p style="margin: .5em 0; text-align: justify; text-justify: inter-word;">'.$$username.' is requesting for a password reset.</p>
<p style="margin: .5em 0; text-align: justify; text-justify: inter-word;">You are advised to contact him in person before going ahead to honour his request.</p>
</div> 
</td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
</tbody>
</table>  </td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td style="padding:0px">
<table style="width:100%;padding:0px" border="0" align="center">
<tbody>
	<tr>
<td style="height:10px;padding:0px" height="10"> </td>
</tr>';
$passRequest .= $footer;

return $passRequest;
}


function recoverPass($name, $newPassword){
    global $header, $footer, $portal;
$passRecover = $header;
$passRecover .= '<tr>
<td align="center" style="padding:0px">
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="min-width:100%;padding:0px">
<tbody>
<!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #aab8c2;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px"> 
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"> 
	<div>
<p style="margin: 2em 0em .2em 0em;">Dear '.$name.',</p>
<p style="margin: .5em 0; text-align: justify; text-justify: inter-word;">You password reset request has been approved. A new password has been generated for you.</p>
<p style="margin: .2em 0em .2em 0em; text-align: justify; text-justify: inter-word;">You are advised to changed the password immediately you login.</p>
<p style="margin: 2em 0em 1em 0em; text-align: justify; text-justify: inter-word;">You new password can be found below.</p>
</div> 
</td>
</tr>
<tr>
<!-- start of middle -->
<td style="padding:0px" align="center">
<table style="min-width:100%;padding:0px" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px" valign="top" align="left">

<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="post_box" style="padding:0px;border:1px solid #dbdbdb;background-color:#ffffff;border-radius:8px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"></td>

<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="height:8px;padding:0px" height="8"></td>
</tr>
<tr>
<td style="padding:0px">


<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:0px">
<table style="min-width:100%;width:100%;padding:0px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
</tr>

<tr colspan="2">
<td style="padding:5px 0;font-size:14px;line-height:18px;color:#31373b;">New Password:</td>
<td style="padding:5px 0;font-size:16px;line-height:18px;color:#31373b;font-weight:600;">'.$newPassword.'</td>
</tr>

</tbody>
</table> </td>
</tr>
</tbody>
</table>
 </td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="post_content" style="padding:0px;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:18px;color:#31373b;padding:0px"><a href="'.$portal.'" style="border: 1px solid #176dcf; border-radius: 20px; padding: 0.8vw 4vh; text-decoration: none; background: #176dcf; color: #fff; font-weight: 900; margin-right: 10px;" target="_blank">Log In</a></td>


</tr>


<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>
</tbody>
</table>  </td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td style="height:14px;padding:0px" height="14"></td>
</tr>

</tbody>
</table> </td>
<td class="made_margin_lr" style="padding:0px;width:24px;min-width:12px" width="24"> </td>

</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td class="vertical_sapcing" style="padding:0px;height:14px" height="14"></td>
</tr>

</tbody>
</table></td>
</tr>
<tr>
<td class="made_space" style="padding:0px;height:20px" height="20"></td>
</tr>
</tbody>
</table> </td>
</tr>
</tbody>
</table> </td>
</tr>
<tr>
<td style="padding:0px">
<table style="width:100%;padding:0px" border="0" align="center">
<tbody>
	<tr>
<td style="height:10px;padding:0px" height="10"> </td>
</tr>';
$passRecover .= $footer;

return $passRecover;
}



/*
 echo '<br> <br>  <br>  <br> Contact From User';

 echo contactAck('Adeola Hassan');
 

 echo '<br> <br>  <br>  <br> Quote Acknowledgement to User';
 echo sendQuote('John Snow', 'Benz', 'CX', '2019');

echo '<br> <br>  <br>  <br> Quote Price to user';
echo sendQuotePrice('John Snow', 'Benz', 'CX', 2019, 350);

echo '<br> <br>  <br>  <br> Contact message to Admin';
echo adminContact('senderName', 'senderEmail', 'senderPhone', 'message');

echo '<br> <br>  <br>  <br> Quote Details to admin';
echo quoteForAdmin('clientName', 'clientPhone', 'clientEmail', 'carBrand', 'carModel', 'carYear');


echo '<br> <br>  <br>  <br> Created a new User';
echo createUser('username', 'userEmail', 'userPhone', 'userPass');


echo '<br> <br>  <br>  <br> Password reset request';
echo passwordRequest('username');

echo '<br> <br>  <br>  <br> Password Recover to user';
echo recoverPass('Ade Ola', 'new password here');*/

?>