<?php


namespace akreditasi\models;


use common\models\BorangS1ProdiStandar1;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class BorangS1ProdiStandar1Form extends BorangS1ProdiStandar1
{


   public function afterSave($insert, $changedAttributes)
   {
       $this->updateProgress();
       parent::afterSave($insert, $changedAttributes);
   }

    public function updateProgress(){
        $count = 0;

        $exclude = ['id','id_borang_s1_prodi','progress','created_at','updated_at','created_by','updated_by'];

        $filters = array_filter($this->attributes, function ($attribute) use ($exclude){
            return in_array($attribute,$exclude) === false;
        },ARRAY_FILTER_USE_KEY);

        $total = sizeof($filters);
        var_dump($total);

        foreach ($this->attributes as $attribute){
            if($attribute !== null){
                $count +=1;
            }
        }
        $progress = round(($count/$total) * 100,2);

        $this->progress = $progress;
         $this->save(false);

        return true;
    }


}