<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table align="center" border=1>

    </table>
    <?php include "data.php"; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        var data_tegangan = [];
        var data_intensitas_cahaya = [];
        //Jquery
        $(document).ready(function() {
            selesai();
        });

        function selesai() {
            setTimeout(function() {
                update();
                selesai();
            }, 200);
        }

        function update() {
            $.getJSON("data.php", function(data) {
                $("table").empty();
                var no = 1;
                $.each(data, function() {
                    data_tegangan = this['tegangan'];
                    data_intensitas_cahaya = this['intensitas_cahaya'];
                    $("table").append("<tr><td>" + (no++) + "</td><td>" + data_tegangan + "</td><td>" + data_intensitas_cahaya + "</td></tr>");
                });
            });
        }
    </script>
</body>

</html>