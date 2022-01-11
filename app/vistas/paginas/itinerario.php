<?php require_once RUTA_APP.'/helpers/itinerario/itinerarioFunc.php'; ?>


<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<div id="contenedor">
    <section class="row">
        <div class="col-md-12" id="itinerario">
        <div class="container d-flex justify-content-center">

<a class="smoothscroll" href="#nuestroPaseo">
<div class="scroll-down"></div>
</a>

</div>
        </div>

    </section>

    <section class="container-fluid">
        <div class="row fondo">
            <div class="container" >
                <div class="row">
                    <div class="card">
                        <div id="nuestroPaseo" class="card-header grisito">
                            <h1 class="card-title centrado encabezado">nuestro paseo</h1>
                        </div>

                        <div class="card-body">
                            <h5 class="card-subtitle centrado encabezado">Nuestro recorrido está adaptado para todos los públicos de todas las edades</h5>
                            <br/>
                            <p class="card-text text-justify">Free Tour Santander se compromete en ofrecer un <b>recorrido completamente llano por el centro de la ciudad</b>. 
                                El paseo está diseñado para el cómodo disfrute tanto de niños como de personas de movilidad reducida y minusválidos.</p>
                            <p class="card-text text-justify">Durante la visita se recomienda encarecidamente a los visitantes que lleven ropa y calzado cómodo para que sus 
                                experiencias sean lo más óptimas posibles.</p>
                            <p class="card-text text-justify">Somos fieles a las políticas de <i>free tour</i> y nunca impondremos una tarifa de entrada para disfrutar de la 
                                visita, quedando en manos de los visitantes, de acuerdo a su grado de satisfacción tras el paseo, aportar la propina que consideren oportuna.</p>
                            <p class="card-text text-justify">En nuestro itinerario se tratarán temas históricos como anecdóticos que han ido ocurriendo a lo largo de los años  
                                en la ciudad de Santander</p>
                        </div>
                        <img src="img/free-tour-santander-recorrido.jpg" alt="Recorrido" class="col-md-12 img-thumbnail img-fluid">
                    </div>

                    

                    <div class="card">
                                <div class="card-header grisito">
                                    <h2 class="card-title centrado encabezado">DATOS IMPORTANTES DEL PASEO</h2>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        
                                        <div class="saltito container">
                                            <p>-</p>
                                        </div>
                                        
                                        <!--dia de la semana-->
                                        <div class="card col-md-4 col-6 col-sm-6 col-lg-4 col-xl">
                                            <img class="card-img-top offset-3 icons" src="img/dia.png" alt="Día de la semana">

                                            <div class="card-body">
                                                <h4 class="card-title centrado encabezado">Día de la semana</h4>
                                                <p class="card-text centrado">Sábados</p>
                                                
                                            </div>
                                        </div>
                                        <!--fin dia de la semana-->
                                        <!--hora-->
                                        <div class="card col-md-4 col-6 col-sm-6 col-lg-4 col-xl">
                                            <img class="card-img-top offset-3 icons" src="img/hora.png" alt="Hora">

                                            <div class="card-body">
                                                <h4 class="card-title centrado encabezado">Hora</h4>
                                                <p class="card-text centrado">11:00 AM</p>
                                            </div>
                                        </div>
                                        <!--fin hora-->
                                        <!--lugar-->
                                        <div class="card col-md-4 col-6 col-sm-6 col-lg-4 col-xl">
                                            <img class="card-img-top offset-3 icons" src="img/lugar.png" alt="Lugar">

                                            <div class="card-body">
                                                <h4 class="card-title centrado encabezado">lugar de inicio</h4>
                                                <p class="card-text centrado">Plaza del Ayuntamiento</p>
                                            </div>
                                        </div>
                                        <div class="card col-md-4 col-6 col-sm-6 col-lg-4 col-xl">
                                            <img class="card-img-top offset-3 icons" src="img/duracion.png" alt="duracion">

                                            <div class="card-body">
                                                <h4 class="card-title centrado encabezado">DURACIÓN</h4>
                                                <p class="card-text centrado">2h 45min aprox</p>
                                            </div>
                                        </div>
                                        <div class="card col-md-4 col-6 col-sm-6 col-lg-4 col-xl">
                                            <img class="card-img-top offset-3 icons" src="img/lugar.png" alt="duracion">

                                            <div class="card-body">
                                                <h4 class="card-title centrado encabezado">lugar de finalización*</h4>
                                                <p class="card-text centrado">Duna de Zaera</p>
                                            </div>
                                        </div>
                                        <div class="card col-md-4 col-6 col-sm-6 col-lg-4 col-xl">
                                            <img class="card-img-top offset-3 icons" src="img/info.png" alt="+info">

                                            <div class="card-body">
                                                <h4 class="card-title centrado"><img src="img/spain.png" alt="español" id="espanol"></h4>
                                                <p class="card-text centrado">Sólo en español</p>
                                            </div>
                                        </div>
                                        <!--fin lugar-->
                                        
                                        <div class="container saltito">
                                            <p>-</p>
                                        </div>
                                        <!--botones-->
                                        <div class="container d-flex justify-content-center">
                                            <a href="<?php echo RUTA_URL ?>/reservas" class="btn btn-outline-dark col-md-3 botones">Reserva ahora</a>
                                        </div>
                                        <div class="container saltito">
                                            <p>-</p>
                                        </div>
                                        <p class="col-md-12 centrado"><b>(*)</b> <i>El <b>lugar de finalización</b> podría verse modificado a decisión del guía si las condiciones climatológicas no acompañasen</i></p>
                                        <!--fin botones-->
                                    </div>
                                </div>
                            
                    </div>

                    <div class="card col-md-6">
                                <div class="card-header grisito" id="dondeEncontrarnos">
                                    <h2 class="card-title centrado encabezado">DÓNDE ENCONTRARNOS</h2>
                                </div>
                                <div class="row card-body">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d180.99562503590485!2d-3.809828976555091!3d43.46205856402205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1605604367257!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>


                    </div>

                    <div class="card col-md-6">
                                <div class="card-header grisito">
                                    <h2 class="card-title centrado encabezado">DÓNDE APARCAR</h2>
                                </div>
                                <div class="row card-body">
                                    <?php
                                        //salida de php de los parkings
                                        echo tablaParkings();
                                    ?>
                                </div>
                    </div>

                </div>
            </div>




        </div>
    </section>

</div>
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>