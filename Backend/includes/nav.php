<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/admin/admin_include/admin_session.php');
?>
<script type="text/javascript">
const theme = '<?php echo $theme;?>',
intro = '<?php echo $intro?>';
</script>
<script src="//localhost/fljc/js/custom.js"></script>
<nav class="navbar navbar-expand-md bg-light navbar-light sticky-top" id="topNav">
<!-- Brand -->
<span class="navbar-text d-none d-sm-block closeNav pop" id="showIcons" data-toggle="tooltip" data-placement="bottom" title="Click Here to Retract or Expand Side Menu">
<span id="iconsOnly"><i class="fas fa-outdent"></i> </span>
<span id="showAllLink"><i class="fas fa-indent"></i></span>
</span>



  <a class="navbar-brand logoImage" href="#"><img src="//localhost/fljc/assets/images/logo.png" alt="SOD LOGO" width="120" height="auto"></a>
<span class="navbar-text d-none d-sm-block coyName">
Car Buyer Solution
</span>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
<!-- Navbar links -->
<div class="collapse navbar-collapse" id="collapsibleNavbar">
<ul class="nav navbar-nav ml-auto">
<li class="nav-item userImage">
<a class="nav-link imageUser" href="//localhost/fljc/admin/user.php"><img src="<?php echo $imgDir . $image; ?>" alt="User Image" class="pop userTool" data-toggle="tooltip" data-placement="bottom" title="Click Here to view and Edit User Information"></a> 
</li>
<li class="nav-item">
      <a class="nav-link" href="//localhost/fljc/admin/user.php"><?php echo $name; ?></a>
    </li>

</ul>
</div>
</nav>


<div class="sidebar sidebarLG">
<ul class="side_nav" id="side_menu">
<li><a href="//localhost/fljc/admin/index.php"><i class="fa fa-home"></i> <span class="dropIcon">Home</span> </a></li>
<li class=""><a href="//localhost/fljc/admin/quotations.php" ><i class="fas fa-comment-dollar"></i> <span class="dropIcon">Quotations</span> 
<?php
if ($counted >= 1) {
  echo '<span class="badge badge-pill badge-info quoteTool pop" data-toggle="tooltip" data-placement="bottom" title="New Quotations">' .$counted. '</span>';
}

?>

</a></li>
<li class=""><a href="//localhost/fljc/admin/transactions.php" ><i class="far fa-handshake"></i><span class="dropIcon">Transactions</span> </a></li>  
<li class=""><a href="//localhost/fljc/admin/cars.php" ><i class="fas fa-car-side"></i><span class="dropIcon">Cars</span> </a></li>  
<li class=""><a href="//localhost/fljc/admin/testimonials.php"><i class="far fa-comment-alt"></i> <span class="dropIcon">Testimonials</span> </a></li>
<?php
if ($level === 'p') {
echo '<li class=""><a href="//localhost/fljc/admin/users.php"><i class="fas fa-user-friends"></i> <span class="dropIcon">Users</span> </a></li>';
}
?>

<li class=""><a href="//localhost/fljc/admin/gallery.php"><i class="fas fa-images"></i> <span class="dropIcon">Gallery</span> </a></li>
<li class=""><a href="//localhost/fljc/admin/activity.php"><i class="fas fa-chart-line"></i> <span class="dropIcon">User Activity</span> </a></li>
<li class="off"><i class="fas fa-power-off"></i> <span class="dropIcon">Log Out</span></li>
<p class="themeTool pop" data-toggle="tooltip" data-placement="top" title="Change Theme to help reduce power usage">Theme</p>
<div class="row theme">
<li class="lightTheme"><div class="col-sm-12 themeDetails col-md-4"><i class="far fa-circle"></i><span class="themeName dropIcon" id="lightTheme"> Light</span></div></li>
<li class="darkTheme"><div class="col-sm-12 themeDetails col-md-4"><i class="fa fa-circle"></i><span class="themeName dropIcon" id="darkTheme"> Dark </span></div></li>
<li class="autoTheme"><div class="col-sm-12 themeDetails col-md-4"><i class="fa fa-adjust"></i><span class="themeName dropIcon" id="autoTheme"> Auto</span></div></li>
</div>
</ul>
</div>
<section>
<div id="content" class="contentSM"> 
<div class="container-fluid">
