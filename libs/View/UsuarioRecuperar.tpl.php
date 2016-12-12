<?php
$this->assign('title','Back2Home | Usuarios');
$this->assign('nav','nuevo usuario');
$this->display('_Header.tpl.php');
?>
<div class="row">
    <div class="col-xs-4">
        <h3><?php echo strtoupper($this->nav) ?></h3>
    </div>
</div>


<form action="usuario/recuperar" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="email">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success waves-effect"> Guardar</button>
</form>



<?php
$this->display('_Footer.tpl.php');
?>