<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "kelas".
 *
 * @property int $id
 * @property int $id_jurusan_angkatan
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jurusan_angkatan'], 'required'],
            [['id_jurusan_angkatan', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ],
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jurusan_angkatan' => 'Jurusan Angkatan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function getJurusanAngkatan()
    {
        return $this->hasOne(JurusanAngkatan::class,['id' => 'id_jurusan_angkatan']);
    }

    public function getUserCreate()
    {
        return $this->hasOne(User::class,['id' => 'created_by']);
    }

    public function getUserUpdate()
    {
        return $this->hasOne(User::class,['id' => 'updated_by']);
    }

    public function getManyKelasHari()
    {
        return $this->hasMany(KelasHari::class,['id_kelas' => 'id']);
    }

    public function getManyCountKelasHari()
    {
        return count($this->manyKelasHari);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $this->generateKelasHari();
        }
    }

    public function generateKelasHari()
    {
        foreach (Hari::find()->all() as $hari) {
            $kelasHari = KelasHari::find()
            ->andWhere(['id_kelas' => $this->id])
            ->andWhere(['id_hari' => $hari->id])
            ->one();

            if ($kelasHari === null) {
                $kelasHari = new KelasHari();
                $kelasHari->id_kelas = $this->id;
                $kelasHari->id_hari = $hari->id;
                $kelasHari->save();
            }

        }
    }
}
