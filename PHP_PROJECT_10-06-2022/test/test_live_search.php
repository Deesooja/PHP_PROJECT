<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search</title>
</head>

<body>
    <div id="user_live_search">
        <form id="user_live_searc_form" method="post">
            <input type="search" id="user_search" name="user_search">
        </form>
    </div>
    <div id="table">

    </div>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $("#user_search").on("keyup", function() {
                $.ajax({
                    url:" live_search_data.php",
                    data: $("#user_live_searc_form").serialize(),
                    success: function(data) {
                        $("#table").html(data);
                        console.log(data);

                    }

                });
            })

        });
    </script>

</body>

</html>