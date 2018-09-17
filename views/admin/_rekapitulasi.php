<?php

use app\components\Helper;
use app\models\Pekerjaan;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $this yii\web\View */
/** @var $pekerjaanSearch \app\models\PekerjaanSearch */

$tahun = $pekerjaanSearch->tahun;
$id_satker = $pekerjaanSearch->id_satker;
$id_sumber_dana = $pekerjaanSearch->id_sumber_dana;
$id_jenis_pengadaan = $pekerjaanSearch->id_jenis_pengadaan;
$id_metode_pengadaan = $pekerjaanSearch->id_metode_pengadaan;

?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h2 class="box-title"> <i class="fa fa-pie-chart"></i> Rekapitulasi Data </h2>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <p>Jumlah Paket RUP</p>

                        <h3>
                            <?= Helper::rp(Pekerjaan::getCountPekerjaan(Yii::$app->request->queryParams),0); ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-legal"></i>
                    </div>
                    <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',
                        array_merge(['pekerjaan/index'],Yii::$app->request->queryParams),
                        ['class'=>'small-box-footer']
                    ); ?>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <p>Jumlah Paket Realisasi</p>

                        <h3>
                            <?= Helper::rp(Pekerjaan::getCountPekerjaanRealisasi(Yii::$app->request->queryParams),0); ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-legal"></i>
                    </div>
                    <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',
                        array_merge(['pekerjaan/index','PekerjaanSearch[tahap]'=>Pekerjaan::TAHAP_SELESAI_PENGADAAN],Yii::$app->request->queryParams),
                        ['class'=>'small-box-footer']
                    ); ?>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <p>Belum Kontrak</p>

                        <h3>
                            <?= Helper::rp(Pekerjaan::getCountPekerjaanBelumKontrak(Yii::$app->request->queryParams),0); ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-remove"></i>
                    </div>
                    <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',
                        array_merge(['pekerjaan/index','PekerjaanSearch[tahap]'=>Pekerjaan::TAHAP_BELUM_KONTRAK],Yii::$app->request->queryParams),
                        ['class'=>'small-box-footer']
                    ); ?>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <p>Sudah Kontrak</p>

                        <h3>
                            <?= Helper::rp(Pekerjaan::getCountSudahKontrak(Yii::$app->request->queryParams),0); ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-legal"></i>
                    </div>
                    <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',
                        array_merge(['pekerjaan/index','PekerjaanSearch[tahap]'=>Pekerjaan::TAHAP_SUDAH_KONTRAK],Yii::$app->request->queryParams),
                        ['class'=>'small-box-footer']
                    ); ?>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <p>Belum BAST</p>

                        <h3>
                            <?= Helper::rp(Pekerjaan::getCountBelumBast(Yii::$app->request->queryParams),0); ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-refresh"></i>
                    </div>
                    <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',
                        array_merge(['pekerjaan/index','PekerjaanSearch[tahap]'=>Pekerjaan::TAHAP_BELUM_BAST],Yii::$app->request->queryParams),
                        ['class'=>'small-box-footer']
                    ); ?>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <p>Sudah BAST</p>

                        <h3>
                            <?= Helper::rp(Pekerjaan::getCountSudahBast(Yii::$app->request->queryParams),0); ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',
                        array_merge(['pekerjaan/index','PekerjaanSearch[tahap]'=>Pekerjaan::TAHAP_SUDAH_BAST],Yii::$app->request->queryParams),
                        ['class'=>'small-box-footer']
                    ); ?>
                </div>
            </div>
        </div><!-- .row -->
    </div><!-- .box-body -->
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h2 class="box-title"> <i class="fa fa-pie-chart"></i> Rekapitulasi Data </h2>
    </div>
    <div class="box-body">    
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <p>Nilai Pagu Total (Rp)</p>

                        <h3 style="font-size: 27px"><?= Helper::rp(Pekerjaan::getCountTotal('nilai_pagu',$tahun,$id_satker,$id_sumber_dana,$id_jenis_pengadaan,$id_metode_pengadaan),0); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check" style="margin-top: 20px" ></i>
                    </div>
                    <a href="<?=Url::to(['pekerjaan/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <p>Nilai Pagu Kontrak (Rp)</p>

                        <h3 style="font-size: 27px"><?= Helper::rp(Pekerjaan::getCountTotal('nilai_hps',$tahun,$id_satker,$id_sumber_dana,$id_jenis_pengadaan,$id_metode_pengadaan),0); ?></h3>

                    </div>
                    <div class="icon">
                        <i class="fa fa-check" style="margin-top: 20px" ></i>
                    </div>
                    <a href="<?=Url::to(['pekerjaan/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p>Nilai Kontrak (Rp)</p>

                        <h3 style="font-size: 27px"><?= Helper::rp(Pekerjaan::getCountTotal('nilai_kontrak',$tahun,$id_satker,$id_sumber_dana,$id_jenis_pengadaan,$id_metode_pengadaan),0); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check" style="margin-top: 20px" ></i>
                    </div>
                    <a href="<?=Url::to(['pekerjaan/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <p>Total Efisiensi (Rp)</p>

                        <h3 style="font-size: 27px"><?= Helper::rp(Pekerjaan::getCountEfisiensi($tahun,$id_satker,$id_sumber_dana,$id_jenis_pengadaan,$id_metode_pengadaan),0); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check" style="margin-top: 20px" ></i>
                    </div>
                    <a href="<?=Url::to(['pekerjaan/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        
    </div>
</div>
