<?php
namespace app\controllers;
use yii\web\Controller;
use GuzzleHttp\Client;
use Yii;
use GuzzleHttp\Exception\RequestException;

/* class AjaxController extends Controller
{

     public function actionIndex()
      {

       $email = Yii::$app->request->post('email', 'maxim-berezinets@yandex.ru');
          $api_key = 'e666f398-c983-4bde-8f14-e3fec900592a';

          $client = new Client([
              'base_uri' => 'https://geocode-maps.yandex.ru/1.x/'
          ]);

          try {

              $response = $client->request('GET', '', [
                  'query' => [
                      'apikey' => $api_key, 'geocode' => $email
                  ]
              ]);

              $content = $response->getBody()->getContents(); // что тут происходит?

              $response_data = json_decode($content, true);

              $result = false;

              if (is_array($response_data)) {
                  $result = !empty($response_data['mx_found']) && !empty($response_data['smtp_check']); // зачем это??7
                  var_dump($result);
                  die();
              }
          } catch (RequestException $e) {
              $result = true;
          }
          var_dump("Результат проверки 'Max', 'Not Max'");
      }

}  */