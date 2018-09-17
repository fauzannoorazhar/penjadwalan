<?php 

namespace app\models;

use yii\helpers\ArrayHelper;

trait ListableTrait
{
	public static function getList()
	{
		$query = self::find();

		if(User::isSatker()) {
			$query->andWhere(['id'=>User::getIdSatker()]);
		}

		return ArrayHelper::map($query->all(), 'id', 'nama');
	}

	public function getListUnit()
	{
		return ArrayHelper::map(static::find()->andWhere(['id_satker' => User::getIdSatker()])->all(), 'id', 'nama');
	}

}

?>
