<?php


namespace akreditasi\models;


use common\models\S7BorangS1ProdiStandar1;
use common\models\S7BorangS1ProdiStandar2;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class S7BorangS1ProdiStandar2Form extends S7BorangS1ProdiStandar2
{

   public function beforeSave($insert)
   {
       $this->updateProgress();
       $this->borangS1Prodi->updateProgress();
       return parent::beforeSave($insert);
   }

    public function updateProgress(){
        $count = 0;

        $exclude = ['id','id_borang_s1_prodi','progress','created_at','updated_at','created_by','updated_by'];

        $filters = array_filter($this->attributes, function ($attribute) use ($exclude){
            return in_array($attribute,$exclude) === false;
        },ARRAY_FILTER_USE_KEY);

        $total = sizeof($filters);

        foreach ($filters as $attribute){
            if($attribute !== null){
                $count +=1;
            }
        }

        $progress = round(($count/$total) * 100,2);

        $this->progress = $progress;

        return true;
    }


}