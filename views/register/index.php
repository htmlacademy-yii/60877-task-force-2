<?php

/** @var yii\web\View $this */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = 'Register page';
?>

<main class="container container--registration">
    <div class="center-block">
        <div class="registration-form regular-form">
            <?php


            $form = ActiveForm::begin([
                'method' => 'post',
            ]) ?>
            <h3 class="head-main head-task">Регистрация нового пользователя</h3>
            <div class="form-group">
                <?php echo $form->field($register, 'name')->textInput(['id' => 'username']); ?>
            </div>
            <div class="half-wrapper">
                <div class="form-group">
                    <?php echo $form->field($register, 'email')->textInput(['id' => 'email-user']); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->field($register, 'city')->dropdownList(
                        ArrayHelper::map($cities, 'id', 'name')
                    ); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->field($register, 'password')->passwordInput(['id' => 'password-user']); ?>
            </div>
            <div class="form-group">
                <?php echo $form->field($register, 'repeat_password')
                    ->passwordInput(['id' => 'password-repeat-user']); ?>
            </div>
            <div class="form-group">
                <?php

                $template = '{input}{label}{error}{hint}';
                echo $form->field($register, 'answer_orders', ['template' => $template])
                    ->checkbox(['id' => 'response-user', 'checked' => true, 'class' => 'control-label']);
                ?>


            </div>
            <?= Html::submitButton('Создать аккаунт', ['class' => 'button button--blue']) ?>
            <?php ActiveForm::end() ?>

        </div>
    </div>
</main>