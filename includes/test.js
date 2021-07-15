//seif codeeeeee *******************************************
/**/
var responsiveSlider = function() {

  var slider = document.getElementById("slider");
  var sliderWidth = slider.offsetWidth;
  var slideList = document.getElementById("slideBody");
  var count = 2;
  var items = slideList.querySelectorAll("li").length;


  window.addEventListener('resize', function() {
    sliderWidth = slider.offsetWidth;
  });



  var nextSlide = function() {
    if(count < items) {
      slideList.style.left = "-" + count * sliderWidth + "px";
      count++;
    }
    else if(count = items) {
      slideList.style.left = "0px";
      count = 1;
    }
  };
    
  setInterval(function() {
    nextSlide()
  }, 2000);

};





window.sr = ScrollReveal();
sr.reveal(".animate-left", {
  origin: "left",
  duration: 1000,
  distance: "25rem",
  delay: 300
});

sr.reveal(".animate-right", {
  origin: "right",
  duration: 1000,
  distance: "25rem",
  delay: 600
});
sr.reveal(".animate-top", {
  origin: "top",
  duration: 1000,
  distance: "25rem",
  delay: 600
});
sr.reveal(".animate-bottom", {
  origin: "bottom",
  duration: 1000,
  distance: "25rem",
  delay: 600
});


var validation =function() {

  $('#registration_form').submit(function(e) {
   // e.preventDefault();
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var email = $('#email').val();
    var password = $('#password').val();
var repassaword = $('#repassword').val();
	  var address = $('#address').val();
	  var flag = true;
    $(".error").remove();

    if (first_name.length < 5) {
      $('#first_name').after('<span class="error">This field is required</span>');
		 $('#first_name').css("border-bottom","2px solid #F90A0A");
		flag=false;
    }else{
		 $('#first_name').css("border-bottom","2px solid #34F458");
		flag=true;
	}
    if (last_name.length < 5) {
      $('#last_name').after('<span class="error">This field is required</span>');
		$('#last_name').css("border-bottom","2px solid #F90A0A");
		flag=false;
    }else{
		 $('#last_name').css("border-bottom","2px solid #34F458");
		flag=true;
	}
	   if (address.length < 9) {
      $('#address').after('<span class="error">This field is required</span>');
		$('#address').css("border-bottom","2px solid #F90A0A");
		flag=false;
    }else{
		 $('#address').css("border-bottom","2px solid #34F458");
		flag=true;
	}
    if (email.length < 1) {
      $('#email').after('<span class="error">This field is required</span>');
    }else {
      var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      var validEmail = regEx.test(email);
		$('#email').css("border-bottom","2px solid #34F458");
      if (!validEmail) {
        $('#email').after('<span class="error"> Email is not vailed</span>');
		  $('#email').css("border-bottom","2px solid #F90A0A");
      }
    }
    if (password.length < 8) {
      $('#password').after('<span class="error">Password must be at least 8 characters long</span>');
		 $('#password').css("border-bottom","2px solid #F90A0A");
		flag=false;
    }else{
		 $('#password').css("border-bottom","2px solid #34F458");
		flag=true;
	}
	  if($('#repassword').val() !== $('#password').val()){
		   $('#repassword').after('<span class="error">password didnt match</span>');
		   $('#repassword').css("border-bottom","2px solid #F90A0A");
		  flag=false;
	  }else{
		 $('#repassword').css("border-bottom","2px solid #34F458");
		  flag=true;
	}
	  if(flag !== false){
		  
		// alert("Registration Successfull");
		 // document.getElementById('registration_form').reset();
	  }
  });

};



var arr=[];

var total = 0;


var ordernow =function(){
	



var cartOpen = false;
var numberOfProducts = 0;

$('body').on('click', '.js-toggle-cart', toggleCart);
$('body').on('click', '.js-add-product', addProduct);
$('body').on('click', '.js-remove-product', removeProduct);


	
	
function toggleCart(e) {
  e.preventDefault();
  if(cartOpen) {
    closeCart();
    return;
  }
  openCart();
}

function openCart() {
  cartOpen = true;
  $('body').addClass('open');
}

function closeCart() {
  cartOpen = false;
  $('body').removeClass('open');
}

function addProduct(e) {
  e.preventDefault();
  openCart();
	
  $('.js-cart-empty').addClass('hide');
	
	var pname = $(this).attr('name');
	var sprice = $(this).attr('data-int');
	var mealcode = $(this).attr('data-text');
  var value =   $(this).next().find('option:selected').val();
	
	var a = parseInt(mealcode);
	var b = parseInt(sprice);
	var c = parseInt(value);
		
	total+=sprice*value;	
	var obj={};
	 obj.id= a;
	obj.quantity=c;
	arr.push(obj);
	
	console.log(arr);
	console.log(total);
	
	
	
	
	var name1 =$('#itemname').after('<h1 id="itemnext">'+pname+" "+b+"$ X "+value+" </h1>");
	var product = $('.js-cart-product-template').html();
	
  $('.js-cart-products').append(product);
	$('#itemnext').remove();
	numberOfProducts++;
  
}

function removeProduct(e) {
  e.preventDefault();
  numberOfProducts--;
  $(this).closest('.js-cart-product').hide(250);
  if(numberOfProducts == 0) {
    $('.js-cart-empty').removeClass('hide');
  }
}

};






