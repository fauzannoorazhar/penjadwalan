<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jurusan_angkatan".
 *
 * @property int $id
 * @property string $nama
 * @property string $tahun
 */
class JurusanAngkatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jurusan_angkatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tahun'], 'required'],
            [['tahun'], 'safe'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tahun' => 'Tahun',
        ];
    }
}