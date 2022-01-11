<?php
require_once RUTA_APP . '/helpers/blog/blogFunc.php';
require RUTA_APP . '/vistas/inc/header.php';

?>
<div id="contenedor">
    <section class="row">
        <div class="col-md-12" id="elBlog">
            <div class="container d-flex justify-content-center">

                <a class="smoothscroll" href="#nuestroBlog">
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
                        <div id="nuestroBlog" class="card-header grisito">
                            <h1 class="card-title centrado encabezado">Blog y noticias</h1>
                        </div>

                        <div class="card-body">
                            <h5 class="card-subtitle centrado encabezado">Encontrarás las noticias sobre nosotros y sobre eventos en santander</h5>
                            <br/>
                        </div>
                        <!--ultimas noticias-->
                        <div class="card col-md-12 col-lg-12">

                            <div class="card-body">

                                <div class="row">
                                    <!--<div class="col-md-6 col-12 col-lg-6">
                                        <div class="card">
                                            <img class="card-img-top offset-4 img-thumbnail" src="img/free-tour-santander-dani.jpg" alt="Card image cap" style="width:33%;">
                                            <div class="card-body">
                                                <h5 class="card-title centrado encabezado">Título última noticia 1</h5>
                                                <p class="card-text text-center">"Aquí estará presente una pequeña descripcion del cuerpo de la noticia escrita."</p>
                                                <p class="card-text text-center">29/12/2020</p>
                                                <div class="container d-flex justify-content-center">
                                                    <a href="#" class="btn col-md-12 col-12 col-lg-6 botones">Más</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--salto impar-->
                                    <!--<div class="container saltito impar">
                                        <p>-</p>
                                    </div>
                                    <!--fin salto impar-->
                                    <!--<div class="col-md-6 col-12 col-lg-6">
                                        <div class="card">
                                            <img class="card-img-top offset-4 img-thumbnail" src="img/free-tour-santander-dani.jpg" alt="Card image cap" style="width:33%;">
                                            <div class="card-body">
                                                <h5 class="card-title centrado encabezado">Título última noticia 1</h5>
                                                <p class="card-text text-center">"Aquí estará presente una pequeña descripcion del cuerpo de la noticia escrita."</p>
                                                <p class="card-text text-center">29/12/2020</p>
                                                <div class="container d-flex justify-content-center">
                                                    <a href="#" class="btn col-md-12 col-12 col-lg-6 botones">Más</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--salto de línea-->
                                    <!--<div class="container saltito">
                                        <p>-</p>
                                    </div>
                                    <!--fin salto de línea-->
                                    <!--<div class="col-md-6 col-12 col-lg-6">
                                        <div class="card">
                                            <img class="card-img-top offset-4 img-thumbnail" src="img/free-tour-santander-dani.jpg" alt="Card image cap" style="width:33%;">
                                            <div class="card-body">
                                                <h5 class="card-title centrado encabezado">Título última noticia 1</h5>
                                                <p class="card-text text-center">"Aquí estará presente una pequeña descripcion del cuerpo de la noticia escrita."</p>
                                                <p class="card-text text-center">29/12/2020</p>
                                                <div class="container d-flex justify-content-center">
                                                    <a href="#" class="btn col-md-12 col-12 col-lg-6 botones">Más</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--salto impar-->
                                    <!--<div class="container saltito impar">
                                        <p>-</p>
                                    </div>
                                    <!--fin salto impar-->
                                    
                                    
<?php
echo pintayPaginaNoticias();
?>
                                
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--fin ultimas noticias-->
            </div>
        </div>
</div>
</div>
</section>
</div>
<?php
require RUTA_APP . '/vistas/inc/footer.php';

