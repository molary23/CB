<?php include('../includes/nav.php');?>
<div class="homeContent">
<?php
    if ($changePass  === 1) {
      echo '<div class="alert alert-danger">
      You are currently using a system generated Password. For Security reason kindly <a type="button" class="btn btn-danger btn-sm" href="'.$baseURL.'admin/user.php">Change it</a>
    </div>';
    }
  ?>
<div class="row">
<div class="col-12 col-md-4">
<div class="card quotationCard">
 <a href="//localhost/fljc/admin/quotations.php"> <div class="card-body">
  <div class="row">
    <div class="col-3">
            <div class="cardIcon">
            <i class="fas fa-comment-dollar fa-2x"></i>
            </div>
            </div>
                <div class="col-9">
                <h4 class="card-title"><?php echo $countQ; ?></h4>
                    <p class="card-text">Quotations</p>
                </div>
  </div>
</div></a>
  </div>
</div>

<div class="col-12 col-md-4">
<div class="card transactionsCard">
<a href="//localhost/fljc/admin/transactions.php"> <div class="card-body">
  <div class="row">
    <div class="col-3">
            <div class="cardIcon">
            <i class="far fa-handshake fa-2x"></i>
            </div>
            </div>
                <div class="col-9">
                <h4 class="card-title"><?php echo $countT; ?></h4>
                    <p class="card-text">Transactions</p>
                </div>
  </div>
</div></a>
  </div>
</div>

<div class="col-12 col-md-4">
<div class="card clientsCard">
<a href="//localhost/fljc/admin/transactions.php">  <div class="card-body">
  <div class="row">
    <div class="col-3">
            <div class="cardIcon">
            <i class="fas fa-users fa-2x"></i>
            </div>
            </div>
                <div class="col-9">
                <h4 class="card-title"><?php echo $countClient; ?></h4>
                    <p class="card-text">Clients</p>
                </div>
  </div>
</div></a>
  </div>
</div>

<div class="col-12 col-md-4">
<div class="card testimonialsCard">
<a href="//localhost/fljc/admin/testimonials.php"> <div class="card-body">
  <div class="row">
    <div class="col-3">
            <div class="cardIcon">
            <i class="far fa-comment-alt fa-2x"></i>
            </div>
            </div>
                <div class="col-9">
                <h4 class="card-title"><?php echo $countTe; ?></h4>
                    <p class="card-text">Testimonials</p>
                </div>
  </div>
</div></a>
  </div>
</div>
<?php
if ($level === 'p') {
echo '
<div class="col-12 col-md-4">
<div class="card usersCard">
<a href="//localhost/fljc/admin/users.php"> <div class="card-body">
  <div class="row">
    <div class="col-3">
            <div class="cardIcon">
            <i class="fas fa-user-friends fa-2x"></i>
            </div>
            </div>
                <div class="col-9">
                <h4 class="card-title">'. $countU .'</h4>
                    <p class="card-text">Users</p>
                </div>
  </div>
</div></a>
  </div>
</div>';
}
?>
<div class="col-12 col-md-4">
<div class="card galleryCard">
<a href="//localhost/fljc/admin/gallery.php"> <div class="card-body">
  <div class="row">
    <div class="col-3">
            <div class="cardIcon">
            <i class="fas fa-images fa-2x"></i>
            </div>
            </div>
                <div class="col-9">
                <h4 class="card-title"><?php echo $countG; ?></h4>
                    <p class="card-text">Gallery</p>
                </div>
  </div>
</div></a>
  </div>
</div>
</div>
</div>


<div class="modal fade" id="introModal" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="tip">
        <div><p>Welcome to Cars Buyer's Portal. Let's quickly show you some important info that can be helpful with your navigations.</p></div>
        <button class="btn btn-primary btn-sm" id="showMeModal">Show Me</button>
        <button class="btn btn-danger btn-sm" id="leaveMeModal">I'm fine</button>
        </div>
      </div>
    </div>
  </div>
</div>

<style type="text/css">

</style>
<script type="text/javascript">
const sendURL = '//localhost/fljc/request/adminSend.php';
if (intro === '0') {
  $('#introModal').modal('show');
}


$('#showMeModal').click(function(){
  $('#introModal').modal('hide');
  first().then(second).then(third).then(fourth).then(fifth); 
})


$('#leaveMeModal').click(function(){
  $('#introModal').modal('hide');
  saveSettings('i', 1);
})


$('.pop').tooltip({
   trigger: 'manual'
});

 first = () => {
   return new Promise(function(resolve, reject) {
    $('.quoteTool').tooltip('show');
    setTimeout((function() {
      resolve();
      console.log('first')
    }), 5000);
});
}
second = () => {
  $('.quoteTool').tooltip('hide');
  $('.closeNav').tooltip('show');
}
 third = () => {
  setTimeout((function() {
    $('.closeNav').tooltip('hide');
      $('.userTool').tooltip('show');
      console.log('third')
    }), 5000);
}
 fourth = () => {
  setTimeout((function() {
    $('.userTool').tooltip('hide');
    $('.themeTool').tooltip('show');
      console.log('fourth')
    }), 10000);
}

fifth = () => {
  setTimeout((function() {
    $('.themeTool').tooltip('hide');
    saveSettings('i', 1);
      console.log('fourth')
    }), 15000);
}
var interval;
 var timer = function(){
 interval = setTimeout(function(){
  logOut()
}, 15000);
};
function logOut() {
  console.log("You have been idle for 5 seconds") // or whatever your homepage would be
}/*
window.addEventListener('mousemove', function() { 
  console.log('object')
  window.clearInterval(logInterval)
}, true)*/
$(window).on('keypress mousemove click', function () { 
  console.log('object')
  timer()
 })

</script>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/includes/footer.php');?>