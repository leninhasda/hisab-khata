<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Log;
use app\models\LogSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$query = Log::find();
$logs = $query->all();

$totalDebit = 0;
$totalCredit = 0;
foreach ($logs as $log) {
    if('Debit' == $log->type) {
        $totalDebit += $log->cost;
    } else {
        $totalCredit += $log->cost;
    }
}
?>
<section><br>
    <table class="table">
        <tbody>
            <tr class="bg-success">
                <td>Total Debit</td>
                <td align="right"><?= $totalDebit ?>/=</td>
            </tr>
            <tr class="bg-danger">
                <td>Total Credit</td>
                <td align="right"><?= $totalCredit ?>/=</td>
            </tr>
            <tr class="bg-info">
                <td>Current Balance</td>
                <td align="right"><?= ($totalDebit-$totalCredit) ?>/=</td>
            </tr>
        </tbody>
    </table>
</section>