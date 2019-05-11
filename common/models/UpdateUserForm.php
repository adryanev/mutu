<?php


namespace common\models;


use InvalidArgumentException;
use yii\base\Model;

class UpdateUserForm extends Model
{


    public $username;
    public $email;
    public $status;
    public $is_admin;
    public $is_institusi;
    public $is_fakultas;
    public $is_prodi;

    public $nama_lengkap;
    public $id_fakultas;
    public $id_prodi;


    /**
     * @var User
     */
    private $_user;

    /**
     * @var ProfilUser
     */
    private $_profilUser;

    public function attributeLabels()
    {
        return [
            'username' => 'Username (Nip/Nik)',
            'is_admin' => 'Akses Admin',
            'is_institusi' => 'Akses Institusi',
            'is_fakultas' => 'Akses Fakultas',
            'is_prodi' => 'Akses Prodi',
            'id_fakultas' => 'Fakultas',
            'id_prodi' => 'Prodi',
        ];
    }

    public function __construct($id,$config = [])
    {

        if(!is_int($id)){
            throw new InvalidArgumentException('Id tidak valid');
        }
        if(empty($id)){
            throw new InvalidArgumentException('Id tidak boleh kosong');
        }
        $this->_user = User::findOne($id);
        if(!$this->_user){
            throw new InvalidArgumentException('User tidak Ditemukan');
        }
        $this->_profilUser = $this->_user->profilUser;
        parent::__construct($config);
    }

    public function rules() :array
    {
        return [

            [['username','email','status','is_admin','is_institusi','is_fakultas','is_prodi','nama_lengkap','id_fakultas','id_prodi'],'required'],
        ];
    }
    public function updateUser()
    {

        $user = $this->_user;
        $user->scenario = 'update';

        $profil = $this->_profilUser;

        $user->setAttributes(['username','email','status','is_admin','is_institusi','is_fakultas','is_prodi']);
        $profil->setAttributes(['nama_lengkap','id_fakultas','id_prodi']);

        $valid = $user->save()&& $profil->save() ;


        return $valid? $user : null;
    }

}