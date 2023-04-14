<?php

/** @var yii\web\View $this */

/** @var \yii\data\ActiveDataProvider $dataProvider */

/** @var \app\models\Category[] $categories */

/** @var \app\models\SearchTasks $modelSearch */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'My tasks';
?>

<main class="main-content container">
    <div class="left-menu">
        <h3 class="head-main head-task">Мои задания</h3>
        <ul class="side-menu-list">
            <li class="side-menu-item side-menu-item--active">
                <a href="<?php echo Url::to(['tasks/my-tasks/', 'status' => 'new']); ?>"
                   class="link link--nav">Новые</a>
            </li>
            <li class="side-menu-item">
                <a href="<?php echo Url::to(['tasks/my-tasks/', 'status' => 'in_process']); ?>" class="link link--nav">В
                    процессе</a>
            </li>
            <li class="side-menu-item">
                <a href="<?php echo Url::to(['tasks/my-tasks/', 'status' => 'closed']); ?>" class="link link--nav">Закрытые</a>
            </li>
        </ul>
    </div>
    <div class="left-column left-column--task">
        <?php

        if ($status === 'new') {
            $my_tasks = $my_tasks_new;
            $tasks_str = "Новые задания";
        } elseif ($status === 'in_process') {
            $my_tasks = $my_tasks_in_process;
            $tasks_str = "Задания в процессе";
        } else {
            $my_tasks = $my_tasks_done;
            $tasks_str = "Завершенные задания";
        }

        ?>

        <h3 class="head-main head-regular"><?php echo $tasks_str; ?></h3>


        <?php foreach ($my_tasks as $my_task): ?>

            <div class="task-card">

                <div class="header-task">
                    <a href="#" class="link link--block link--big"><?php echo $my_task->name; ?></a>
                    <p class="price price--task"><?php echo $my_task->budget; ?> ₽</p>
                </div>

                <p class="info-text"><span
                            class="current-time"><?php echo \Yii::$app->formatter->asRelativeTime($my_task->create_at); ?></span>
                </p>

                <p class="task-text">
                    <?php echo $my_task->description; ?>
                </p>

                <div class="footer-task">
                    <p class="info-text town-text"><?php echo $my_task->address; ?></p>
                    <p class="info-text category-text"><?php echo $my_task->websiteCategories->name; ?></p>
                    <a href="<?php echo Url::to(['tasks/view/', 'id' => $my_task->id]); ?>"
                       class="button button--black">Смотреть Задание</a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

</main>