function sendbill(){
   // $.ajax({
       // url:"trial.php",
       // method: "post",
       // data:{lol : arr},
       
        
    //});

document.cookie = "totalcost="+total;
var userStr = JSON.stringify(arr);
$.ajax({
  type: 'POST',
  url: 'addcart.php',
  data: {lol:arr},
  dataType: 'json',

});

};
//seif codeeeeee *******************************************
















//Eslam codeeeeee *******************************************


/*      **MAIN NAVBAR**      */
const navSlide = () => {
    var burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    if (burger) {   //to check that burger is not null before adding the event listener.
        burger.addEventListener('click', () => {
            //Toggle nav
            nav.classList.toggle('nav-active');

            //Animate links, link is paramter element 
            navLinks.forEach((link, index) => {
                if (link.style.animation) {  // if this exists if our links have animation on it.
                    link.style.animation = '';
                } else {
                    link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 1.5}s`;
                }
            });

            //Burger Animation
            burger.classList.toggle('toggle');

        });
    }
}

navSlide();


// SLIDER

// Invoking the Function.

// we use query selector all in order to get all the slide images elements inside the intro Section.   
const slideShowImages = document.querySelectorAll(".intro .slideshow-img");

// defining the delay between each image
const nextImageDelay = 5000;

let currentImageCounter = 0;
if (slideShowImages[currentImageCounter]) {
    slideShowImages[currentImageCounter].style.opacity = 1;
}

setInterval(nextImage, nextImageDelay);

function nextImage() {
    if (slideShowImages[currentImageCounter]) {
        slideShowImages[currentImageCounter].style.zIndex = -2;

        const tempCount = currentImageCounter;
        setTimeout(() => {
            slideShowImages[tempCount].style.opacity = 0;
        }, 1000);

        currentImageCounter = (currentImageCounter + 1) % slideShowImages.length;

        slideShowImages[currentImageCounter].style.opacity = 1;

        slideShowImages[currentImageCounter].style.zIndex = -1;
    }
}

/*********************************************************************************************/

/*  **NAV SLIDER MENU**  */
let openNav = document.querySelector('.nav-slider');
let closeNav = document.querySelector('.close-nav-slider');
let navSliderSection = document.querySelector('.nav-slider-section');
let navLinks = document.querySelectorAll('.nav-links');

if (openNav) {
    openNav.onclick = function () {
        navSliderSection.classList.remove('closeNav');  /* (by default)so => to be able to open it for the second time as it is closed*/
        navSliderSection.classList.add('openNav');
    }
}
if (closeNav) {
    closeNav.onclick = closeNavSlider;
}
/*close the slider if any of the links is clicked*/
navLinks.forEach((link) => {
    link.onclick = closeNavSlider;
});

function closeNavSlider() {
    /*adding properities to these slider class if buttons pressed pressed*/
    navSliderSection.classList.remove('openNav');
    navSliderSection.classList.add('closeNav');
}


/* * * TABS * * */
//because we want to select the 4 tabs
let tabHeader = document.querySelectorAll('.tabHeader')

tabHeader.forEach((button) => {
    button.onclick = changeTabHeader;
});

function changeTabHeader() {
    //get the corresponding data attribute (read the propery).
    let tabNumber = parseInt(this.dataset.tab);
    console.log(tabNumber);

    //addd tab number to the new clicked header

    document.querySelector('.active-tab').classList.remove('active-tab');
    this.classList.add('active-tab');


    //we gonna switch with the tab number
    switch (tabNumber) {
        case 1:
            changeTabSection(tabNumber)  //we want to get the tab section of the header that we want
            break;
        case 2:
            changeTabSection(tabNumber)
            break;
        case 3:
            changeTabSection(tabNumber)
            break;
        case 4:
            changeTabSection(tabNumber)
            break;
        default:
            break;
    }
}

function changeTabSection(tabNumber) {
    let currentTab = document.querySelector('.show-tab');
    currentTab.classList.remove('show-tab');
    currentTab.classList.add('hide-tab');

    // we need to change the corresponding tab section, getting the tab number that is being passed of the newly clicked tab header    
    let newSection = document.getElementById('tabSection-' + tabNumber);


    newSection.classList.remove('hide-tab');
    newSection.classList.add('show-tab');
}