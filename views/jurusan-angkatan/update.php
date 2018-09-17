<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JurusanAngkatan */

$this->title = "Sunting Jurusan Angkatan";
$this->params['breadcrumbs'][] = ['label' => 'Jurusan Angkatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="jurusan-angkatan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
