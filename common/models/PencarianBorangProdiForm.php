<?php


namespace common\models;


use yii\base\Model;

/**
 *
 * @property mixed $akreditasiProdi
 * @property mixed $borang
 */
class PencarianBorangProdiForm extends Model
{


    public $akreditasi;
    public $jenjang;
    public $id_prodi;
    public $borang_untuk;

    private $_akreditasi;
    private $_akreditasi_prodi;
    private $_borang;


    public function rules() :array
    {
        return [
            [['akreditasi','jenjang','id_prodi','borang_untuk',],'required']
        ];
    }

    public function cari($target): string
    {

        $url ='';
        $this->_akreditasi = S7Akreditasi::find()->where(['id'=>$this->akreditasi])->one();
        $program = $this->jenjang;

        if($program == 'S2'){
            $program = 'Pasca';
        }

        $akreditasiProdiClass = 'common\\models\\'.'S7AkreditasiProdi'.$program;
        $borangfakultasClass = 'common\\models\\S7Borang'.$program.'Fakultas';
        $borangProdiClass = 'common\\models\\S7Borang'.$program.'Prodi';


        $this->_akreditasi_prodi = call_user_func($akreditasiProdiClass.'::findOne',['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi]);

        if($this->borang_untuk === 'fakultas'){
            $this->_borang = call_user_func($borangfakultasClass.'::findOne',['id_akreditasi'=>$this->akreditasi]);
            $url .= 'borang-'.strtolower($program).'-fakultas/'.$target;

        }else{
            $this->_borang = call_user_func($borangProdiClass.'::findOne',['id_akreditasi_prodi_'.strtolower($program)=>$this->_akreditasi_prodi->id]);
            $url .= 'borang-'.strtolower($program).'-prodi/'.$target;
        }


        return $url;


    }

    /**
     * @return mixed
     */
    public function getAkreditasi()
    {
        return $this->_akreditasi;
    }

    /**
     * @return mixed
     */
    public function getAkreditasiProdi()
    {
        return $this->_akreditasi_prodi;
    }

    /**
     * @return mixed
     */
    public function getBorang()
    {
        return $this->_borang;
    }


}