<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string|null $cmd
 * @property int $async
 * @property int $cnt
 * @property int|null $done
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['async', 'cnt', 'done'], 'integer'],
            [['cmd'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cmd' => 'Cmd',
            'async' => 'Async',
            'cnt' => 'Cnt',
            'done' => 'Done',
        ];
    }
}
