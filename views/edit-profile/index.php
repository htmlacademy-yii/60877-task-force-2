<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<main class="main-content main-content--left container">
    <div class="left-menu left-menu--edit">
        <h3 class="head-main head-task">Настройки</h3>
        <ul class="side-menu-list">
            <li class="side-menu-item side-menu-item--active">
                <a class="link link--nav">Мой профиль</a>
            </li>
            <li class="side-menu-item">
                <a href="#" class="link link--nav">Безопасность</a>
            </li>
            <li class="side-menu-item">
                <a href="#" class="link link--nav">Уведомления</a>
            </li>
        </ul>
    </div>
    <div class="my-profile-form">

        <?php
        $form = ActiveForm::begin(['options' => ['method' => 'post', 'enableAjaxValidation' => true]]); ?>
        <h3 class="head-main head-regular">Мой профиль</h3>
        <div class="photo-editing">
          <!--  <div>
                <p class="form-label">Аватар</p>


            <img class="avatar-preview" src="img/man-glasses.png" width="83" height="83">
            </div>
            <input hidden value="Сменить аватар" type="file" id="button-input">
            <label for="button-input" class="button button--black"> Сменить аватар</label>


        </div>-->

            <?php
            $user = Yii::$app->user->identity;

            if ($user->user_img) {
                echo Html::img("@web/uploads/" . $user->user_img, ["class" => "avatar-preview", "width" => "83", "height" => "83"]);
            } else {
                echo Html::img("img/man-glasses.png", ["class" => "avatar-preview", "width" => "83", "height" => "83"]);
            }
            ?>
            <?= $form->field($model, 'user_img', ['options' => ['class' => ''], 'template' => "{input}\n{error}"])
                ->fileInput(['class' => '', 'id' => 'button-input'])
                ->label('Сменить аватар', ['for' => 'button-input', 'class' => 'button button--black']) ?>


        </div>
        <div class="form-group">
            <?= $form->field($model, 'name', ['errorOptions' => ['id' => 'help-block'],
                'options' => ['id' => 'profile-name1']])
                ->textInput(['value' => $user->name])->label('Ваше имя'); ?>
        </div>
        <div class="half-wrapper">
            <div class="form-group">
                <?= $form->field($model, 'email', ['errorOptions' => ['id' => 'help-block'],
                    'options' => ['id' => 'profile-name2']])
                    ->textInput(['value' => $user->email])->label('Email'); ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'date_of_birth', ['errorOptions' => ['id' => 'help-block'],
                    'options' => ['id' => 'profile-name']])
                    ->textInput(['value' => $user->date_of_birth])->label('День Рождения'); ?>
            </div>
        </div>
        <div class="half-wrapper">
            <div class="form-group">
                <?= $form->field($model, 'phone', ['errorOptions' => ['id' => 'help-block'],
                    'options' => ['id' => 'profile-name3']])
                    ->textInput(['value' => $user->phone])->label('Телефон'); ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'telegram', ['errorOptions' => ['id' => 'help-block'],
                    'options' => ['id' => 'profile-name4']])
                    ->textInput(['value' => $user->telegram])->label('Телеграм'); ?>
            </div>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'quote', ['errorOptions' => ['id' => 'help-block'],
                'options' => ['id' => 'profile-name5']])
                ->textarea(['value' => $user->quote])->label('Информация о себе'); ?>
        </div>
        <div class="form-group">
            <p class="form-label">Выбор специализаций</p>
            <div class="checkbox-profile">


                <?php foreach ($categories as $catName): ?>
                    <label class="control-label" for="сourier-services">
                        <input type="checkbox" id="сourier-services" checked>
                        <?php echo $catName->name; ?></label>
                <?php endforeach; ?>

            </div>
        </div>
        <input type="submit" class="button button--blue" value="Сохранить">
        <?php ActiveForm::end(); ?>


    </div>
</main>