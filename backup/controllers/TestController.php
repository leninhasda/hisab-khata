<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Log;
class TestController extends Controller
{
    public function actionIndex()
    {
        try{
            $sc = new \SoapClient('http://www.webservicex.com/globalweatherdsds.asmx?wsdl');
            var_dump($sc);
        }catch(\SoapFault $e){
            echo '***************';
        }
    }
}