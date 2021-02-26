<?php require_once 'models/header.php' ?>
<div class="center-vertical">
    <div class="center-content row">
        <form action="controller/sesiones.php" id="login-validation" class="col-md-4 col-sm-5 col-xs-11 col-lg-3 center-margin" method="POST">
            <h3 class="text-center pad25B font-gray text-transform-upr font-size-23">LOGIN DE ACCESO <span class="opacity-80"></span></h3>
            <div id="login-form" class="content-box bg-default">
                <div class="content-box-wrapper pad20A">
                    <img class="mrg25B center-margin radius-all-100 display-block" src="assets/image-resources/gravatar.jpg" alt="">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                            <input type="text" class="form-control" name="user" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once 'models/footer.php' ?>