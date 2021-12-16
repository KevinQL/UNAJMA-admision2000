<?php


// La estructura del archivo de texto (corregido) que se tiene que generar es la siguiente.

// del caracter 1 al 8 =  nro. de DNI
// del caracter 9 al  16  = espacios en blanco
// del caracter 17 al 46  = apellido paterno, completar con espacios en blanco al final, hasta la posición 30
// del caracter 47 al 76 = apellido materno
// del caracter 77 al  106 = nombres
// del caracter 107 al 108 = codigo de las carreras
// del caracter 109 al 110 = codigo modalidad de ingreso

// Código de las carreras:
// AE     Administración
// AM   Ambiental
// CT     Contabilidad
// EI      Educación
// IA     Agroindustrial
// II      Sistemas

// Código de las modalidades de ingreso
// 01 CENTRO PRE
// 03 ORDINARIO
// 04 EXAMEN EXTRAORDINARIO - PERSONAS CON DISCAPACIDAD
// 05 EXAMEN EXTRAORDINARIO - 1° Y 2° PUESTO COLEGIO
// 06 EXAMEN EXTRAORDINARIO POR BECAS VRAEM
// 10 EXAMEN EXTRAORDINARIO - TRASLADO INTERNOS
// 11 EXAMEN EXTRAORDINARIO - DEPORTISTAS CALIFICADOS
// 12 EXAMEN EXTRAORDINARIO - BECAS POR CONVENIO
// 13 EXAMEN EXTRAORDINARIO - VIOLENCIA POLITICA
// 14 EXAMEN EXTRAORDINARIO - ALTO RENDIMIENTO
// 15 EXAMEN EXTRAORDINARIO - BECA 18
// 21 TRASLADO DE ESTUDIANTES DE UNIVERSIDADES CON LICENCIAMIENTO DENEGADO
// 00 OTROS

// El archivo no debe contener tildes, ñ o caracteres especiales.

include('./_public/lib/lib.php');

    require_once ('./_public/lib/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');


    // require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
	
	//Variable con el nombre del archivo
	$nombreArchivo = 'ejemplo.xlsx';
	// Cargo la hoja de cálculo
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	
	//Asigno la hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);
	//Obtengo el numero de filas del archivo
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	echo '<table border=1><tr><td>Producto</td><td>Precio</td><td>Existencia</td></tr>';
	
	for ($i = 1; $i <= $numRows; $i++) {
		
		$nombre = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$precio = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$existencia = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		
		echo '<tr>';
		echo '<td>'. $nombre.'</td>';
		echo '<td>'. $precio.'</td>';
		echo '<td>'. $existencia.'</td>';
		echo '</tr>';
	}
	
	echo '<table>';
?>

