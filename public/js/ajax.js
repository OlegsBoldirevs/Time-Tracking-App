$(document).ready(function() {

    var page = get_var('page'); //getting current page
    displayFromDatabase(page);
    $("#btn").click(function() { //after button is pressed
        var desc = $("#desc").val();
        var time = $("#time").val();

        //inserting data to database
        $.ajax({
            url: "includes/timelogs.inc.php",
            type: "POST",
            async: false,
            data: {
                "timeLogsSubmit": 1,
                "description": desc,
                "time": time,
            },
            success: function(data) {
                displayFromDatabase(page);
                //clearing input fields
                $("#desc").val('');
                $("#time").val('');
            }
        })
    });
});

//function that gets url variables
function get_var(var_name) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == var_name) {
            return pair[1];
        }
    }
    return (false);
}

//displaying logs
function displayFromDatabase(page) {
    if (page == '') {
        page = 1;
    }
    $.ajax({
        url: "../views/logsTable.view.php",
        type: "GET",
        async: false,
        data: 'page=' + page,
        success: function(d, data) {
            $("#logs").html(d); //printing out logs
        }
    });
}
