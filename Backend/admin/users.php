<?php require_once('../includes/nav.php');

if ($level === 'p') {
    header("location: ".$baseURL."admin/index.php");
    exit;
}
?>
<div class="allContent">

<div class="holderCard ">
    <h1>All <em><?php echo $countU; ?></em> Users</h1>
    <div class="searchTop">
    <div class="row">
        <div class="col-12 col-sm-3">
            <input type="text" class="form-control form-control searchInput" placeholder="Enter your Search Keywords here...">
        </div>
        <div class="col-12 col-sm-3">
            <div class="download">
            <div class="btn-group">
            <form action="//localhost/fljc/down/download.php" method="post">
            <button type="button" class="btn disabledDL" disabled><i class="fas fa-download"></i> Download</button>    
            <button type="submit" class="btn downloadCSV" name="usersCSV"><i class="fas fa-file-csv"></i></button>
            <button type="submit" class="btn downloadPDF" name="usersPDF"><i class="far fa-file-pdf"></i></button>
            </form>
            </div> 
            </div>
        </div>
        <div class="col-12 col-sm-2">
        <span class="searchResult"></span>
        </div>
        <div class="col-12 col-sm-2">
        <div class="loading">Loading... <div class="spinner-border text-muted spinner-border-sm"></div>
            </div>
        </div>
        <div class="col-12 col-sm-2">
        <button class="btn btn-light btn-sm addNewBTN" data-toggle="modal" data-target="#userModal">Add New <i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
</div>

<div class="tableSection">
<div class="table-responsive">    
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>S/N</th> 
<th>Picture</th>  	
<th>Name</th>   	
<th>Email</th>  
<th>Phone</th>   
<th>Level</th>   
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

<div class="modal fade" id="userModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add a New User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="addNewCar">
       <p class="addError"></p>
      <form action="#" id="addUserForm">
      <input type="text" name="userName" id="userName" class="form-control form-control searchInput" placeholder="User Name" required maxlength="30" minlength="3">
      <input type="text" name="userEmail" id="userEmail" class="form-control form-control searchInput" placeholder="User Email" required maxlength="30" minlength="10">
        <input type="text" class="form-control form-control searchInput" placeholder="User Phone" id="userPhone" name="userPhone" required maxlength="20" minlength="3">
        <select class="form-control searchInput" id="userLevel" required>
        <option value="">Select User Level</option>
        <option value="m">Mid</option>
        <option value="p">Principal</option>
        <option value="s">Super</option>
        </select>
        <input type="text" name="userStatus" id="userStatus" class="form-control form-control searchInput" placeholder="User Status">
        <button class="btn submitAD" type="submit">Add User <i class="fas fa-check"></i> <i class="spinner-grow text-muted spinner-grow-sm loader"></i></button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
</style>

<script type="text/javascript">

checkLevel = (level) => {
    var lv
    if (level === 'p') {
        lv = 'Principal' 
    }else if (level === 's') {
        lv = 'Super' 
    }else if (level === 'm') {
        lv = 'Mid' 
    }
    return lv
}



