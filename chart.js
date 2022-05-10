    Highcharts.chart('container1', {

        title: {
            text: 'Tegangan dan Arus Sebelum Boost'
        },

        yAxis: {
            title: {
                text: 'Satuan e opo ra erti'
            }
        },

        xAxis: {
            categories: data_created_at,
            title: {
                enabled: true,
                text: 'Satuan e opo ra erti'
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
                }
            }
        },

        series: [{
            name: 'Tegangan',
            data: data_tegangan
        }, {
            name: 'Arus Sebelum Boost',
            data: data_arus_sebelum_bc
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
            text: 'Tegangan dan Arus Sebelum Charger Aki'
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },

        xAxis: {
            categories: data_created_at,
            title: {
                enabled: true,
                text: 'Satuan e opo ra erti'
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
                }
            }
        },

        series: [{
            name: 'Tegangan',
            data: data_tegangan
        }, {
            name: 'Arus Sebelum Charger Aki',
            data: data_arus_sebelum_ca
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

    Highcharts.chart('container3', {

        title: {
            text: 'Kecepatan Angin'
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },

        xAxis: {
            categories: data_created_at,
            title: {
                enabled: true,
                text: 'Satuan e opo ra erti'
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
                }
            }
        },

        series: [{
            name: 'Kecepatan Angin',
            data: data_kecepatan_angin
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

    Highcharts.chart('container4', {

        title: {
            text: 'Intensitas Cahaya Matahari'
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },

        xAxis: {
            categories: data_created_at,
            title: {
                enabled: true,
                text: 'Satuan e opo ra erti'
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
                }
            }
        },

        series: [{
            name: 'Intensitas',
            data: data_intensitas
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