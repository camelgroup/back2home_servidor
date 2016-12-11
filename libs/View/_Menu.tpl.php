<aside id="aside" class="app-aside modal fade" role="menu">
    <div class="left">
        <div class="box bg-white">
            <div class="navbar md-whiteframe-z1 no-radius blue">
                <!-- brand -->
                <a class="navbar-brand" href="">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px"
                         viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" style="
                                            width: 24px; height: 24px;">
                                          <path d="M 50 0 L 100 14 L 92 80 Z" fill="rgba(139, 195, 74, 0.5)"></path>
                        <path d="M 92 80 L 50 0 L 50 100 Z" fill="rgba(139, 195, 74, 0.8)"></path>
                        <path d="M 8 80 L 50 0 L 50 100 Z" fill="#f3f3f3"></path>
                        <path d="M 50 0 L 8 80 L 0 14 Z" fill="rgba(220, 220, 220, 0.6)"></path>
                                </svg>
                    <img src="resources/material-design/images/logo.png" alt="." style="max-height: 36px; display:none">
                    <span class="hidden-folded m-l inline">BACK2HOME</span>
                </a>
                <!-- / brand -->
            </div>
            <div class="box-row">
                <div class="box-cell scrollable hover">
                    <div class="box-inner">
                        <div class="p hidden-folded blue-50" style="background-image:url(); background-size:cover">
                            <div class="rounded w-64 bg-white inline pos-rlt">
                                <img src="resources/material-design/images/a0.jpg" class="img-responsive rounded">
                            </div>
                            <a class="block m-t-sm">
                                <span class="block font-bold">John Smith</span>
                                <a md-ink-ripple data-toggle="dropdown" class="pull-right auto">
                                    <i class="fa inline fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-scale pull-right pull-up text-color">
                                    <li>
                                        <a href>Single-column view</a>
                                    </li>
                                    <li>
                                        <a ui-toggle-class="folded" target="#aside">Ocultar menu</a>
                                    </li>
                                    <li>
                                        <a href>Help &amp; feedback</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="?c=usuario&a=logout">Cerrar Sesion</a>
                                    </li>
                                </ul>
                                john.smith@gmail.com
                            </a>
                        </div>
                        <div id="nav">
                            <nav ui-nav>
                                <ul class="nav">
                                    <li>
                                        <a md-ink-ripple>
                                            <span class="pull-right text-muted">
                                                <i class="fa fa-caret-down"></i>
                                            </span>
                                            <i class="icon mdi-action-settings-input-svideo i-20"></i>
                                            <span class="font-normal">Menu</span>
                                        </a>
                                        <ul class="nav nav-sub">
                                            <ul class="nav">
                                                <li <?php if ($this->nav=='usuarios') { echo 'class="active"'; } ?>><a href="./usuarios">Usuarios</a></li>
                                            </ul>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="nav b-t b">
                    <li>
                        <a href="#" target="_blank" md-ink-ripple>
                            <i class="icon mdi-action-help i-20"></i>
                            <p class="muted"><small>&copy; <?php echo date('Y'); ?> CAMELGROUP</small></p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>

<!-- Contenido -->
<div id="content" class="app-content" role="main">
    <div class="box">
        <div class="navbar md-whiteframe-z1 no-radius blue">
            <a md-ink-ripple  data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
        </div>
        <div class="box-row">
            <div class="box-cell">
                <div class="box-inner padding">
                    <div class="card">
                        <div class="card-body">