
// ar fullHeight = function() {

//     $('.js-fullheight').css('height', $(window).height());
//     $(window).resize(function(){
//         $('.js-fullheight').css('height', $(window).height());
//     });

// };
// fullHeight();

// $(".toggle-password").click(function() {

//     $(this).toggleClass("fa-eye fa-eye-slash");
//     var input = $($(this).attr("toggle"));
//     if (input.attr("type") == "password") {
//     input.attr("type", "text");
//     } else {
//     input.attr("type", "password");
//     }
// });


// $(document).ready(function() {
//     $(".btn-submit").click(function() {
//         // if ($('#username-field').equal("admin") && ($("#password-field").equal("123456"))) {
//         //     window.location.href = "home.html";
//         // }

//         alert("Hjell=o")
//     }) 
// })

// $(".btn-submit").click(function() {
// 	if ($('#username-field').equal("admin") && ($("#password-field").equal("123456"))) {
//         window.location.href = "home.html";
//     }
// }) 


// -------------------------------- Admin page ----------------------------
function openListAllProduct() {
  window.location.href = "home.php";
}

function openAddPageProduct(e) {
  window.location.href = "addProduct.php";
}

// ---------------------------------------------------------------------


// ----------------------------------------- Customer page --------------------------- 
function openListAllProductCus() {
  window.location.href = "home.php";
}

function openCartView() {
  window.location.href = "cartView.php";
}

function openLikeView() {
  window.location.href = "likeView.php";
}

function openListProductStill() {
  window.location.href = "productStillView.php";
}

function openListProductOut() {
  window.location.href = "productOutView.php";
}

function openHistoryView() {
  window.location.href = "historyView.php";
}