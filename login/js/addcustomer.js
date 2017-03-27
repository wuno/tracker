$(document).ready(function() {

    $("#submit").click(function() {

        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var street = $("#street").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var zip = $("#zip").val();

        if ((fname == "") || (lname == "") || (email == "") || (phone == "") || (street == "") || (city == "") || (state == "") || (zip == "")) {
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please fill out all fields</div>");

        } else {
            $.ajax({
                type: "POST",
                url: "login/createcustomer.php",
                data: "fname=" + fname + "&lname=" + lname + "&email=" + email + "&phone=" + phone + "&street=" + street + "&city=" + city + "&state=" + state + "&zip=" + zip,
                success: function(html) {

                    var text = $(html).text();
                    //Pulls hidden div that includes "true" in the success response
                    var response = text.substr(text.length - 4);

                    if (response == "true") {

                        $("#message").html(html);

                        $('#submit').hide();
                    } else {
                        $("#message").html(html);
                        $('#submit').show();
                    }
                },
                beforeSend: function() {
                    $("#message").html("<p class='text-center'><img src='login/images/ajax-loader.gif'></p>")
                }
            });
        }
        return false;
    });
});
