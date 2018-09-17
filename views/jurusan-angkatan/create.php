<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JurusanAngkatan */

$this->title = "Tambah Jurusan Angkatan";
$this->params['breadcrumbs'][] = ['label' => 'Jurusan Angkatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurusan-angkatan-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
