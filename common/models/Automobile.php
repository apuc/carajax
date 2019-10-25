<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "automobile".
 *
 * @property int $id
 * @property string $mark
 * @property string $model
 * @property string $number
 * @property string $color
 * @property int $parking
 * @property string $comment
 */
class Automobile extends \yii\db\ActiveRecord
{
    const STATUS_PAID = 1;
    const STATUS_UNPAID = 0;

    const COLORS = [
        'red' => 'Красный',
        'green' => 'Зеленый',
        'blue' => 'Синий',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'automobile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mark', 'model', 'number', 'color'], 'required'],
            [['parking'], 'integer'],
            [['comment'], 'string'],
            [['mark', 'model', 'number', 'color'], 'string', 'max' => 255],
            ['number', 'match', 'pattern' => '/^[АВЕКМНОРСТУХ]\d{3}(?<!000)[АВЕКМНОРСТУХ]{2}\d{2,3}$/ui']
        ];
    }

    public static function getStatusText()
    {
        return [
            self::STATUS_PAID => 'Оплачено',
            self::STATUS_UNPAID => 'Неоплачено'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mark' => 'Марка',
            'model' => 'Модель',
            'number' => 'Номер',
            'color' => 'Цвет',
            'parking' => 'Статус парковки',
            'comment' => 'Комментарий',
        ];
    }
}
