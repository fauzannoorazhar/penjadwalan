<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas_hari".
 *
 * @property int $id
 * @property int $id_kelas
 * @property int $hari
 */
class KelasHari extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas_hari';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kelas', 'hari'], 'required'],
            [['id_kelas', 'hari'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kelas' => 'Id Kelas',
            'hari' => 'Hari',
        ];
    }
}
