<?php 
require_once RUTA_APP . '/helpers/blog/blogFunc.php';
require RUTA_APP . '/vistas/inc/header.php'; 
?>
<!--carrusel-->
<div id="contenedor">
    <div class="row">
        <div class="col-md-12">
            <div id="carrusel" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <!--foto 1-->
                    <div class="carousel-item active">
                        <img src="img/palacio.jpg" alt="Palacio de la Magdalena">
                        <div class="carousel-caption info img-fluid">
                            <h3 class="encabezado">Palacio de la Magdalena</h3>
                            <!--<p class="carruselText">Enclave histórico en una de las zonas más hermosas de la ciudad</p>-->
                        </div>   
                    </div>
                    <!--foto 2-->
                    <div class="carousel-item">
                        <img src="img/cabomayor.jpg" alt="Faro cabo mayor">
                        <div class="carousel-caption info img-fluid">
                            <h3 class="encabezado">Faro de Cabo Mayor</h3>
                            <!--<p class="carruselText">Donde las puestas de sol jamás defraudan</p>-->
                        </div>   
                    </div>
                    <!--foto 3-->
                    <div class="carousel-item">
                        <img src="img/camello.jpg" alt="Playa del Camello">
                        <div class="carousel-caption info img-fluid">
                            <h3 class="encabezado">Playa del Camello</h3>
                            <!--<p class="carruselText">Pequeña y acogedora playa junto a la Magdalena</p>-->
                        </div>   
                    </div>

                    <!--foto 4-->
                    <div class="carousel-item">
                        <img src="img/golfmatalenas.jpg" alt="Golf Mataleñas">
                        <div class="carousel-caption info img-fluid">
                            <h3 class="encabezado">Golf Mataleñas</h3>
                            <!--<p class="carruselText">Un campo de golf con unas vistas como nunca imaginabas</p>-->
                        </div>   
                    </div>

                    <!--foto 5-->
                    <div class="carousel-item">
                        <img src="img/panteon.jpg" alt="Panteón del inglés">
                        <div class="carousel-caption info img-fluid">
                            <h3 class="encabezado">El Panteón del Inglés</h3>
                            <!--<p class="carruselText">Oculto junto al mar e incluso desconocido por muchos santanderinos</p>-->
                        </div>   
                    </div>

                    <!--foto 6-->
                    <div class="carousel-item">
                        <img src="img/piquio.jpg" alt="Jardines de Piquio">
                        <div class="carousel-caption info img-fluid">
                            <h3 class="encabezado">Jardines de Piquio</h3>
                            <!--<p class="carruselText">Ubicados en mitad del Sardinero</p>-->
                        </div>   
                    </div>
                    <div class="container d-flex justify-content-center">

                        <a class="smoothscroll" href="#bienvenido">
                            <div class="scroll-down"></div>
                        </a>

                    </div>
                </div>

                <!-- cantidad -->
                <ul class="carousel-indicators">
                    <li data-target="#carrusel" data-slide-to="0" class="active"></li>
                    <li data-target="#carrusel" data-slide-to="1"></li>
                    <li data-target="#carrusel" data-slide-to="2"></li>
                    <li data-target="#carrusel" data-slide-to="3"></li>
                    <li data-target="#carrusel" data-slide-to="4"></li>
                    <li data-target="#carrusel" data-slide-to="5"></li>
                </ul>

                <!-- fotos y contenido -->


            </div>

            <!--botones de izq-drcha-->
            <a class="carousel-control-prev" href="#carrusel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#carrusel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- fin carrusel-->
    <!--comienzo presentacion-->
    <section class="container-fluid">
        <div class="row fondo">
            <div class="container" >
                <div class="row">
                    <div class="card">
                        <div class="card-header grisito" id="bienvenido">
                            <h1 class="card-title centrado encabezado">¡Bienvenido a Santander!</h1>
                        </div>

                        <div class="card-body">
                            <h5 class="card-subtitle centrado encabezado">Siéntete como en casa y disfruta la belleza de Santander con nosotros</h5>
                            <br>
                            <p class="card-text text-justify">Nuestro objetivo es hacerte sentir en casa, darte consejos en todo lo que puedas necesitar y compartir contigo todo nuestro conocimiento sobre nuestra querida ciudad. Nuestros servicios son gratis. Está en tus manos después de disfrutar el paseo guiado dar una propina a nuestros increíbles guías. Apreciamos tu solidaridad, es clave para mantener la calidad de nuestros paseos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--fin de la presentacion-->

    <!--recorrido-->
    <section class="container-fluid">
        <div class="row fondo">
            <div class="container">
                <div class="row">
                    <!--card padre-->
                    <div class="card">
                        <div class="card-header grisito">
                            <h2 class="card-title centrado encabezado">NUESTRO PASEO</h2>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <p class="card-text centrado col-md-12">Recorrido de aproximadamente 2 horas 45 minutos andando.</p>
                                <img src="img/recorrido.jpg" alt="Recorrido" class="col-md-12 img-thumbnail img-fluid">
                            </div>

                            <div class="row">

                                <div class="saltito container">
                                    <p>-</p>
                                </div>

                                <!--dia de la semana-->
                                <div class="card col-md-3 col-6 col-sm-6">
                                    <img class="card-img-top offset-3 icons" src="img/dia.png" alt="Día de la semana">

                                    <div class="card-body">
                                        <h4 class="card-title centrado encabezado">Día de la semana</h4>
                                        <p class="card-text centrado">Sábados</p>

                                    </div>
                                </div>
                                <!--fin dia de la semana-->
                                <!--hora-->
                                <div class="card col-md-3 col-6 col-sm-6">
                                    <img class="card-img-top offset-3 icons" src="img/hora.png" alt="Hora">

                                    <div class="card-body">
                                        <h4 class="card-title centrado encabezado">Hora</h4>
                                        <p class="card-text centrado">11:00 AM</p>
                                    </div>
                                </div>
                                <!--fin hora-->
                                <!--lugar-->
                                <div class="card col-md-3 col-6 col-sm-6">
                                    <img class="card-img-top offset-3 icons" src="img/lugar.png" alt="Lugar">

                                    <div class="card-body">
                                        <h4 class="card-title centrado encabezado">Lugar</h4>
                                        <p class="card-text centrado">Plaza del Ayuntamiento</p>
                                    </div>
                                </div>
                                <div class="card col-md-3 col-6 col-sm-6">
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
                                    <a href="itinerario" class="btn btn-outline-dark col-md-3 botones" id="masInfo">Más información</a>
                                    <a href="reservas" class="btn btn-outline-dark col-md-3 botones">Reserva ahora</a>
                                </div>
                                <div class="container saltito">
                                    <p>-</p>
                                </div>
                                <div class="container d-flex justify-content-center">
                                    <a href="itinerario#dondeEncontrarnos" class="btn btn-outline-dark col-md-2 col-7 botones">Cómo llegar</a>
                                </div>
                                <!--botones-->
                            </div>
                        </div>
                    </div>
                    <!--fin card padre-->
                </div>
            </div>
        </div>
    </section>
    <!--fin recorrido-->
    <!--ven a conocernos-->
    <section class="container-fluid">
        <div class="row fondo">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-header grisito">
                            <h2 class="card-title centrado encabezado">VEN A CONOCERNOS</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="card-text centrado col-md-12">Somos gente joven que disfruta compartiendo sus conocimientos de forma cercana, dinámica y espontánea.</p>
                                <img src="img/conocenos.jpg" alt="conocenos" class="col-md-12 img-thumbnail img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--fin ven a conocernos-->
    <!--inicio últimas noticias y conecta con nosotros-->
    <section class="container-fluid">
        <div class="row fondo">
            <div class="container">
                <div class="row">
                    <!--ultimas noticias-->
                            <div class="card col-md-12 col-lg-6">
                                <div class="card-header grisito">
                                    <h2 class="card-title centrado encabezado">ÚLTIMAS NOTICIAS</h2>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <?php echo pintaDosUltimos(); ?>
                                    </div>
                                    <!--salto de línea-->
                                    <div class="container saltito">
                                        <p>-</p>
                                    </div>
                                    <!--fin salto de línea-->
                                    <div class="row">
                                        <div class="container d-flex justify-content-center">
                                            <a href="blog?pagina=1" class="btn btn-outline-dark col-md-4 col-7 blog">Ir al blog</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
        <!--fin ultimas noticias-->
        <!--inicio conecta con nosotros-->
        <div class="card col-md-12 col-lg-6">
            <div class="card-header grisito">
                <h2 class="card-title centrado encabezado">CONECTA CON NOSOTROS</h2>
            </div>
            <div class="card-body">


                <p class="card-text centrado">Encuéntranos en las redes sociales:</p>

                <div class="container d-flex justify-content-center">

                    <a href="https://www.facebook.com/freetoursantander/" target="_blank"><img class="social" src="img/facebook_circ.png"></a>
                    <a href="https://www.instagram.com/freetoursantander/" target="_blank"><img class="social" src="img/instagram_circ.png"></a>
                    <a href="https://www.tripadvisor.es/Attraction_Review-g187484-d12510928-Reviews-or30-Free_Tour_Santander-Santander_Cantabria.html" target="_blank"><img class="social" src="img/tripadvisor_circ_trans.png"></a>

                </div>

            </div> <!--here-->
            <div class="row">
                <div class="container d-flex justify-content-center">
                    <img src="img/excelencia.png" alt="certificado de excelencia" id="excelencia">
                </div>
            </div>
        </div>
        <!--fin conecta con nosotros-->
</div>
</div>
</div>
</section>
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>

