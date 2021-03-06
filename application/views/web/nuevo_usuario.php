<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <span class="font-italic">Nuevo usuario</span>
                </div>
                <div class="card-body">
                    <form id="form_registro" action="#" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre de usuario</label>
                            <input type="text" name="username" id="username" class="form-control input" value="<?php echo set_value('username'); ?>" required>
                            <?php
                            echo form_error('username', '<div class="error"><svg class="bi bi-exclamation-diamond-fill mr-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 4zm.002 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                            </svg>', '</div>'); 
                            echo isset($error_username) ? '<div class="error"><svg class="bi bi-exclamation-diamond-fill mr-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 4zm.002 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                            </svg>'.$error_username.'</div>' : '' ;
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control input" value="<?php echo set_value('nombre'); ?>" required>
                            <?php
                            echo form_error('nombre', '<div class="error"><svg class="bi bi-exclamation-diamond-fill mr-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 4zm.002 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                            </svg>', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control input" value="<?php echo set_value('apellidos'); ?>">
                            <?php
                            echo form_error('apellidos', '<div class="error"><svg class="bi bi-exclamation-diamond-fill mr-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 4zm.002 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                            </svg>', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Correo</label>
                            <input type="email" name="email" id="email" class="form-control input" value="<?php echo set_value('email'); ?>" required>
                            <?php
                            echo form_error('email', '<div class="error"><svg class="bi bi-exclamation-diamond-fill mr-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 4zm.002 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                            </svg>', '</div>'); 
                            echo isset($error_correo) ? '<div class="error"><svg class="bi bi-exclamation-diamond-fill mr-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 4zm.002 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                            </svg>'.$error_correo.'</div>' : '' ;
                            ?>
                            
                        </div>
                        <div class="form-row">
                            <div class="col-6 col-md-3">
                                <label for="nombre">Crea una contraseña</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo set_value('password'); ?>">
                            </div>
                            <!--<i class="fas fa-eye"></i>-->
                            <div class="col-3 mt-1 mt-md-0" id="botones-pass">
                                <span id="ver-pass" class="btn btn-outline-secondary" title="Mostrar contraseña"><i class="fas fa-eye"></i></span>
                            </div>
                            <?php
                            echo form_error('password', '<div class="error"><svg class="bi bi-exclamation-diamond-fill mr-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 4zm.002 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                            </svg>', '</div>'); ?>
                        </div>
                        <div class="form-row mt-1 mb-2">
                            <div class="col-6 col-md-3">
                                <label for="nombre">Confirmar contraseña</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" value="<?php echo set_value('password_confirm'); ?>">
                            </div>
                            <div class="col-3 mt-1 mt-md-0" id="botones-pass-conf">
                                <span id="ver-pass-conf" class="btn btn-outline-secondary" title="Mostrar contraseña"><i class="fas fa-eye"></i></span>
                            </div>
                            <?php
                            echo form_error('password_confirm', '<div class="error"><svg class="bi bi-exclamation-diamond-fill mr-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 4zm.002 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                            </svg>', '</div>'); ?>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="check" class="form-check-input" value="1">Acepto las políticas de <a href="/politica-privacidad" target="_blank">privacidad</a> y <a href="/politica-cookies" target="_blank">cookies</a> de Argaming
                            </label>
                            <?php
                            echo form_error('check', '<div class="error"><svg class="bi bi-exclamation-diamond-fill mr-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 4zm.002 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                            </svg>', '</div>'); ?>
                        </div>
                        <input type="submit" value="Completar registro" id="submit" class="btn btn-primary">
                    </form>
                    <div class="text-center cancelar">
                        <a href="/" class="text-black">Cancelar y volver a la página de inicio</a>
                    </div>
                </div>
            </div>
            <br>
            <script src="/bootstrap/js/jquery-3.4.1.min.js"></script>
            <script type="text/javascript">
                /* 
                // FORMA CLÁSICA DE JAVASCRIPT
                window.addEventListener("load", cargaPagina);

                function cargaPagina() {
                    var btn = document.getElementById("ver-pass").addEventListener("click", mostrarPassword);
                }

                function mostrarPassword() {
                    document.getElementById("password").type = "text";
                }
                */
               // CON JQUERY quedaría tal que así:
               $(document).ready(function() {
                    /*$('#form_registro').on('submit', function(){
                        alert("Espera, estamos verificando los datos..");
                    });*/
                    //Cuando se pulsa en el boton 'mostrar' cambia el tipo de input de password a text
                    $('#ver-pass').on('click', function() {
                        //alert($('#password').val());
                        $('#password').attr('type', 'text');
                        //Si no existe el botón de ocultar, se crea. Así evito que se uedan crear botones infinitos
                        if ($('#ocultar-pass').length == 0) {
                            $('#botones-pass').append($('<span>').attr("class", "btn btn-outline-secondary").attr('id', 'ocultar-pass').attr('title','Ocultar contraseña').append('<i class="fas fa-eye-slash"></i>'));
                        }
                        //Y entonces queda activo el otro botón 'ocultar' para devolverlo a su estado original
                        $('#ocultar-pass').on('click', function() {
                            //alert($('#password').val());
                            $('#password').attr('type', 'password');
                            $('#ocultar-pass').remove();
                        });
                    });
                    //Y después, exactametne igual pero con el campo de confirmar la contraseña
                    $('#ver-pass-conf').on('click', function() {
                        $('#password_confirm').attr('type', 'text');
                        if ($('#ocultar-pass-conf').length == 0) {
                            $('#botones-pass-conf').append($('<span>').attr("class", "btn btn-outline-secondary").attr('id', 'ocultar-pass-conf').attr('title','Ocultar contraseña').append('<i class="fas fa-eye-slash"></i>'));
                        }
                        $('#ocultar-pass-conf').on('click', function() {
                            $('#password_confirm').attr('type', 'password');
                            $('#ocultar-pass-conf').remove();
                        });
                    });
                });
            </script>
        </div>
    </div>
</div>