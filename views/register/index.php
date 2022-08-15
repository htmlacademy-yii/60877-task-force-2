<?php

/** @var yii\web\View $this */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Register page';
?>

<main class="container container--registration">
    <div class="center-block">
        <div class="registration-form regular-form">
            <?php

            $form = ActiveForm::begin([
                'method' => 'post'
            ]) ?>

            <h3 class="head-main head-task">Регистрация нового пользователя</h3>
            <div class="form-group">
                <?php echo $form->field($register, 'name')->textInput(['id' => 'username'])->label('Ваше Имя', ['class' => 'control-label']); ?>
            </div>
            <div class="half-wrapper">
                <div class="form-group">
                    <?php echo $form->field($register, 'email')->textInput(['id' => 'email-user'])->label('Email', ['class' => 'control-label']); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->field($register, 'city')->dropdownList([
                        'city1' => 'Киев',
                        'city2' => "Донецк",
                        'city3' => "Севастополь"
                    ]); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->field($register, 'password')->passwordInput(['id' => 'password-user'])->label('Пароль', ['class' => 'control-label']); ?>
            </div>
            <div class="form-group">

                <?php echo $form->field($register, 'retype_pass')
                    ->passwordInput(['id' => 'password-repeat-user'])
                    ->label('Пароль', ['class' => 'control-label']); ?>
            </div>
            <div class="form-group">
                <?php

                $radioTemplate = '<div class=\"radio\"><label class="control-label" for="response-user"><input id="response-user" type="checkbox" checked>Я собираюсь откликаться на заказы</label>{error}{hint}</div>';


                echo $form->field($register, 'answer_orders', ['template' => $radioTemplate])
                    ->checkbox(['id' => 'response-user'])->label("Я собираюсь откликаться на заказы"); ?>
            </div>
            <?= Html::submitButton('Создать аккаунт', ['class' => 'button button--blue']) ?>
            <?php ActiveForm::end() ?>

        </div>
    </div>
</main>