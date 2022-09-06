<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta http-equiv=“cache-control“ content=“no-cache, no-store, must-revalidate“/>
    <meta http-equiv=“pragma“ content=“no-cache“/>
    <meta http-equiv=“expires“ content=“0″/>

    <link rel="stylesheet" href="css/mainstyle.css">

    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"-->
    <!--      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">-->
    <!---->
    <!--<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">-->

    <link href="bootstrap/bootstrap.css"
          rel="stylesheet" type="text/css">
    <link href="bootstrap/docs.css"
          rel="stylesheet" type="text/css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <script>
        $(document).ready(() => {
            $.ajax({
                url: "dynamiccontent/test.html"
            }).done((data) => {
                $("#content").append(data);

                $("a").click(function() {
                    var href = $(this).attr("href");
                    console.log(href);
                    return false;
                });
            });
        });
    </script>

</head>

<body>

<div class="container h-100 text-center">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-4" id="content">

        </div>
    </div>
</div>

<script src="bootstrap/bootstrap.bundle.js"
        type="text/javascript"></script>

</body>

</html>