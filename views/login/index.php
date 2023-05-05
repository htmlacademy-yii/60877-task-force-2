<?php
/* @var $model User */

use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\authclient\widgets\AuthChoice;

?>
<section class="modal enter-form form-modal" id="enter-form">
    <?= AuthChoice::widget([
        'baseAuthUrl' => ['site/auth'],
        'popupMode' => false,
    ]) ?>
    <h2>Вход на сайт</h2>
    <?php
    $form = ActiveForm::begin(['errorCssClass' => 'field--error', 'options' => ['method' => 'post', 'enableAjaxValidation' => true,]]); ?>
    <p>
        <?= $form->field($loginForm, 'email', ['template' => "{label}{input}\n{error}", 'errorOptions' => ['class' => 'field__error-message'],
            'options' => ['class' => 'field log-in__field', 'name' => "Baka"]])
            ->textInput(['class' => 'enter-form-email input input-middle']); ?>
    </p>
    <p>
        <?= $form->field($loginForm, 'password', ['template' => "{label}{input}\n{error}", 'errorOptions' => ['class' => 'field__error-message'],
            'options' => ['class' => 'field log-in__field']])
            ->passwordInput(['class' => 'enter-form-email input input-middle']); ?>
    </p>
    <button class="button" type="submit">Войти</button>
    <?php ActiveForm::end(); ?>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>
