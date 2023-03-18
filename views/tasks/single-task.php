<?php use yii\helpers\Html;

/**
 * @var app\models\Task $task
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Task;

?>

<main class="main-content container">

    <div class="left-column">
        <div class="head-wrapper">
            <h3 class="head-main"><?php echo $task->name; ?></h3>
            <p class="price price--big"><?php echo $task->budget; ?> UAH</p>
        </div>
        <p class="task-description">
            <?php echo $task->description; ?>
        </p>

        <?php if ($taskOwnerStatus === 'executor'): ?>
            <a class="button button--blue action-btn" data-action="act_response">Откликнуться на задание</a>
        <?php endif; ?>

        <?php if ($task->executor_id === \Yii::$app->user->identity->id): ?>
            <a class="button button--orange action-btn" data-action="refusal">Отказаться от задания</a>
        <?php endif; ?>

        <?php

        if ($task->user_id === \Yii::$app->user->identity->id && $task->status === 'new' && $taskOwnerStatus === 'customer'): ?>
            <a class="button button--pink action-btn" data-action="completion">Завершить задание</a>
        <?php endif; ?>

        <div class="task-map">
            <?php echo Html::img('img/map.png'); ?>
            <p class="map-address town">Москва</p>
            <p class="map-address">Новый арбат, 23, к. 1</p>
        </div>
        <?php

        echo Yii::getAlias('@web');
        if (count($task->replies) > 0): ?>
            <h4 class="head-regular">Отклики на задание</h4>
        <?php endif; ?>


        <?php foreach ($task->replies as $reply): ?>

            <?php if (\Yii::$app->user->identity->id === $task->user_id||\Yii::$app->user->identity->id===$reply->user_id): ?>
                <div class="response-card">
                    <?php

                    if (file_exists("img/" . $reply->user->user_img)) {
                        echo \yii\helpers\Html::img("@web/img/{$reply->user->user_img}", ['alt' => 'Фотка ', 'id' => '', 'width' => 100, 'height' => 100]);
                    }

                    ?>
                    <div class="feedback-wrapper">

                        <a href="#" class="link link--block link--big"><?php echo $reply->user->name; ?></a>
                        <div class="response-wrapper">
                            <div class="stars-rating small">
                                <?php for ($i = 0; $i < $reply->user->getAvgRating(); $i++): ?>
                                    <span class="fill-star"></span>
                                <?php endfor; ?>
                            </div>
                            <?php if (count($reply->user->replies) > 0): ?>
                                <p class="reviews"><?= count($reply->user->replies) ?> отзыва</p>
                            <?php endif; ?>
                        </div>
                        <p class="response-message">
                            <?php echo $reply->description; ?>
                        </p>
                    </div>

                    <div class="feedback-wrapper">
                        <p class="info-text"><span class="current-time"> <?php echo $reply->getWasOnSite(); ?></span>
                            назад
                        </p>
                        <p class="price price--small"><?php echo $reply->price; ?> uah</p>
                    </div>



                    <div class="button-popup">
                        <?php

                        if (\Yii::$app->user->identity->id === $task->user_id && $taskOwnerStatus === 'customer'&&$task->status!=='in_progress'&&$reply_status!=='rejected'):?>
                            <a href="<?php echo Url::to(['tasks/accept-task-reply/', 'id' => $task->id, 'user_id' => $reply->user->id]); ?>"
                               class="button button--blue button--small">Принять</a>
                            <a href="<?php echo Url::to(['tasks/reject-task-reply/', 'task_id' => $task->id, 'user_id' => $reply->user->id]); ?>"
                               class="button button--orange button--small">Отказать</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
    <div class="right-column">
        <div class="right-card black info-card">
            <h4 class="head-card">Информация о задании</h4>
            <dl class="black-list">
                <dt>Категория</dt>
                <dd><?php echo $task->category->name; ?></dd>
                <dt>Дата публикации</dt>
                <dd><?php

                    echo $task->getWasOnSite(); ?>
                </dd>
                <dt>Срок выполнения</dt>
                <dd><?php echo $task->expire; ?></dd>
                <dt>Статус</dt>
                <?php if ($task->status === 1): ?>
                    <dd>Открыт для новых заказов</dd>
                <?php else: ?>
                    <dd>Закрыт для новых заказов</dd>
                <?php endif; ?>
            </dl>
        </div>
        <div class="right-card white file-card">
            <h4 class="head-card">Файлы задания</h4>
            <ul class="enumeration-list">

                <?php foreach ($files as $file): ?>

                    <?php if (file_exists(Yii::getAlias("@app/web/uploads/" . $file->files_name))): ?>
                        <li class="enumeration-item">
                            <a href="<?php echo Url::to('@web/uploads/' . $file->files_name); ?>"
                               class="link link--block link--clip"><?php echo $file->files_name; ?></a>
                            <p class="file-size">
                                <?php
                                $size = filesize(Yii::getAlias('@webroot') . '/uploads/' . $file->files_name);
                                echo Yii::$app->formatter->asShortSize($size);
                                ?>
                            </p>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</main>
<section class="pop-up pop-up--refusal pop-up--close">
    <div class="pop-up--wrapper">
        <h4>Отказ от задания</h4>
        <p class="pop-up-text">
            <b>Внимание!</b><br>
            Вы собираетесь отказаться от выполнения этого задания.<br>
            Это действие плохо скажется на вашем рейтинге и увеличит счетчик проваленных заданий.
        </p>
        <a href="<?php echo Url::to(['tasks/rejected-task/'.$task->id]); ?>"
           class="button button--pop-up button--orange">Отказаться</a>
        <div class="button-container">
            <button class="button--close" type="button">Закрыть окно</button>
        </div>
    </div>
</section>
<section class="pop-up pop-up--completion pop-up--close">
    <div class="pop-up--wrapper">
        <h4>Завершение задания</h4>
        <p class="pop-up-text">
            Вы собираетесь отметить это задание как выполненное.
            Пожалуйста, оставьте отзыв об исполнителе и отметьте отдельно, если возникли проблемы.
        </p>
        <div class="completion-form pop-up--form regular-form">

            <?php

            $finishReplyModel = new \app\models\FinishReply(); // разные модели
            $form = ActiveForm::begin(['action' => ['tasks/finish-task/' . $id]]); // перенаправить на нужный экшн
            ?>
            <div class="form-group">
                <?php echo $form->field($finishReplyModel, 'your_comment_finish_task')->textarea()->label(); ?>
            </div>
            <!--
            <p class="completion-head control-label">Оценка работы</p>
            <div class="stars-rating big active-stars">
                <span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>
            </div>
-->
            <?php echo $form->field($finishReplyModel, 'finish_task_rate')->textInput()->label(); ?>
            <?php echo Html::submitButton('Завершить', ['class' => 'button button--pop-up button--blue']) ?>
            <?php ActiveForm::end(); ?>

        </div>
        <div class="button-container">
            <button class="button--close" type="button">Закрыть окно</button>
        </div>
    </div>
</section>

<section class="pop-up pop-up--act_response pop-up--close">
    <div class="pop-up--wrapper">
        <h4>Добавление отклика к заданию</h4>
        <p class="pop-up-text">
            Вы собираетесь оставить свой отклик к этому заданию.
            Пожалуйста, укажите стоимость работы и добавьте комментарий, если необходимо.
        </p>
        <div class="addition-form pop-up--form regular-form">
            <?php

            $addReplyModel = new \app\models\AddReply(); // разные модели
            $form = ActiveForm::begin(['action' => ['tasks/add-reply/' . $id]]); // перенаправить на нужный экшн

            ?>

            <?php echo $form->field($addReplyModel, 'your_comment')->textarea()->label(); ?>

            <?php echo $form->field($addReplyModel, 'price')->textInput()->label(); ?>
            <?php echo Html::submitButton('Завершить', ['class' => 'button button--pop-up button--blue']) ?>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="button-container">
          