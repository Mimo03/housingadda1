$(document).ready(function () {
  // Initialize select2
  // $("#selUser").select2();
  $("#pincode").on("input", function (event) {
    // console.log(1);
    var pincodeinput = $("#pincode").val();
    // console.log(pincodeinput);
    var pincodeurl = "https://api.postalpincode.in/pincode/" + pincodeinput;
    // console.log(pincodeurl);
    $.getJSON(pincodeurl, function (result) {
      if (result[0].Status == "Error") {
        // console.log("Please enter a valid pincode");
        $("#district").val("Please enter a valid pincode");
      } else {
        $("#district").val(result[0].PostOffice[0].District);
      }
    });
  });
});

// document.addEventListener("contextmenu", (event) => event.preventDefault());
// document.onkeydown = function (e) {
//   if (e.keyCode == 123) {
//     return false;
//   }
//   if (e.ctrlKey && e.shiftKey && e.keyCode == "I".charCodeAt(0)) {
//     return false;
//   }
//   if (e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)) {
//     return false;
//   }
//   if (e.ctrlKey && e.keyCode == "U".charCodeAt(0)) {
//     return false;
//   }
// };

const scrollHeader = () => {
  const header = document.getElementById("header");
  // When the scroll is greater than 50 viewport height, add the scroll-header class to the header tag
  this.scrollY >= 50
    ? header.classList.add("scroll-header")
    : header.classList.remove("scroll-header");
};
window.addEventListener("scroll", scrollHeader);

var swiper = new Swiper(".popular__container", {
  slidesPerView: 1,
  spaceBetween: 10,
  // init: false,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
});

const scrollUp = () => {
  // console.log("hello");
  const scrollUp = document.getElementById("scroll-up");
  // console.log(scrollUp);

  // When the scroll is higher than 350 viewport height, add the show-scroll class to the a tag with the scrollup class
  this.scrollY >= 350
    ? scrollUp.classList.add("show-scroll")
    : scrollUp.classList.remove("show-scroll");
};
window.addEventListener("scroll", scrollUp);

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
  
}

// $(".dropbtn").click(function() {
//   // $("#myDropdown").removeClass("show");
//   $(".dropdown-content").addClass("show");
// });

// Close the dropdown menu if the user clicks outside of it
// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn')) {
//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }

// $(".dropbtn").eq(0).click(function() {
//   $(".dropdown-menu").show();
// });
