<?php require RUTA_APP . '/vistas/inc/header.php'; ?>

<div id="contenedor">
    <section class="row">
        <div class="col-md-12" id="elContacto">
            <div class="container d-flex justify-content-center">

                <a class="smoothscroll" href="#nuestroContacto">
                    <div class="scroll-down"></div>
                </a>

            </div>
        </div>
    </section>

    <section class="container-fluid">
        <div class="row fondo">
            <div class="container">
                <div class="row">
                    <div id="nuestroContacto" class="card">
                        <div class="card-header grisito">
                            <h1 class="card-title centrado encabezado">CONTACTO</h1>
                        </div>

                        <div class="card-body">
                            <h5 class="card-subtitle centrado encabezado">Si necesitas ponerte en contacto con nosotros no dude en escribirnos</h5>
                            <br/>
                            <p class="card-text text-justify">Para contactarnos lo único que necesitas es rellenar el breve formulario que se encuentra a continuación. Todos los datos marcados con asterisco son obligatorio rellenarlos.</p>
                            <p class="card-text text-justify">Nuestro equipo se pondrá en contacto para resolver las dudas que pueden surgirte en la mayor brevedad posible.</p>
                            <p class="card-text text-justify">Nos comprometemos a cuidar tus datos de acuerdo a Ley Orgánica de Protección de Datos (LOPD) vigente.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="nuestroContacto" class="card col-12">
                        <div class="card-body ">
                            <form method="POST" action="#" id="myForm">
                                <div class="form-row">
                                    <div class="col-12 col-md-6">
                                        <label>Tu nombre: <span style="font-weight: bold;">*</span></label>
                                        <input type="text" class="form-control" id="nombre" placeholder="Nombre (mínimo 3 caracteres)" required="true">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label>Correo electrónico: <span style="font-weight: bold;">*</span></label>
                                        <input type="email" class="form-control" id="correo" placeholder="tucorreo@ejemplo.com" required="true">
                                    </div>
                                </div>
                                <div class="container saltito">
                                    <p>-</p>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <label>Asunto:</label>
                                        <input type="text" class="form-control" id="asunto" placeholder="Asunto">
                                    </div>
                                </div>
                                <div class="container saltito">
                                    <p>-</p>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <label>Contenido del mensaje: <span style="font-weight: bold;">*</span></label>
                                        <textarea class="form-control" id="mensaje" rows="8" placeholder="Cuerpo del mensaje (mínimo 20 caracteres)" required="true"></textarea>
                                    </div>
                                </div>
                                <div class="container saltito">
                                    <p>-</p>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="container d-flex justify-content-center">
                                            <!--<input type="button" class="btn btn-dark" value="Enviar" id="enviar" data-toggle="modal" data-target=".bd-example-modal-lg">-->
                                            <input type="button" class="btn btn-dark" value="Enviar" id="enviar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12" id="salidaModal">
                                    <div class="col-12" id="modalOk">
                                        
                                    </div>
                                    <div class="col-12" id="modalError">
                                        
                                    </div>
                                    <!--<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header badge-success">
                                                    <h4 class="modal-title" id="myLargeModalLabel">Envío correcto</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">El mensaje ha sido enviado con éxito. Pronto recibirá respuesta por nuestro equipo.</div>
                                                
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>