<?php

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\User;

$this->title = 'Страница добавления задания';
?>

<main class="main-content main-content--center container">
    <div class="add-task-form regular-form">

        <?php
        $form = ActiveForm::begin(['options' => ['method' => 'post', 'enctype' => 'multipart/form-data', 'enableAjaxValidation' => true]]); ?>
        <h3 class="head-main head-main">Публикация нового задания</h3>
       <!-- <div class="form-group">-->

            <?= $form->field($model, 'about_job', ['template' => '{label}{input}{error}{hint}', 'errorOptions' => ['id' => 'help-block'],
                'options' => ['class'=>'form-group']])
                ->textInput(['value' => ''])->label('Опишите суть работы', ['class' => 'control-label']); ?>
        <!-- </div>-->
        <!-- <div class="form-group">-->

            <?= $form->field($model, 'describe_task', ['errorOptions' => ['id' => 'help-block'],
                'options' => ['class' => 'form-group']])
                ->textarea(['value' => '', 'class' => 'username'])->label('Подробности задания', ['class' => 'control-label']); ?>
        <!--   </div>-->
      <!-- <div class="form-group">-->
            <?php echo $form->field($model, 'categories')->dropdownList(
                ArrayHelper::map($categories, 'id', 'name')
            ); ?>

        <!--  </div>-->
    <!-- <div class="form-group">-->

            <?= $form->field($model, 'location', ['errorOptions' => ['id' => 'help-block'],
                'options' => ['id' => 'location']])
                ->textInput(['class'=>'location-icon'])->label('Локация', ['class' => 'control-label']); ?>
    <!-- </div>-->
     <div class="half-wrapper">
         <!-- <div class="form-group">-->
                <?= $form->field($model, 'budget', ['errorOptions' => ['id' => 'help-block'],
                    'options' => []])
                    ->textInput(['class'=>'budget-icon'])->label('Бюджет', ['class' => 'control-label']); ?>
         <!--  </div>-->
         <!--  <div class="form-group">-->
                <?= $form->field($model, 'expire_date', ['errorOptions' => ['id' => 'help-block'],
                    'options' => []])
                    ->input('date')->label('Срок исполнения', ['class' => 'control-label']); ?>
         <!--   </div>-->
        </div>
        <p class="form-label">Файлы</p>

        <?= $form->field($model, 'files[]', ['errorOptions' => ['id' => 'help-block'],
            'options' => ['class' => 'add-file']])
            ->fileInput(['multiple' => 'multiple', 'accept' => ['pdf, png']])->label('', ['class' => 'control-label']); ?>

        <?= Html::submitButton('Опубликовать', ['class' => 'button button--blue']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</main>