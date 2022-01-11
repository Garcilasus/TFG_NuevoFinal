<?php require_once RUTA_APP.'/helpers/nosotros/nosotrosFunc.php'; ?>

<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
 <!--comienzo presentacion-->
 <div id="contenedor">
     <section class="row">
             <div class="col-md-12" id="nosotros">
                 
                 <a class="smoothscroll" href="#sobreNosotros">
<div class="scroll-down"></div>
</a>
             </div>
         
     </section>
            <section class="container-fluid">
                <div class="row fondo">
                    <div class="container" >
                        <div class="row">
                            <div id="sobreNosotros" class="card">
                                <div class="card-header grisito">
                                    <h1 class="card-title centrado encabezado">¿Quiénes somos?</h1>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-subtitle centrado encabezado">Somos jóvenes locales cuyo empeño es transmitir el amor de nuestra hermosa ciudad a los visitantes</h5>
                                    <br/>
                                    <p class="card-text text-justify">Free Tour Santander fue fundado en el año 2017 por un grupo de amigos estudiantes, siendo así el primer free tour que comenzó a realizarse en la ciudad de Santander. Desde entonces llevamos mostrando Santander con orgullo a los viajeros, estando en continua formación para poder así ofrecer un paseo ameno cargado de hechos históricos e incluso anécdotas típicas santanderinas.</p>
                                    <p class="card-text text-justify">Fuimos tan afortunados de nacer en Santander que después de trabajar varios años alrededor de Europa, transformamos este orgullo en nuestra profesión. Estamos motivados en compartir con la gente sitios especiales, episodios históricos, anécdotas divertidas y experiencias personales en Santander.</p>
                                    <p class="card-text text-justify">Somos diferentes, creemos en la comunicación de tú a tú, la transparencia, la espontaneidad y el hacer sentir a los demás en casa. 
                                    Estamos muy felices de llegar a ser embajadores de nuestra región y trabajamos duro para hacer que te sientas tan cómodo que no tendrás dudas de volver a Santander.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <div class="card-header grisito">
                                    <h2 class="card-title centrado encabezado">Nuestro equipo está formado por:</h2>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        
                                       
                                        <div class="saltito container">
                                            <p>-</p>
                                        </div>
                                        
                                         <?php echo pintaPersonal(); ?>
                                       
                                        <!--fin lugar-->
                                        <div class="container saltito">
                                            <p>-</p>
                                        </div>
                                        <div class="container d-flex justify-content-center">
                                            <p class="centrado">Te esperamos para disfrutar de nuestro paseo elaborado con cariño</p>
                                        </div>
                                        <div class="container saltito">
                                            <p>-</p>
                                        </div>
                                        <!--botones-->
                                        <div class="container d-flex justify-content-center">
                                            <a href="reservas" class="btn btn-outline-dark col-md-5 col-7 botones">Reserva tu plaza</a>
                                        </div>
                                        <div class="container saltito">
                                            <p>-</p>
                                        </div>
                                        <div class="container d-flex justify-content-center">
                                            <a href="itinerario" class="btn btn-outline-dark col-md-5 col-7 botones">Más sobre el paseo</a>
                                        </div>
                                        <!--botones-->
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
</div>
            <!--fin de la presentacion-->
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>
