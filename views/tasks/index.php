<?php

/** @var yii\web\View $this */

/** @var \app\models\Tasks[] $tasks */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\FIlterTasks;

$this->title = 'My Yii Application';
?>
<main class="main-content container">
    <div class="left-column">
        <h3 class="head-main head-task">Новые задания</h3>


        <?php foreach ($tasks as $task): ?>


            <div class="task-card">
                <div class="header-task">
                    <a href="#" class="link link--block link--big"><?php echo $task->name; ?></a>
                    <p class="price price--task"><?php echo $task->budget; ?> ₽</p>
                </div>
                <p class="info-text"><span class="current-time"><?php echo $task->getWasOnSite(); ?> </span>назад</p>
                <p class="task-text"><?php echo $task->description; ?>
                </p>
                <div class="footer-task">
                    <p class="info-text town-text"><?php echo $task->address; ?></p>
                    <p class="info-text category-text"><?php echo $task->websiteCategories->name; ?></p>
                    <a href="<?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "/" . $task->id; ?>"
                       class="button button--black">Смотреть Задание</a>
                </div>
            </div>
        <?php endforeach; ?>


        <div class="pagination-wrapper">
            <ul class="pagination-list">
                <li class="pagination-item mark">
                    <a href="#" class="link link--page"></a>
                </li>
                <li class="pagination-item">
                    <a href="#" class="link link--page">1</a>
                </li>
                <li class="pagination-item pagination-item--active">
                    <a href="#" class="link link--page">2</a>
                </li>
                <li class="pagination-item">
                    <a href="#" class="link link--page">3</a>
                </li>
                <li class="pagination-item mark">
                    <a href="#" class="link link--page"></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="right-column">
        <div class="right-card black">
            <div class="search-form">
                <?php
                $form = ActiveForm::begin([
                    'options' => ['class' => 'search-task__form'],
                    'action' => 'controllers/TasksController'
                ]) ?>

                <!--      <form>-->
                <h4 class="head-card">Категории</h4>
                <div class="form-group">
                    <div>

                        <input type="checkbox" id="сourier-services" checked>
                        <label class="control-label" for="сourier-services">Курьерские услуги</label>

                        <input id="cargo-transportation" type="checkbox">
                        <label class="control-label" for="cargo-transportation">Грузоперевозки</label>

                        <input id="translations" type="checkbox">
                        <label class="control-label" for="translations">Переводы</label>

                    </div>
                </div>
                <h4 class="head-card">Дополнительно</h4>
                <div class="form-group">
                    <input id="without-performer" type="checkbox" checked>

                    <label class="control-label" for="without-performer">Без исполнителя</label>
                </div>
                <h4 class="head-card">Период</h4>
                <div class="form-group">
                    <label for="period-value"></label>
                    <select id="period-value">
                        <option>1 час</option>
                        <option>12 часов</option>
                        <option>24 часа</option>
                    </select>
                </div>
                <?= Html::submitButton('Искать', ['class' => 'button button--blue', 'value' => "Искать"]) ?>
                <!--    <input type="button" class="button button--blue" value="Искать">-->
                <!--  </form>-->
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</main>

