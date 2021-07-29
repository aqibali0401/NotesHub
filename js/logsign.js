$("#activeSignup").hide();
$("#craccount").hide();
$("#exampleModalLabel").text("Log In");
$("#loginbt").click(function(){

    $("#activeSignup").hide();
    $("#activeLogin").show();
    $("#exampleModalLabel").text("Log In");
    $("#craccount").hide();
});

$("#Signupbt").click(function(){

    $("#activeSignup").show();
    $("#activeLogin").hide();
    $("#exampleModalLabel").text("Sign Up");
    $("#craccount").show();
});

