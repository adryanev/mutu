<?php
/* @var $this yii\web\View */
$this->title='Unggah Borang';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">file_copy</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Form Borang</h4>
                <form method="#" action="#">

                    <div class="form-group has-success ">
                        <label class="control-label">Lembaga Akreditasi</label>
                        <select class="form-control">
                            <option disabled selected></option>
                            <option value="">BAN-PT</option>
                        </select>
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label">Versi Akreditasi</label>
                        <select class="form-control">
                            <option disabled selected></option>
                            <option value="">2008 untuk Sarjana (S1)</option>
                        </select>
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label">Jenis Akreditasi</label>
                        <select class="form-control">
                            <option disabled selected></option>
                            <option value="">Program</option>
                        </select>
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label">Borang Untuk</label>
                        <select class="form-control">
                            <option disabled selected></option>
                            <option value="">Faklutas</option>
                            <option value="">Program</option>
                        </select>
                    </div>

                    <div class="form-group has-success">
                        <label class="control-label">Prodi</label>
                        <select class="form-control">
                            <option disabled selected></option>
                            <option value="">Teknik Informatika</option>
                            <option value="">Matematika Terapan</option>
                        </select>
                    </div>

                    <?= \yii\bootstrap\Html::a('Cari',['borang/cari'],['class'=>'btn btn-rose'])?>
                    <!-- <button type="submit" class="btn btn-fill btn-rose">Cari</button> -->
                </form>
            </div>
        </div>
    </div>

</div>