
"use strict";

// var fullHeight = function() {

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

var submitBtn = document.getElementById("btnSubmit");
submitBtn.onclick = function() {
    if ($("#username-field").val() == "admin" && $("#password-field").val() == "123456") {

        location.href = "http://127.0.0.1:5500/web1/home.html";
        console.log("true");
    }
}

try {
    var ref = firebase.database().ref("URL").child("1");
    ref.on("value", function(snapshot) {
        var changedPost = snapshot.val();
        alert(changedPost);
      });
    }
    catch(err) {
      alert("Error");
}
