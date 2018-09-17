<?php /*
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Pekerjaan Berdasarkan Tahun</h3>
            </div>
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'GRAFIK JUMLAH PENGADAAN BERDASARKAN TAHUN'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'line' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'line',
                                'name' => 'Jumlah Pekerjaan',
                                'data' => Pekerjaan::getGrafikPekerjaanByTahun([
                                    'tahun' => $tahun,
                                    'id_satker' => $id_satker,
                                    'id_unit' => $id_unit

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
                <h3 class="box-title">Pekerjaan Berdasarkan Satker</h3>
            </div>
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'GRAFIK JUMLAH PENGADAAN BERDASARKAN SATKER'],
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
                                'data' => Satker::getGrafikPekerjaanBySatker(),
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
                <h3 class="box-title">Pekerjaan Berdasarkan Metode</h3>
            </div>
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'GRAFIK JUMLAH BERDASARKAN METODE PENGADAAN'],
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
                                'data' => PekerjaanMetode::getGrafikPekerjaanByMetodePekerjaan(),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>
    </div>  
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Pekerjaan</h3>
            </div>
            <div class="box-body">
                <?php echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                        'themes/grid-light',
                    ],
                    'options' => [
                        'title' => [
                            'text' => 'Combination chart',
                        ],
                        'xAxis' => [
                            'categories' => Satker::getListSatkerGrafik(),
                        ],
                        'labels' => [
                            'items' => [
                                [
                                    'html' => 'Total Anggaran',
                                    'style' => [
                                        'left' => '50px',
                                        'top' => '18px',
                                    ],
                                ],
                            ],
                        ],
                        'series' => [
                                [
                                    'type' => 'column',
                                    'name' => 'Total PAGU',
                                    'data' => Satker::getGrafikNilaiAnggaranByTahun('nilai_pagu',$tahun),
                                ],
                                [
                                    'type' => 'column',
                                    'name' => 'Total HPS',
                                    'data' => Satker::getGrafikNilaiAnggaranByTahun('nilai_hps',$tahun),
                                ],      
                                [
                                    'type' => 'column',
                                    'name' => 'Jumlah Penawaran',
                                    'data' => Satker::getGrafikNilaiAnggaranByTahun('nilai_penawaran',$tahun),
                                ],
                                [
                                    'type' => 'column',
                                    'name' => 'Nilai Kontrak',
                                    'data' => Satker::getGrafikNilaiAnggaranByTahun('nilai_kontrak',$tahun),
                                ],
                                [
                                    'type' => 'column',
                                    'name' => 'Efisiensi',
                                    'data' => Satker::getGrafikNilaiAnggaranByTahun('efisiensi',$tahun),
                                ],                                                                                               
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>        
</div> */ ?>