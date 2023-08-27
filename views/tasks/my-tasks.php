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
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const sideMenuItems = document.querySelectorAll('.side-menu-list .side-menu-item');

                // Получаем значение активного элемента из локального хранилища
                const activeSideMenuIndex = localStorage.getItem('activeSideMenuIndex');

                // Устанавливаем активный элемент на основе сохраненного значения
                if (activeSideMenuIndex !== null) {
                    sideMenuItems.forEach((item) => item.classList.remove('side-menu-item--active'));
                    sideMenuItems[activeSideMenuIndex].classList.add('side-menu-item--active');
                }

                sideMenuItems.forEach((sideMenuItem, index) => {
                    sideMenuItem.addEventListener('click', (e) => {
                        const activeItem = document.querySelector('.side-menu-list .side-menu-item--active');
                        if (activeItem) {
                            activeItem.classList.remove('side-menu-item--active');
                        }
                        sideMenuItem.classList.add('side-menu-item--active');

                        // Сохраняем индекс выбранного элемента в локальном хранилище
                        localStorage.setItem('activeSideMenuIndex', index);

                        // Остановите выполнение перехода по ссылке, чтобы увидеть эффект изменения класса
                        // В реальном применении уберите эту строку, чтобы ссылки продолжили работать

                    });
                });
            });
        </script>
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
                    <a href="<?php echo Url::to(['tasks/view/'.$my_task->id]); ?>" class="link link--block link--big"><?php echo $my_task->name; ?></a>
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