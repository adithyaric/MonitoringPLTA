<?php include "header.php"; ?>
<?php include "koneksi.php"; ?>

<div class="mt-3 jumbotron text-center">

    <h1 class="display-4">Monitoring PLTA</h1>
    <p class="lead">
        <a href="crud.php"><button type="button" class="btn btn-primary">Edit Artikel</button></a>
        <a href="#"><button type="button" class="btn btn-danger">Buttons</button></a>
    </p>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <?php
        $no = 1;
        $data_statistik = $koneksiMonitoring->query("SELECT * FROM tb_artikel ORDER BY id ASC");
        $jumlah_data = $data_statistik->num_rows;

        if ($jumlah_data > 0) {
            while ($pecah = $data_statistik->fetch_assoc()) {
        ?>
                <div class="col-sm-6 mb-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div id="<?php echo 'container' . $no; ?>"></div>
                            <a href="#" class="btn btn-primary btn-detail" data-id="<?= $pecah['id']; ?>" data-judul="<?= $pecah['judul']; ?>" data-penjelasan="<?= $pecah['penjelasan']; ?>">Detail</a>
                        </div>
                    </div>
                </div>
            <?php $no++;
            }
        } else { ?>
            <tr>
                <td colspan="8">
                    <center>Data tidak ditemukan !</center>
                </td>
            </tr>
        <?php
        }
        ?>
    </div>
</div>

<!-- highcharts.js -->
<script>
    var data_created_at = []
    var data_tegangan = []
    var data_arus_sebelum_bc = []
    var data_arus_sebelum_ca = []
    var data_kecepatan_angin = []
    var data_intensitas = []
    $(document).ready(function() {
        $.ajax({
            url: 'data.php',
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                var length = response.length;

                for (let i = 0; i < length; i++) {
                    data_created_at.push(response[i].created_at);
                    data_tegangan.push(response[i].tegangan);
                    data_arus_sebelum_bc.push(response[i].arus_sebelum_bc);
                    data_arus_sebelum_ca.push(response[i].arus_sebelum_ca);
                    data_kecepatan_angin.push(response[i].kecepatan_angin);
                    data_intensitas.push(response[i].intensitas);
                }

                console.log(data_intensitas);
                Highcharts.chart("container1", {
                    title: {
                        text: "Tegangan dan Arus Sebelum Boost",
                    },

                    yAxis: {
                        title: {
                            text: "Satuan e opo ra erti",
                        },
                    },

                    xAxis: {
                        categories: data_created_at,
                        title: {
                            enabled: true,
                            text: "Satuan e opo ra erti",
                        },
                    },

                    legend: {
                        layout: "vertical",
                        align: "right",
                        verticalAlign: "middle",
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false,
                            },
                        },
                    },

                    series: [{
                            name: "Tegangan",
                            data: data_tegangan,
                        },
                        {
                            name: "Arus Sebelum Boost",
                            data: data_arus_sebelum_bc,
                        },
                    ],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500,
                            },
                            chartOptions: {
                                legend: {
                                    layout: "horizontal",
                                    align: "center",
                                    verticalAlign: "bottom",
                                },
                            },
                        }, ],
                    },
                });

                Highcharts.chart("container2", {
                    title: {
                        text: "Tegangan dan Arus Sebelum Charger Aki",
                    },

                    yAxis: {
                        title: {
                            text: "Number of Employees",
                        },
                    },

                    xAxis: {
                        categories: data_created_at,
                        title: {
                            enabled: true,
                            text: "Satuan e opo ra erti",
                        },
                    },

                    legend: {
                        layout: "vertical",
                        align: "right",
                        verticalAlign: "middle",
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false,
                            },
                        },
                    },

                    series: [{
                            name: "Tegangan",
                            data: data_tegangan,
                        },
                        {
                            name: "Arus Sebelum Charger Aki",
                            data: data_arus_sebelum_ca,
                        },
                    ],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500,
                            },
                            chartOptions: {
                                legend: {
                                    layout: "horizontal",
                                    align: "center",
                                    verticalAlign: "bottom",
                                },
                            },
                        }, ],
                    },
                });

                Highcharts.chart("container3", {
                    title: {
                        text: "Kecepatan Angin",
                    },

                    yAxis: {
                        title: {
                            text: "Number of Employees",
                        },
                    },

                    xAxis: {
                        categories: data_created_at,
                        title: {
                            enabled: true,
                            text: "Satuan e opo ra erti",
                        },
                    },

                    legend: {
                        layout: "vertical",
                        align: "right",
                        verticalAlign: "middle",
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false,
                            },
                        },
                    },

                    series: [{
                        name: "Kecepatan Angin",
                        data: data_kecepatan_angin,
                    }, ],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500,
                            },
                            chartOptions: {
                                legend: {
                                    layout: "horizontal",
                                    align: "center",
                                    verticalAlign: "bottom",
                                },
                            },
                        }, ],
                    },
                });

                Highcharts.chart("container4", {
                    title: {
                        text: "Intensitas Cahaya Matahari",
                    },

                    yAxis: {
                        title: {
                            text: "Number of Employees",
                        },
                    },

                    xAxis: {
                        categories: data_created_at,
                        title: {
                            enabled: true,
                            text: "Satuan e opo ra erti",
                        },
                    },

                    legend: {
                        layout: "vertical",
                        align: "right",
                        verticalAlign: "middle",
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false,
                            },
                        },
                    },

                    series: [{
                        name: "Intensitas",
                        data: data_intensitas,
                    }, ],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500,
                            },
                            chartOptions: {
                                legend: {
                                    layout: "horizontal",
                                    align: "center",
                                    verticalAlign: "bottom",
                                },
                            },
                        }, ],
                    },
                });

            }
        });
    });
</script>

<!-- Modal  detail-->
<form enctype="multipart/form-data" class="needs-validation" novalidate>
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control judul" name="judul" readonly>
                    </div>
                    <div class="form-group">
                        <label>Penjelasan</label>
                        <textarea class="form-control penjelasan" name="penjelasan" rows="20" readonly></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal  detail-->
<?php include "footer.php"; ?>