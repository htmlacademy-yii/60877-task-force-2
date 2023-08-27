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
/*class AuthHandler
{

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


        $user = User::find()->where([
            'email' => $email,
        ])->one();

        if ($user) { // login
            Yii::$app->user->login($user);
        } else { // signup


            $transaction = User::getDb()->beginTransaction();


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
}*/
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
        $nickname = ArrayHelper::getValue($attributes, 'name');
        $picture = ArrayHelper::getValue($attributes, 'picture');
        $user = User::find()->where(['email' => $email])->one();

        if ($user) { // login
            Yii::$app->user->login($user);
        } else { // signup
            $transaction = User::getDb()->beginTransaction();

            $user = new User();

            $user->email = $email;

            $user->name = $nickname;
           $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash(1);
            $user->user_img = $picture;
            // TODO: установите другие атрибуты пользователя здесь, если они есть

            if ($user->save()) {

                $transaction->commit();
                Yii::$app->user->login($user);
            } else {

                $transaction->rollBack(); // Откатываем транзакцию, если сохранение не удалось
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
