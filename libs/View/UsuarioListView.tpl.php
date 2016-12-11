<?php
$this->assign('title','Back2Home | Usuarios');
$this->assign('nav','usuarios');
$this->display('_Header.tpl.php');
?>

    <script type="text/javascript">
        $LAB.script("libs/View/scripts/usuarios.js").wait(function(){
            $(document).ready(function(){
                page.init();
            });

            // hack for IE9 which may respond inconsistently with document.ready
            setTimeout(function(){
                if (!page.isInitialized) page.init();
            },1000);
        });
    </script>

    <button id="newUsuarioButton" class="md-btn md-fab md-fab-bottom-right pos-fix blue waves-effect"><i class="mdi-content-add i-24"></i></button>
    <div class="row">
        <div class="col-xs-4">
            <h3><?php echo strtoupper($this->nav) ?></h3>
        </div>
        <div class="col-xs-4 col-xs-offset-4">
            <div class="input-group">
                <div class="md-form-group float-label ">
                    <input class="md-input" id='filter' type="text"/>
                    <label> Buscar</label>
                </div>
            <span class="input-group-btn">
                <button class="md-btn md-flat text-primary waves-effect" type="button"><i class="mdi-action-search i-24"></i></button>
            </span>
            </div>
        </div>
    </div>

    <!-- underscore template for the collection -->
    <script type="text/template" id="usuarioCollectionTemplate">
        <%=  view.getPaginationHtml(page) %>
        <div class="table-responsive">
            <table class="collection table table-bordered table-hover">
                <thead>
                <tr>
                    <th id="header_Pkusuario">Pkusuario<% if (page.orderBy == 'Pkusuario') { %> <i class='fa fa-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                    <th id="header_Nombre">Nombre<% if (page.orderBy == 'Nombre') { %> <i class='fa fa-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                    <th id="header_IdFirebase">ID Firebase<% if (page.orderBy == 'IdFirebase') { %> <i class='fa fa-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                    <th id="header_Email">Email<% if (page.orderBy == 'Email') { %> <i class='fa fa-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                    <th id="header_Nrotelefono">Nrotelefono<% if (page.orderBy == 'Nrotelefono') { %> <i class='fa fa-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				    <th id="header_IdFacebook">ID Facebook<% if (page.orderBy == 'IdFacebook') { %> <i class='fa fa-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
                </tr>
                </thead>
                <tbody>
                <% items.each(function(item) { %>
                    <tr id="<%= _.escape(item.get('pkusuario')) %>">
                        <td><%= _.escape(item.get('pkusuario') || '') %></td>
                        <td><%= _.escape(item.get('nombre') || '') %></td>
                        <td><%= _.escape(item.get('idFirebase') || '') %></td>
                        <td><%= _.escape(item.get('email') || '') %></td>
                        <td><%= _.escape(item.get('nrotelefono') || '') %></td>
				        <td><%= _.escape(item.get('idFacebook') || '') %></td>
                    </tr>
                <% }); %>
                </tbody>
            </table>
        </div>
    </script>

    <!-- underscore template for the model -->
    <script type="text/template" id="usuarioModelTemplate">
        <form onsubmit="return false;">
            <fieldset>
                <span class="hidden" id="pkusuario"><%= _.escape(item.get('pkusuario') || '') %></span>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="<%= _.escape(item.get('nombre') || '') %>">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>ID Firebase</label>
                            <input type="text" class="form-control" id="idFirebase" placeholder="ID Firebase" value="<%= _.escape(item.get('idFirebase') || '') %>">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email" value="<%= _.escape(item.get('email') || '') %>">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Numero telefono</label>
                            <input type="text" class="form-control" id="nrotelefono" placeholder="Numero telefono" value="<%= _.escape(item.get('nrotelefono') || '') %>">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>ID Facebook</label>
                            <input type="text" class="form-control" id="idFacebook" placeholder="ID Facebook" value="<%= _.escape(item.get('idFacebook') || '') %>">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>

        <!-- delete button is is a separate form to prevent enter key from triggering a delete -->
        <form id="deleteUsuarioButtonContainer" class="form-horizontal" onsubmit="return false;">
            <fieldset>
                <div class="control-group dropdown">
                    <button type="button" class="btn btn-fw btn-danger waves-effect" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-trash fa-fw"></i> Eliminar</button>
                    <ul class="dropdown-menu animated fadeIn">
                        <li><a href="#" id="confirmDeleteUsuarioButton"><i class="fa fa-check"></i></a></li>
                        <li><a href="#" id="cancelDeleteUsuarioButton"><i class="fa fa-times"></i></a></li>
                    </ul>
                </div>
            </fieldset>
        </form>
    </script>

    <!-- modal edit dialog -->
    <div class="modal fade" id="usuarioDetailDialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">&times;</a>
                    <h3>
                        <i class="icon-edit"></i> Editar Usuario
                        <span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
                    </h3>
                </div>
                <div class="modal-body">
                    <div id="modelAlert"></div>
                    <div id="usuarioModelContainer"></div>
                </div>
                <div class="modal-footer">
                    <button md-ink-ripple="" class="btn btn-fw btn-default waves-effect waves-effect" data-dismiss="modal"><i class="fa fa-ban fa-fw"></i> Cancelar</button>
                    <button md-ink-ripple="" id="saveUsuarioButton" class="btn btn-fw btn-success waves-effect waves-effect"><i class="fa fa-floppy-o fa-fw"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div id="collectionAlert"></div>

    <div id="usuarioCollectionContainer" class="collectionContainer">
    </div>


<?php
$this->display('_Footer.tpl.php');
?>