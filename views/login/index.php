<?php
/* @var $model User */

use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

?>
<section class="modal enter-form form-modal" id="enter-form">
    <h2>Вход на сайт</h2>
    <?php
    $form = ActiveForm::begin(['id' => 'login-form', 'errorCssClass' => 'field--error', 'options' => ['class' => 'log-in', 'method' => 'post']]); ?>

    <?= $form->field($loginForm, 'email', ['template' => "{input}\n{error}", 'errorOptions' => ['class' => 'field__error-message'],
        'options' => ['class' => 'field log-in__field']])
        ->textInput(['class' => 'field__input input input--big', 'placeholder' => 'Электронная почта']); ?>

    <?= $form->field($loginForm, 'password_hash', ['template' => "{input}\n{error}", 'errorOptions' => ['class' => 'field__error-message'],
        'options' => ['class' => 'field log-in__field']])
        ->passwordInput(['class' => 'field__input input input--big', 'placeholder' => 'Пароль']); ?>
    <button class="button" type="submit">Войти</button>
    <?php ActiveForm::end(); ?>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>
