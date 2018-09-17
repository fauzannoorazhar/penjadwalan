<?php 

use app\models\Pekerjaan;
use app\models\MetodePengadaan;
use app\models\JenisBelanja;
use app\models\Satker;
use miloschuman\highcharts\Highcharts;

/** @var $this yii\web\View */
/** @var $pekerjaanSearch \app\models\PekerjaanSearch */

$tahun = $pekerjaanSearch->tahun;
$id_satker = $pekerjaanSearch->id_satker;
$id_sumber_dana = $pekerjaanSearch->id_sumber_dana;
$id_jenis_pengadaan = $pekerjaanSearch->id_jenis_pengadaan;
$id_metode_pengadaan = $pekerjaanSearch->id_metode_pengadaan;

$metodeTitle = ($id_metode_pengadaan) ? MetodePengadaan::getNamaPekerjaanMetode($id_metode_pengadaan) : 'Semua Metode';
$satkerTitle = ($id_satker) ? Satker::getNamaSatker($id_satker) : 'Semua Satker' ;
?>

<div class="row">
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">Paket Per Metode Pengadaan</h2>
            </div>
            <div class="box-body">
                <?= Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'PAKET Per METODE PENGADAAN'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Jumlah Metode',
                                'data' => MetodePengadaan::getGrafikPekerjaanByMetodePengadaan([
                                    'tahun' => $tahun,
                                    'id_satker' => $id_satker,
                                    'id_sumber_dana' => $id_sumber_dana,
                                    'id_jenis_pengadaan' => $id_jenis_pengadaan,
                                    'id_metode_pengadaan' => $id_metode_pengadaan
                                ]),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>    
    </div>
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">Grafik Kontrak Pekerjaan Berdasarkan Jenis Belanja</h2>
            </div>
            <div class="box-body">
                <?= Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => "REKAPITULASI KONTRAK PEKERJAAN <br> BERDASARKAN JENIS BELANJA <br>".$satkerTitle],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Jumlah Pekerjaan',
                                'data' => JenisBelanja::getGrafikPekerjaanByJenisBelanja([
                                    'tahun' => $tahun,
                                    'id_satker' => $id_satker,
                                    'id_sumber_dana' => $id_sumber_dana,
                                    'id_jenis_pengadaan' => $id_jenis_pengadaan,
                                    'id_metode_pengadaan' => $id_metode_pengadaan
                                ]),
                            ],
                        ],
                    ],
                ]);?>
                <?php /*
                <?= Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'GRAFIK NILAI PEKERJAAN BERDASARKAN METODE'],
                        'exporting' => ['enabled' => true],
                        'xAxis' => [
                            'categories' => PekerjaanMetode::getListGrafik(),
                        ],                        
                        'plotOptions' => [
                            'column' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'column',
                                'name' => 'Nilai Pagu',
                                'data' => PekerjaanMetode::getGrafikNilaiPaguPekerjaanByMetodePekerjaan([
                                    'tahun' => $tahun,
                                    'id_satker' => $id_satker,
                                    'id_unit' => $id_unit

                                ]),
                            ],
                        ],
                    ],
                ]);?>
                */ ?>
            </div>
        </div>    
    </div>    

    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Rekapitulasi Proses Pekerjaan</h3>
            </div>
            <div class="box-body">
                <?= Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                        'themes/grid-light',
                    ],
                    'options' => [
                        'title' => [
                            'text' => "REKAPITULASI PROSES PEKERJAAN <br> PER METODE PEMILIHAN PENYEDIA <br> T. A $tahun",
                        ],
                        'xAxis' => [
                            'categories' => Satker::getListSatkerGrafik(),
                        ],
                        /*'labels' => [
                            'items' => [
                                [
                                    'html' => 'Total Anggaran',
                                    'style' => [
                                        'left' => '50px',
                                        'top' => '18px',
                                    ],
                                ],
                            ],
                        ],*/
                        'series' => Satker::getGrafikRekapitulasiProsesPekerjaanMetode($tahun)
                    ]
                ]); ?>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Progres Pelaksanaan Pengadaan Barang / Jasa</h3>
            </div>
            <div class="box-body">
                <?= Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                        'themes/grid-light',
                    ],
                    'options' => [
                        'title' => [
                            'text' => "PROGRES PELAKSANAN PENGADAAN BARANG/JASA <br> Metode : $metodeTitle <br> Satker : $satkerTitle <br> T. A $tahun",
                        ],
                        'xAxis' => [
                            'categories' => Satker::getListBulanGrafik(),
                        ],
                        'series' => [
                            [
                                'type' => 'column',
                                'name' => 'Proses Pengadaan',
                                'data' => Pekerjaan::getGrafikBulan('tanggal_pengumuman_pengadaan', $tahun, $id_satker, $id_sumber_dana, $id_jenis_pengadaan, $id_metode_pengadaan)
                            ],
                            [
                                'type' => 'column',
                                'name' => 'Ttd Kontrak',
                                'data' => Pekerjaan::getGrafikBulan('tanggal_kontrak', $tahun, $id_satker, $id_sumber_dana, $id_jenis_pengadaan, $id_metode_pengadaan)
                            ],
                            [
                                'type' => 'column',
                                'name' => 'Pelaksanaan Pekerjaan',
                                'data' => Pekerjaan::getGrafikBulan('waktu_pelaksanaan', $tahun, $id_satker, $id_sumber_dana, $id_jenis_pengadaan, $id_metode_pengadaan)
                            ],
                            [
                                'type' => 'column',
                                'name' => 'Serah Terima B/J',
                                    'data' => Pekerjaan::getGrafikBulan('tanggal_bast', $tahun, $id_satker, $id_sumber_dana, $id_jenis_pengadaan, $id_metode_pengadaan)
                            ],
                        ]
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>
