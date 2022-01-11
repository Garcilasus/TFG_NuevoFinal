<?php

require_once RUTA_APP.'/modelos/Articulo.php'; 
require_once RUTA_APP.'/librerias/DB.php';


function pintayPaginaNoticias()
{
    $salida = "";
    $articulosPorPagina = 8;
    $iniciar = ($_GET['pagina']-1)*$articulosPorPagina;
    $totalArticulos = DB::cuentaArticulos();
    $arrayArticulos = DB::obtenerArticulos(intval($iniciar), intval($articulosPorPagina));
    $paginas = ceil($totalArticulos/$articulosPorPagina);
    
    if ($_GET['pagina'] > $paginas || $_GET['pagina'] < 1)
    {
        
        header('Location:blog?pagina=1');
    }
//    echo "<script>console.log('".$iniciar."');</script>";
  
//    echo "<script>alert('".(count($arrayPersonal)-1)."');</script>";
    for ($i = 0; $i<count($arrayArticulos); $i++)
    {
        $fecha = implode("/",array_reverse(explode("-",$arrayArticulos[$i]->getFecha())));
        
//        $salida .= "<script>console.log(".print_r($fecha).");</script>";
        
        $salida .= "<div class='col-md-6 col-12 col-lg-6'>";
        $salida .= "<div class='card'>";
        $salida .= "<img class='card-img-top offset-4 img-thumbnail' src='img/".$arrayArticulos[$i]->getFoto()."' alt='".$arrayArticulos[$i]->getFoto()."' style='width:33%;'>";
        $salida .= "<div class='card-body'>";
        $salida .= "<h5 class='card-title centrado encabezado'>".$arrayArticulos[$i]->getTitulo()."</h5>";
        $salida .= "<p class='card-text text-center'>".$arrayArticulos[$i]->getDescripcion()."</p>";
        $salida .= "<p class='card-text text-center'>Categoría: ".$arrayArticulos[$i]->getCategoria()."</p>";
        $salida .= "<p class='card-text text-center'>".$fecha."</p>";
        $salida .= "<div class='container d-flex justify-content-center'>
                   <input type='button' class='btn col-md-12 col-12 col-lg-6 botones' value='Más' data-toggle='modal' data-target='#modal".$i."'>
                   </div>
                   </div>
                   </div>";
        
        $salida .= "<div class='row'>";
        $salida .= '<div id="content'.$i.'">';
        $salida .= '<div class="modal fade" id="modal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modaltitle'.$i.'" aria-hidden="true">';
        $salida .= '<div class="modal-dialog" role="document">';
        $salida .= '<div class="modal-content">';
        $salida .= '<div class="modal-header">';
        $salida .= '<h5 class="modal-title encabezado" style="text-transform: uppercase;" id="modaltitle'.$i.'"><strong>'.$arrayArticulos[$i]->getTitulo().'</strong></h5>';
        $salida .= '<button type="button" class="close botones" data-dismiss="modal" aria-label="Close">';
        $salida .= '<span aria-hidden="true">×</span>';
        $salida .= '</button>';
        $salida .= '</div>';
        $salida .= '<div class="modal-body">';
        $salida .= '<p>'.$arrayArticulos[$i]->getCuerpo().'</p>';
        $salida .= '</div><div class="modal-footer">';
        $salida .= '<button type="button" class="btn botones" data-dismiss="modal">Cerrar</button>';
        $salida .= '</div></div></div></div></div>';
        $salida .= "</div>";          
        $salida .= "</div>";
        
        if ($i%2!==0)
        {
            $salida.= "<div class='container saltito'><p>-</p></div>";
        }
        else 
        {
            $salida.= "<div class='container saltito impar'><p>-</p></div>";
        }
        
        
    }
    
    $salida.= "<div class='container saltito'><p>-</p></div>";
    $salida.="<table class='col-md-12'><tr><td><ul class='pagination justify-content-center'>";
    
    if ($_GET['pagina'] <= 1)
    {
        $salida .= "<li class='page-item disabled'><a class='page-link' href='blog?pagina=".($_GET['pagina']-1)."' tabindex='-1'><<</a></li>";
    }
    else
    {
        $salida .= "<li class='page-item'><a class='page-link' href='blog?pagina=".($_GET['pagina']-1)."' tabindex='-1'><<</a></li>";
    }
    
    for ($i=0; $i<$paginas; $i++)
    {
        if ( $_GET['pagina'] == $i+1)
        {
            $salida .= "<li class='page-item'><a class='page-link activeBlog' href='blog?pagina=".($i+1)."'>".($i+1)."</a></li>";
        }
        else
        {
            $salida .= "<li class='page-item'><a class='page-link' href='blog?pagina=".($i+1)."'>".($i+1)."</a></li>";
        }
    }
    
    if ($_GET['pagina'] >= $paginas)
    {
        $salida .= "<li class='page-item disabled'><a class='page-link' href='blog?pagina=".($_GET['pagina']+1)."' tabindex='-1'>>></a></li>";
    }
    else
    {
        $salida .= "<li class='page-item'><a class='page-link' href='blog?pagina=".($_GET['pagina']+1)."' tabindex='-1'>>></a></li>";
    }
    
    $salida.="</ul></td></tr></table>";
    
    return $salida;
    
}

function pintaDosUltimos()
{
    $arrayUltimos = DB::obtenerDosUltimosArticulos();
    $salida = "";
    $cont = 0;
    
    foreach ($arrayUltimos as $articulo)
    {
        
        $salida .= '<div class="col-md-6 col-12 col-lg col-sm-12">';
        $salida .= '<div class="card">';
        $salida .= '<div class="card-body">';
        $salida .= '<h5 class="card-title centrado encabezado">'.$articulo->getTitulo().'</h5>';
        $salida .= '<p class="card-text text-center">'.$articulo->getDescripcion().'</p>';
        $salida .= '<p class="card-text text-center">'.implode("/",array_reverse(explode("-",$articulo->getFecha()))).'</p>';
        $salida .= '<div class="container d-flex justify-content-center">';
        $salida .= '<input type="button" class="btn col-md-12 col-12 botones" data-toggle="modal" data-target="#modal'.$cont.'" value="Más">';
        $salida .= '</div></div></div></div>';
        
        $salida .= '<div id="content'.$cont.'">';
        $salida .= '<div class="modal fade" id="modal'.$cont.'" tabindex="-1" role="dialog" aria-labelledby="modaltitle'.$cont.'" aria-hidden="true">';
        $salida .= '<div class="modal-dialog" role="document">';
        $salida .= '<div class="modal-content">';
        $salida .= '<div class="modal-header">';
        $salida .= '<h5 class="modal-title encabezado" style="text-transform: uppercase;" id="modaltitle'.$cont.'"><strong>'.$articulo->getTitulo().'</strong></h5>';
        $salida .= '<button type="button" class="close botones" data-dismiss="modal" aria-label="Close">';
        $salida .= '<span aria-hidden="true">×</span>';
        $salida .= '</button>';
        $salida .= '</div>';
        $salida .= '<div class="modal-body">';
        $salida .= '<p>'.$articulo->getCuerpo().'</p>';
        $salida .= '</div><div class="modal-footer">';
        $salida .= '<button type="button" class="btn botones" data-dismiss="modal">Cerrar</button>';
        $salida .= '</div></div></div></div></div>';
        
        if ($cont == 0)
        {
            $salida .= '<div class="container saltito impar"><p>-</p></div>';
            $cont++;
        }
        
        
    }
    
    
    return $salida;
    
}