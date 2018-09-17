<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KelasHari */

$this->title = "Tambah Kelas Hari";
$this->params['breadcrumbs'][] = ['label' => 'Kelas Haris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-hari-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
