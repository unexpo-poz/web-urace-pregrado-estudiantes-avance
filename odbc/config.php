<?php
$enProduccion		= true;
//$raizDelSitio		= 'https://podaceweb/notas/';
//$urlDelSitio		= 'https://podaceweb/';
$raizDelSitio		= 'http://'.$_SERVER['SERVER_NAME'].'/web/urace/pregrado/estudiantes/avance/';
$urlDelSitio		= 'http://www.poz.unexpo.edu.ve/web/urace/';

$lapsoProceso		= '2023-2';

(substr($lapsoProceso,-1,1) == 'I') ? $int = " Intensivo " : $int = "" ;

$tLapso				= ' Lapso '.$int.$lapsoProceso;
$inscHabilitada		= true;
$modoInscripcion	= '1'; // 1: Inscripcion, 2: Inclusion y Retiro
$titulo				= 'Sistema de avance academico'; //
//$LBT	= '$_SERVER[DOCUMENT_ROOT].'/consulta_calificaciones_2010-1I.log'; //
//$LBT	= 'C:/AppServ/www/log/pregrado/estudiantes/consulta_avance_'.$lapsoProceso.'.log';
$LBT	= $_SERVER[DOCUMENT_ROOT].'/log/pregrado/estudiantes/consulta_avance_'.$lapsoProceso.'.log';
$basededatos	= "CENTURA-DACE"; //
$usuariodb = "c"; //
$clavedb = "c"; //
$user="usersdb"; //



if ($modoInscripcion == '1'){
	$tProceso	= 'Consulta de Avance Academico ';
}
else if ($modoInscripcion == '2'){
	$tProceso	= 'Inclusiones y Retiros para Alumnos Regulares';
}


//Si se requiere imprimir en planilla un mensaje extra, activar esto y colocarlo
// en inc/msgExtra.php
$mensajeExtra		= false; 
//Las distintas sedes de UNEXPO - actualizar de acuerdo a la necesidad
$sedesUNEXPO = array (	'CCS' => array('BQTO','CARORA'), 
						'CCS_'  => array('DACECCS'),
						'POZ'  => array('DACE9')
				);

//$sedeActiva = 'BQTO';
//$sedeActiva = 'CCS';
$sedeActiva = 'POZ';
$pensumPoz = '5';

$nucleos = $sedesUNEXPO[$sedeActiva];

//$vicerrectorado		= "Luis Caballero Mej&iacute;as";
//$vicerrectorado		= "Barquisimeto";
$vicerrectorado		= "Puerto Ordaz";
$nombreDependencia = 'Unidad Regional de Admisi&oacute;n y Control de Estudios';

// * * * * * OJO OJO OJO OJO * * * * * 
// Cambiar esto manualmente de acuerdo a la jornada.
// Tipo de jornada
//	0 : deshabilitado 
//	1 : solo preinscritos en las materias preinscritas.
//	2 : solo preinscritos, pero pueden cambiar las materias.
//	3 : todos preinscritos o no preinscritos
//$tipoJornada = 0;
//$tablaOrdenInsc = 'ORDEN_INSCRIPCION';

/*Unidad Tributaria y Costo de las materias:
$unidadTributaria	= 33600;
$valorPreMateria	= 0.2*$unidadTributaria;
$valorMateria		= 89720;
// Maximo numero de depositos a presentar:
$maxDepo			= 8;*/

// Proteccion de las paginas contra boton derecho, no javascript y navegadores no soportados:
if ($enProduccion){
	$botonDerecho = 'oncontextmenu="return false"';
	$noJavaScript = '<noscript><meta http-equiv="REFRESH" content="0;URL=no-javascript.php"></noscript>';
	$noCache	  = "<meta http-equiv=\"Pragma\" content=\"no-cache\">\n";
	$noCache	 .= '<meta http-equiv="Expires" content="-1">';
	$noCacheFin	  = '<head><meta http-equiv="Pragma" content="no-cache"></head>';
}
else {
	$botonDerecho = '';
	$noJavaScript = '';
	$noCache	  = '';
	$noCacheFin	  = '';
}
?>