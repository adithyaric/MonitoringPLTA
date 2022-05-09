<?php include "header.php"; ?>
<?php include "koneksi.php"; ?>
<?php
$sql = "SELECT tegangan as count FROM tb_grafik ORDER BY id";
$viewer = mysqli_query($koneksiMonitoring, $sql);
$viewer = mysqli_fetch_all($viewer, MYSQLI_ASSOC);
$viewer = json_encode(array_column($viewer, 'count'), JSON_NUMERIC_CHECK); ?>

<div class="container mt-5 px-8 py-10">
    <div class="row">
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead style="vertical-align: middle;">
                                <tr>
                                    <th class="text-center" width="50px">No</th>
                                    <th class="text-center" width="150px">Judul</th>
                                    <th class="text-center" width="100px">Penjelasan</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                $data_statistik = $koneksiMonitoring->query("SELECT * FROM tb_artikel ORDER BY created_at ASC");
                                $jumlah_data = $data_statistik->num_rows;

                                if ($jumlah_data > 0) {
                                    while ($pecah = $data_statistik->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td class="text-center" width="30px"><?php echo $no; ?></td>
                                            <td><?php echo $pecah['judul']; ?></td>
                                            <td><?php echo $pecah['penjelasan']; ?></td>
                                        </tr>

                                    <?php
                                        $no++;
                                    }
                                } else {
                                    ?>

                                    <tr>
                                        <td colspan="8">
                                            <center>Data tidak ditemukan !</center>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <div id="container1"></div>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <div id="container2"></div>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- highcharts.js -->
<script language="JavaScript">
    var data_viewer = <?php echo $viewer; ?>;
    $(document).ready(function() {

        var chart = {
            type: 'line'
        };
        var title = {
            text: 'Grafik Kolom'
        };
        var subtitle = {
            text: 'Source: WorldClimate.com'
        };
        var xAxis = {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            crosshair: true
        };
        var yAxis = {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        };
        var tooltip = {
            headerFormat: '<span style = "font-size:50px">{point.key}</span><table>',
            pointFormat: '<tr><td style = "color:{series.color};padding:0">{series.name}: </td>' + '<td style = "padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        };
        var plotOptions = {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        };
        var credits = {
            enabled: false
        };
        var series = [{
                name: 'Tokyo',
                data: [100, 200, 300, 400, 500]
            },
            {
                name: 'tb_statistik',
                data: data_viewer
            }
        ];

        var json = {};
        json.chart = chart;
        json.title = title;
        json.subtitle = subtitle;
        json.tooltip = tooltip;
        json.xAxis = xAxis;
        json.yAxis = yAxis;
        json.series = series;
        json.plotOptions = plotOptions;
        json.credits = credits;
        $('#container').highcharts(json);

    });

    Highcharts.chart('container1', {

        title: {
            text: 'Solar Employment Growth by Sector, 2010-2016'
        },

        subtitle: {
            text: 'Source: thesolarfoundation.com'
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Range: 2010 to 2017'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2010
            }
        },

        series: [{
            name: 'Installation',
            data: data_viewer
        }, {
            name: 'Manufacturing',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        }, {
            name: 'Sales & Distribution',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        }, {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        }, {
            name: 'Other',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });

    Highcharts.chart('container2', {

        title: {
            text: 'Solar Employment Growth by Sector, 2010-2016'
        },

        subtitle: {
            text: 'Source: thesolarfoundation.com'
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Range: 2010 to 2017'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2010
            }
        },

        series: [{
            name: 'Installation',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
        }, {
            name: 'Manufacturing',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        }, {
            name: 'Sales & Distribution',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        }, {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        }, {
            name: 'Other',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script>
<?php include "footer.php"; ?>