$(document).ready(function(){
    const myUrl = '//localhost/fljc/request/adminRequest.php',
  sendURL = '//localhost/fljc/request/adminSend.php';
  var allUsers = "<?php echo $cU;?>";
    let recordsPerPage = 1,
    currentPage = 1,
    //numberOfPages = Math.ceil(allQuote / recordsPerPage),
    start = (currentPage * recordsPerPage) - recordsPerPage,
    search = 'default';
    const imageDir = '//localhost/fljc/upload/users/'

    if (allUsers > ((currentPage * recordsPerPage))) {
        $('.getMoreBTN').show();
    }

    allUser(recordsPerPage, start, search)

function allUser(recordsPerPage, start, search){
    $('.loading').show();
axios.get(myUrl, {
    params: {
        recordsPerPage,
        start,
        call: 'users',
        search
    }
  })
.then(function (response) {
    $('.loading').hide();
var serverResponse = response.data;
search !== 'default' ?  $('.searchResult ').html(`${serverResponse.length} record(s) found`) :   $('.searchResult ').html(); 
$(serverResponse).each(function(index){console.log(serverResponse)
var output = $('<tr><td></td><td class="photoHolder"><img src="'+ imageDir +  serverResponse[index].user_image +'" alt="'+ serverResponse[index].user_name +'" class="userPhoto"/></td><td><p class="capName">'+ serverResponse[index].user_name  +'</p></td><td><p class="">'+ serverResponse[index].user_email  +'</p></td><td><p class="">'+ serverResponse[index].user_phone  +'</p></td><td><p class="">'+ checkLevel(serverResponse[index].user_level)  +'</p></td><td><div class="action" data-id="'+ serverResponse[index].id_user  +'"><button class="btn btn-danger btn-sm deleteUser" data-action="deleteUser"  title="Delete User">Delete <i class="far fa-trash-alt"></i></button><button class="btn btn-info btn-sm editUser" data-action="editUser"  title="Edit User">Edit <i class="far fa-edit"></i></button><button class="btn btn-success btn-sm resetUser" data-action="resetUser" title="Reset Password">Reset <i class="fas fa-sync-alt"></i></button></td></tr>');
if (search === 'default') {   
output.appendTo('.normalTableBody'); 
}else{
output.appendTo('.searchTableBody'); 
$('.searchTableBody p').each(function() {
//mySearchString($(this), search);
});
}

output.find('.deleteUser').click(function(){
var elem = $(this)
clickedID = elem.parent().attr('data-id')
tr = elem.parent().closest('tr'),
un = tr.find('td:nth-child(3) p').html()
console.log(`id: ${clickedID}, name: ${un}`)
var con = confirm(`Are you sure you want to delete ${un}`)  
    if (!con) {
        return false;
    }else{
        elem.attr('disabled', 'disabled')
        axios.get(sendURL, {
    params: {
        clickedID,
        send: 'Delete User'
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
console.log(error);
})
    }
})

output.find('.resetUser').click(function(){
var elem = $(this)
clickedID = elem.parent().attr('data-id')
tr = elem.parent().closest('tr'),
un = tr.find('td:nth-child(3) p').html()
console.log(`id: ${clickedID}, name: ${un}`)
var con = confirm(`Are you sure you want to reset this ${un}\'s password`)  
    if (!con) {
        return false;
    }else{
        elem.attr('disabled', 'disabled')
        axios.get(sendURL, {
    params: {
        clickedID,
        send: 'Reset Password'
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data

    if (resp === 0) {
        alert('Oops! Something went wrong. Try after some time.')
    } else if (resp === 200) {
        alert('Password Reset Successful')
    }
    elem.removeAttr('disabled')
})
.catch(function (error) {
console.log(error);
})
    }
})

output.find('.editUser').click(function(){
    var elem = $(this)
clickedID = elem.parent().attr('data-id'),
pr = elem.parent().closest('tr'),
uN = pr.find('td:nth-child(3) p').html()
uE = pr.find('td:nth-child(4) p').html()
uP = pr.find('td:nth-child(5) p').html()
uL = pr.find('td:nth-child(6) p').html()
console.log(uN +' '+ uE +' '+uP +' '+uL)

if (uL === 'Mid') {
    uLvl = 'm'
} else if (uL === 'Principal') {
    uLvl = 'p'
}else if (uL === 'Super') {
    uLvl = 's'
}

uEmail.val(uE)
uPhone.val(uP)
uName.val(uN)
uLevel.val(uLvl)
uStatus.val(clickedID)

$('#userModal').modal('show')

})
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
allUser(recordsPerPage, start, search)  
}else{
$('.normalTableBody').show();    
$('.searchTableBody').hide();    
}

}, doneTypingInterval);
});

currentPage = 2;
$('.getMoreBTN').click(function(){
if (allUsers <= ((currentPage * recordsPerPage))) {
$('.getMoreBTN').hide();
} 
$('.getMoreWord').hide()
$('.getMoreLoader').show()
$('.getMoreBTN').attr('disabled', 'disabled');
start = (currentPage * recordsPerPage) - recordsPerPage;
allUser(recordsPerPage, start, search);  
currentPage++;
$('.getMoreWord').show()
$('.getMoreLoader').hide()
$('.getMoreBTN').removeAttr('disabled');
});


var uEmail = $('#userEmail'),
    uPhone = $('#userPhone'),
    uName = $('#userName'),
    uLevel = $('#userLevel'),
    uStatus = $('#userStatus')

    $('.addNewBTN').click(function(){
    $("#modal [type=input], select").val('')
    tS.val('new')
    $('#testModal').modal('show')

})
    

$('#addUserForm').submit(function(e){
    e.preventDefault()
    var email = uEmail.val().trim(),
    phone = uPhone.val().trim(),
    name = uName.val().trim(),
    level = uLevel.val().trim(),
    status = uStatus.val().trim(),
    res;

    if (uStatus === 'new') {
        res = 'User created.'
    }else{
        res = `${name}'s profile updated`
    }

    if (name === '') {
        $('.addError').html('Kindly enter User\'s  Full Name')   
    }    else if (email === '') {
        $('.addError').html('Kindly enter User\'s  Email Address')
    } else if (phone === '') {
        $('.addError').html('Kindly enter User\'s Phone Number')
    } else if (level === '') {
        $('.addError').html('Kindly select User\'s Authorisation Level')
    } else {
        axios.get(sendURL, {
    params: {
        email,
        phone,
        level,
        name,
        status,
        send: 'Add User',
    }
  })
.then(function (response) { console.log(response)
    var resp = response.data
    if (resp === 0) {
        $('.addError').html('Kindly enter User\'s  Email Address')
    } else if (resp === 1) {
        $('.addError').html('Kindly enter User\'s Phone Number')
    } else if (resp === 2) {
        $('.addError').html('Kindly select User\'s Authorisation Level')
    } else if (resp === 3) {
        $('.addError').html('Phone No/Email address already exist')
    }  else if (resp === 4) {
        $('.addError').html('Kindly enter User\'s  Full Name')   
    } else if ((resp === 200) || (resp === 201)) {
        alert(res)
        window.location.reload(true)
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