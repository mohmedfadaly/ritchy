let openMenu = document.getElementById("#menu");
let closeMenu = document.getElementById("#close-menu");

  

  $(document).ready(function(){
    $('#menu').click(function(){
      $('#main-menu').toggleClass('show');
      $(".over-lay").toggleClass('showoverlay');
    });
    $('#close-menu').click(function(){
      $('#main-menu').removeClass('show');
    });
    $(".user-details").click(function(){
        $(".menu-details").slideToggle()("slow");
      });
  });


  //change user img
  let userImg = document.getElementById("user_img");
  let inputFile = document.getElementById("input-file");
   
  inputFile.onchange = function(){
    userImg.src=URL.createObjectURL(inputFile.files[0]);
  }