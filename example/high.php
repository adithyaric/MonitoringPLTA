<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="grafik_garis"></div>
    <div id="grafik_batang"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <script>
        $(document).ready(function() {
            chart_grafik_garis = new Highcharts.chart('grafik_garis', {
                chart: {
                    type: 'line',
                    events: {
                        load: requestDataGaris
                    }
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: 'Grafik Realisasi Fisik dan Keuangan Versi Garis'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    gridLineWidth: 1
                },
                yAxis: {
                    title: {
                        text: 'Persentase (%)'
                    },
                    min: 0,
                    max: 100,
                    tickInterval: 10,
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                    },
                },
            });

            chart_grafik_batang = new Highcharts.chart('grafik_batang', {
                chart: {
                    type: 'column',
                    events: {
                        load: requestDataBatang
                    }
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: 'Grafik Realisasi Fisik dan Keuangan Versi Batang'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    gridLineWidth: 1
                },
                yAxis: {
                    title: {
                        text: 'Persentase (%)'
                    },
                    min: 0,
                    max: 100,
                    tickInterval: 10,
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                    },
                },
            });
        });


        function requestDataGaris() {
            var rf = [];
            var rk = [];
            var ba = 7;
            $.ajax({
                url: 'high_data.php',
                type: "GET",
                dataType: "json",
                success: function(data) {
                    chart_grafik_garis.addSeries({
                        name: "Target Fisik",
                        data: data.fisik
                    });
                    chart_grafik_garis.addSeries({
                        name: "Realisasi Fisik",
                        data: data.r_fis
                    });
                    chart_grafik_garis.addSeries({
                        name: "Target Keuangan",
                        data: data.keu
                    });
                    chart_grafik_garis.addSeries({
                        name: "Realisasi Keuangan",
                        data: data.r_keu
                    });
                    // call it again after one second
                    // setTimeout(requestDataGaris, 1000);
                },
                cache: false
            });
        }


        function requestDataBatang() {
            var rf = [];
            var rk = [];
            var ba = 7;
            $.ajax({
                url: 'high_data.php',
                type: "GET",
                dataType: "json",
                success: function(data) {
                    chart_grafik_batang.addSeries({
                        name: "Target Fisik",
                        data: data.fisik
                    });
                    chart_grafik_batang.addSeries({
                        name: "Realisasi Fisik",
                        data: data.r_fis
                    });
                    chart_grafik_batang.addSeries({
                        name: "Target Keuangan",
                        data: data.keu
                    });
                    chart_grafik_batang.addSeries({
                        name: "Realisasi Keuangan",
                        data: data.r_keu
                    });
                },
                cache: false
            });
        }
    </script>
</body>

</html>