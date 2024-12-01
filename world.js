$(document).ready(function(){
    $("form").submit(function(event) {
        event.preventDefault();
    });

    $("#lookup").click(function(event) {
        event.preventDefault();

        const country = $('#country').val();
        const lookup = "country";

        $.ajax({url: "http://localhost/info2180-lab5/world.php",type: "GET",data: {country: country, lookup:lookup}})
        .done(function(result) {
            $('#result').html(result);  // Display the result in the result div
        })
        .fail(function() {
            alert("There seems to be an error.");
        });
    });

    $("#cities").click(function(event) {
        event.preventDefault();

        const country = $('#country').val();
        const lookup = "cities";

        $.ajax({url: "http://localhost/info2180-lab5/world.php",type: "GET",data: {country: country, lookup:lookup}})
        .done(function(result) {
            $('#result').html(result);  // Display the result in the result div
        })
        .fail(function() {
            alert("There seems to be an error.");
        });
    });
});