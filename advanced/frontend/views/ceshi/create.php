<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Ceshi */

$this->title = 'Create Ceshi';
$this->params['breadcrumbs'][] = ['label' => 'Ceshis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ceshi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
