<?php
$this->assign('title','FIND MY PET | Usuarios');
$this->assign('nav','nuevo usuario');
$this->display('_Header.tpl.php');
?>
<div class="row">
    <div class="col-xs-4">
        <h3><?php echo strtoupper($this->nav) ?></h3>
    </div>
</div>


<form action="web_service/usuario/nuevo" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control" type="text" name="nombre">
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>ID firebase</label>
                <input class="form-control" type="text" name="id_firebase">
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label>ID facebook</label>
                <input class="form-control" type="text" name="id_facebook">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Telefono</label>
                <input class="form-control" type="text" name="nro_telefono">
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-success waves-effect"> Guardar</button>
</form>



<?php
$this->display('_Footer.tpl.php');
?>