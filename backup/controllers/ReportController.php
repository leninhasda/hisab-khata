<?php

namespace app\controllers;

class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMonthly()
    {
        return $this->render('monthly');
    }

    public function actionWeekly()
    {
        return $this->render('weekly');
    }

    public function actionYearly()
    {
        return $this->render('yearly');
    }

}
