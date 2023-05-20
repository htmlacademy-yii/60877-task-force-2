<?php
namespace app\components;

use app\models\Auth;
use app\models\User;
use Yii;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;

/**
 * AuthHandler handles successful authentication via Yii auth component
 */
class AuthHandler
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function handle()
    {
        $attributes = $this->client->getUserAttributes();
        $email = ArrayHelper::getValue($attributes, 'email');
        $nickname = ArrayHelper::getValue($attributes, 'login');

        // Вместо Auth модели используем User модель
        // поиск пользователя по email
        /* @var User $auth */
        $user = User::find()->where([
            'email' => $email,
        ])->one();

        if ($user) { // login
            Yii::$app->user->login($user);
        } else { // signup
            // добавляем функционал создания нового пользователя

            $transaction = User::getDb()->beginTransaction();

            // проверяем добавился ли новый пользователь
            if ($user->save()) {
                $transaction->commit();
                Yii::$app->user->login($user);
            } else {
                Yii::$app->getSession()->setFlash('error', [
                    Yii::t('app', 'Unable to save user: {errors}', [
                        'client' => $this->client->getTitle(),
                        'errors' => json_encode($user->getErrors()),
                    ]),
                ]);
            }
        }
    }
}
