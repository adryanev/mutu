<?php


namespace common\models;


use yii\base\Model;

class PencarianBorangProdiForm extends Model
{


    public $akreditasi;
    public $program;
    public $id_prodi;
    public $borang_untuk;

    private $_akreditasi;
    private $_akreditasi_prodi;
    private $_borang;


    public function rules() :array
    {
        return [
            [['akreditasi','program','id_prodi','borang_untuk',],'required']
        ];
    }

    public function cari($target): string
    {

        $url ='';
        $this->_akreditasi = Akreditasi::find()->where(['id'=>$this->akreditasi])->one();
        $program = Program::findOne(['id'=>$this->program]);
        $akreditasiProdiClass = 'common\\models\\'.'AkreditasiProdi'.$program->nama;
        $borangfakultasClass = 'common\\models\\Borang'.$program->nama.'Fakultas';
        $borangProdiClass = 'common\\models\\Borang'.$program->nama.'Prodi';


        $this->_akreditasi_prodi = call_user_func($akreditasiProdiClass.'::findOne',['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi]);

        if($this->borang_untuk === 'fakultas'){
            $this->_borang = call_user_func($borangfakultasClass.'::findOne',['id_akreditasi_prodi_'.strtolower($program->nama)=>$this->_akreditasi_prodi->id]);
            $url .= 'borang-'.strtolower($program->nama).'-fakultas/'.$target;

        }else{
            $this->_borang = call_user_func($borangProdiClass.'::findOne',['id_akreditasi_prodi_'.strtolower($program->nama)=>$this->_akreditasi_prodi->id]);
            $url .= 'borang-'.strtolower($program->nama).'-prodi/'.$target;
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