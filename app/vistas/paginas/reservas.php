<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<div id="contenedor">
    <section class="row">
        <div class="col-md-12" id="laReserva">
            <div class="container d-flex justify-content-center">

                <a class="smoothscroll" href="#nuestraReserva">
                    <div class="scroll-down"></div>
                </a>

            </div>
        </div>
    </section>

    <section class="container-fluid">
        <div class="row fondo">
            <div class="container">
                <div class="row">
                    <div id="nuestraReserva" class="card">
                        <div class="card-header grisito">
                            <h1 class="card-title centrado encabezado">HAZ UNA RESERVA</h1>
                        </div>

                        <div class="card-body">
                            <h5 class="card-subtitle centrado encabezado">¡reserva tu plaza con nosotros!</h5>
                            <br/>
                            <p class="card-text text-justify">Si estás interesado en conocer Santander con nosotros es necesario que realices una reserva para saber que vienes y podamos contar contigo y con las personas que te acompañarán.</p> 
                            <p class="card-text text-justify">Para completar la reserva necesitamos saber cómo te llamas, tu correo electrónico y saber cuántas personas vendrán contigo para disfrutar del paseo.</p>
                            <p class="card-text text-justify">Se requiere rellenar el siguiente formulario que se encuentra más abajo para completar la reserva de forma satisfactoria. Una vez realizada, recibirás un correo electrónico con los detalles de la reserva realizada en el correo que nos indicaste.</p>
                            <p class="card-text text-justify">Nos comprometemos a cuidar tus datos de acuerdo a Ley Orgánica de Protección de Datos (LOPD) vigente.</p>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div id="reservas" class="card col-12">
                        <div class="card-body ">
                            
                            <form method="POST" action="#" id="reservaForm">
                                
                                <div class="form-row">
                                    <div class="col-12 col-md-6">
                                        <label>Nombre de la reserva: <span style="font-weight: bold;">*</span></label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Tu nombre (mínimo 3 caracteres)" required="true">
                                    </div>
                                    <div class="container saltito impar">
                                    <p>-</p>
                                </div>
                                    <div class="col-12 col-md-6">
                                        <label>Apellidos: <span style="font-weight: bold;">*</span></label>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Tus apellidos" required="true">
<!--                                        <label>Escoge un día: <span style="font-weight: bold;">*</span></label>
                                        <input type="date" class="form-control" id="dia" required="true" min="2021-01-09" step="7">-->
                                    </div>
                                </div>
                                <div class="container saltito">
                                    <p>-</p>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6">
                                        <label>Escoge un día: <span style="font-weight: bold;">*</span></label>
                                        <input type="date" class="form-control" name="dia" id="dia" required="true" min="2021-01-23" step="7">
                                    </div>
                                    <div class="container saltito impar">
                                    <p>-</p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label>Número de teléfono: <span style="font-weight: bold;">*</span></label>
                                        <input type="tel" class="form-control" name="telefono" id="telefono" maxlength="9" required="true" pattern="[0-9]{9}" placeholder="Tu número">
                                    </div>
                                </div>
                                <div class="container saltito">
                                    <p>-</p>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6">
                                        <label>Número de asistentes totales (inclúyete): <span style="font-weight: bold;">*</span></label>
                                        <select class="form-control" id="asistentes" required="true" name="asistentes">
                                            <option value="Selecciona" selected="true">Selecciona</option>
                                        <?php
                                        for ($i=1; $i<11; $i++)
                                        {
                                            echo "<option value='$i'>$i</option>";
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="container saltito impar">
                                    <p>-</p>
                                </div>
                                    <div class="col-12 col-md-6">
                                        <label>Correo electrónico: <span style="font-weight: bold;">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Tu email" required="true">
                                    </div>
                                </div>
                                
                                <div class="container saltito impar">
                                    <p>-</p>
                                </div>
                                <div class="container saltito">
                                    <p>-</p>
                                </div>
                                
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="container d-flex justify-content-center">
                                            <!--<input type="button" class="btn btn-dark" value="Enviar" id="enviar" data-toggle="modal" data-target=".bd-example-modal-lg">-->
                                            <input type="button" class="btn col-md-2 botones" value="Enviar" id="enviaReserva">
                                            <input type="button" class="btn botones col-md-2 offset-1" value="Limpiar" id="limpiarForm">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="container saltito">
                                    <p>-</p>
                            </div>
                            
                            <div class="row">
                                <div class="col-12" id="salidaReserva">
                                    <div class="col-12" id="reservaOk">

                                    </div>
                                    <div class="col-12" id="reservaError">

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
                <div class="row">
                    <div id="cancelaReserva" class="card">
                        <div class="card-header grisito">
                            <h1 class="card-title centrado encabezado">CANCELA TU RESERVA</h1>
                        </div>

                        <div class="card-body">
                            <!--<h5 class="card-subtitle centrado encabezado">¡reserva tu plaza con nosotros!</h5>-->
                            <br/>
                            <p class="card-text text-justify">Si desgraciadamente no pudieras acudir a nuestro paseo, estaríamos muy agradecidos que por logística nos lo hicieras saber, ya que depende de las reservas que haya en un día para organizar nuestro depliegue de guías y poder así ofrecer una mayor comodidad y garantizar un servicio de calidad.</p> 
                            <p class="card-text text-justify">Tan solo es necesario indicar los datos que te mandamos en el correo en el momento que realizaste la reserva.</p>
                            <p class="card-text text-justify">Esperamos poder transmitiros en otro momento la belleza de Santander.</p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div id="cancelarLaReserva" class="card col-12">
                        <div class="card-body ">
                            <form method="POST" action="#" id="cancelForm">
                                <div class="form-row">
                                    <div class="col-12 col-md-6">
                                        <label>Correo electrónico: <span style="font-weight: bold;">*</span></label>
                                        <input type="email" class="form-control" id="correo" placeholder="tucorreo@ejemplo.com" required="true">
                                    </div>
                                    
                                    <div class="container saltito impar">
                                        <p>-</p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label>Identificador enviado a tu correo cuando hiciste la reserva: <span style="font-weight: bold;">*</span></label>
                                        <input type="text" class="form-control" id="identificador" placeholder="Identificador" required="true">
                                    </div>
                                </div>
                                
                                <div class="container saltito">
                                    <p>-</p>
                                </div>
                                
                                <div class="container saltito">
                                    <p>-</p>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="container d-flex justify-content-center ">                                            
                                            <!--<input type="button" class="btn btn-dark" value="Enviar" id="enviar" data-toggle="modal" data-target=".bd-example-modal-lg">-->
                                            <input type="button" class="btn botones col-4 col-md-3" value="Enviar" id="enviarCancelacion">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="container saltito">
                                    <p>-</p>
                                </div>
                            <div class="row">
                                <div class="col-12" id="cancelModal">
                                    <div class="col-12" id="cancelOk">

                                    </div>
                                    <div class="col-12" id="cancelError">

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

