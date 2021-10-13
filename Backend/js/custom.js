

$(document).ready(function(){
const myUrl = '//localhost/fljc/request/adminRequest.php',
sendURL = '//localhost/fljc/request/adminSend.php',
postURL = '//localhost/fljc/request/adminPost.php';
datenow = new Date().getHours(),
cssFile = '/fljc/assets/dark.css',
dark = "<link rel='stylesheet' class='dark-theme-css' href='"+cssFile+"' type='text/css'/>";

$('.closeNav span').click(function(){
    var idClicked = $(this).attr('id');
    if(idClicked === 'showAllLink'){
    $('.dropIcon').show();
    $('.themeDetails').removeClass('themeIconOnly');
    $('.sidebar').removeClass('sideBarSmall').addClass('sidebarLG');
    $('#content').removeClass('contentLG').addClass('contentSM');
    $('#showAllLink').hide();
    $('#iconsOnly').show();
    }else if(idClicked === 'iconsOnly'){
    $('.dropIcon').hide();
    $('.themeDetails').addClass('themeIconOnly');
    $('.sidebar').removeClass('sidebarLG').addClass('sideBarSmall');
    $('#content').addClass('contentLG').removeClass('contentSM');
    $('#iconsOnly').hide();
    $('#showAllLink').show();
    }
});


function mySearchString($elem, $string){
    var  descenders = $string;
    descenders = descenders.split(' ')
  $($elem).each(function (i, elem) {
      var self = $(elem),
          textNodes = self.text().split(' '),
          i = 0;
      for (i = 0; i < textNodes.length; i += 1) {
          if (descenders.length > 1) {
              for (let j = 0; j < descenders.length; j++) {
                  if (textNodes[i].includes(descenders[j]) || textNodes[i].toLowerCase().includes(descenders[j]) ) {
              textNodes[i] = textNodes[i].replaceAll(new RegExp('('+descenders[j]+')', 'ig'), '<span class="searchedChar">$1</span>');  
              }
              }
          }else{
              if (textNodes[i].includes(descenders) || textNodes[i].toLowerCase().includes(descenders) ) {
              textNodes[i] = textNodes[i].replaceAll(new RegExp('('+descenders+')', 'ig'), '<span class="searchedChar">$1</span>');
          }
          }
      }
      self.html(textNodes.join(' '));
  });
}

var iScrollPos = 500;
$(window).scroll(function(){
var icurScrollpos = $(this).scrollTop();
if(icurScrollpos > iScrollPos){
$('.scrollUp').show();
}else{
$('.scrollUp').hide(); 
}     
});

$('.scrollUp').click(function () {
$("html, body").animate({
scrollTop: 0,
}, 1000);
return false;
});




$('li.off').click(function(){
    var x = confirm('Are you sure you want to log out?')
    if (!x) {
        return null
    } else {
        axios.get(myUrl, {
    params: {
        recordsPerPage,
        start,
        call: 'logging out',
        search
    }
  })
.then(function (response) {
    console.log(response)
    window.location.href = '//localhost/fljc/login.php'
})
.catch(function (error) {
console.log(error);
})
    }
})

saveSettings = (caller, calling) => {
    axios.get(sendURL, {
      params: {
          send: 'Edit Settings',
          caller,
          calling
      }
    })
  .then(function (response) {
    console.log(response)
  })
  .catch(function (error) {
  console.log(error);
  })
  }

$('.darkTheme').click(function(){
  saveSettings('t', 'n');
  $("head").append(dark);
});
$('.lightTheme').click(function(){
  saveSettings('t', 'd');
  $("link.dark-theme-css").remove();
});
$('.autoTheme').click(function(){
  saveSettings('t', 'a');
  if ((datenow >= 7) && (datenow <= 19)) {
    $("head").append(dark); 
  } else {
    $("link.dark-theme-css").remove();
  }
});
});
$(window).on('load', function(){
    if (theme === 'd') {
        $("link.dark-theme-css").remove();  
    } else if (theme === 'n') {
        $("head").append(dark); 
    }else if ((theme === 'a') && ((datenow >= 7) && (datenow <= 19))) {
        $("head").append(dark); 
    }else if ((theme === 'a') && ((datenow < 7) && (datenow > 19))) {
        $("link.dark-theme-css").remove();
    }
    $("html").show();
});