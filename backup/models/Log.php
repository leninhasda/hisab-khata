<?php

namespace app\models;

use Yii;
use app\components\Tools;

/**
 * This is the model class for table "log".
 *
 * @property integer $id
 * @property string $item
 * @property string $desc
 * @property string $type
 * @property integer $cost
 * @property string $datetime
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item', 'type', 'cost'], 'required'],
            [['desc'], 'string'],
            [['type'], 'string'],
            [['type'], 'default', 'value' => 'Credit'],
            [['cost'], 'integer'],
            [['datetime'], 'safe'],
            [['datetime'], 'default', 'value' => Tools::today()],
            [['item'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'item' => Yii::t('app', 'Item'),
            'desc' => Yii::t('app', 'Desc'),
            'type' => Yii::t('app', 'Type'),
            'cost' => Yii::t('app', 'Cost'),
            'datetime' => Yii::t('app', 'Datetime'),
        ];
    }
}
