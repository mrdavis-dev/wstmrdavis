<?php
include 'conn.php';

$Retorno 		= array();
$DatosRespuesta = array();

$DatosRespuesta['error'] 		= "0";
$DatosRespuesta['codigo'] 		= "0";
$DatosRespuesta['tipo'] 		= 'ABONOS';
$DatosRespuesta['descripcion'] 	= '** Recibos **';
$DatosRespuesta['mensaje'] 		= 'ha ocurrido un error';

if (isset($_GET["id"])) {
	$IdContrato 	= $_GET["id"];
} else {
	/*
	$DatosRespuesta['error'] 		= 1;
	$DatosRespuesta['codigo'] 		= 3;
	$DatosRespuesta['mensaje'] 		= 'Error, no se ha recibido el Numero de Contrato';
	
	$Retorno[] = $DatosRespuesta;
	*/
	
	$sql="
	SELECT 
		1 AS error, 
		3 AS codigo, 
		'ABONOS' AS tipo, 
		'** Recibos **' AS descripcion, 
		'no se ha recibido el Numero de Contrato' AS mensaje";
	$result = $db->query($sql);
	foreach ($result as $row) {
        $Retorno[] = $row;
    }
	
    echo json_encode($Retorno);
	exit(0);
}
	$TipoContratoget 	= $_GET["tipo"];
	$tipocontratoget = substr($_GET["tipo"],0,1);
if (isset($_GET["tipo"])) {
	$TipoContrato 	= $tipocontratoget;
} else {
	/*
	$DatosRespuesta['error'] 		= 1;
	$DatosRespuesta['codigo'] 		= 3;
	$DatosRespuesta['mensaje'] 		= 'Error, no se ha recibido el Tipo de Contrato (R,C,E)';
	
	$Retorno[] = $DatosRespuesta;
	*/
	
	$sql="
	SELECT 
		1 AS error, 
		3 AS codigo, 
		'ABONOS' AS tipo, 
		'** Recibos **' AS descripcion, 
		'Error, no se ha recibido el Tipo de Contrato (R,C,E)' AS mensaje";
	$result = $db->query($sql);
	foreach ($result as $row) {
        $Retorno[] = $row;
    }
	
    echo json_encode($Retorno);
	exit(0);
}

if (isset($_GET["monto"])) {
	$AbonoOriginal 	= $_GET["monto"];
} else {
	/*
	$DatosRespuesta['error'] 		= 1;
	$DatosRespuesta['codigo'] 		= 3;
	$DatosRespuesta['mensaje'] 		= 'Error, no se ha recibido el Monto de la Transaccion';
	
	$Retorno[] = $DatosRespuesta;
	*/
	
	$sql="
	SELECT 
		1 AS error, 
		3 AS codigo, 
		'ABONOS' AS tipo, 
		'** Recibos **' AS descripcion, 
		'Error, no se ha recibido el Monto de la Transaccion' AS mensaje";
	$result = $db->query($sql);
	foreach ($result as $row) {
        $Retorno[] = $row;
    }
	
    echo json_encode($Retorno);
	exit(0);
}
	$TipoPagoget 		= $_GET["medio"];
	$TipoPagoget = substr($TipoPagoget,0,2);
if (isset($_GET["medio"])) {
	$TipoPago 		= $TipoPagoget;
} else {
	/*
	$DatosRespuesta['error'] 		= 1;
	$DatosRespuesta['codigo'] 		= 3;
	$DatosRespuesta['mensaje'] 		= 'Error, no se ha recibido el Medio de Pago';
	
	$Retorno[] = $DatosRespuesta;
	*/
	
	$sql="
	SELECT 
		1 AS error, 
		3 AS codigo, 
		'ABONOS' AS tipo, 
		'** Recibos **' AS descripcion, 
		'Error, no se ha recibido el Medio de Pago' AS mensaje";
	$result = $db->query($sql);
	foreach ($result as $row) {
        $Retorno[] = $row;
    }
    echo json_encode($Retorno);
	exit(0);
}

if (isset($_GET["dispositivo"])) {
	$IdDispositivo 	= $_GET["dispositivo"];
} else {
	/*
	$DatosRespuesta['error'] 		= 1;
	$DatosRespuesta['codigo'] 		= 3;
	$DatosRespuesta['mensaje'] 		= 'Error, no se ha recibido la Identificacion del Dispositivo Movil';
	
	$Retorno[] = $DatosRespuesta;
	*/
	
	$sql="
	SELECT 
		1 AS error, 
		3 AS codigo, 
		'ABONOS' AS tipo, 
		'** Recibos **' AS descripcion, 
		'Error, no se ha recibido la Identificacion del Dispositivo Movil' AS mensaje";
	$result = $db->query($sql);
	foreach ($result as $row) {
        $Retorno[] = $row;
    }
    echo json_encode($Retorno);
	exit(0);
}

if (isset($_GET["numero"])) {
	$NumeroCheque 	= $_GET["numero"];
} else {
	$NumeroCheque 	= '';
}

if (isset($_GET["obs"])) {
	$TXT1m 			= $_GET["obs"];
} else {
	$TXT1m 			= '.';
}

// variable globales con valores FIJOS
$vss 			= 'CA';
$vsss 			= 'AB';

switch ($TipoPago) {
	case '01':
		$forma_pago = 'EFECTIVO';
    break;
	
	case '02':
		$forma_pago = 'CHEQUE';
    break;
	
	case '03':
		$forma_pago = 'OTROS';
    break;
	
	default:
		$forma_pago = 'EFECTIVO';
}

$NumCaja 	= '';
$Operador 	= 'admin';

$sql="
SELECT 
	id_dispositivo, caja, operador
FROM 
	dispositivos 
WHERE 
	id_dispositivo = '". $IdDispositivo ."';";
$result_0 = $db->query($sql);
if ($result_0->num_rows > 0) {
    $row_0 		= $result_0->fetch_assoc();
	$NumCaja 	= $row_0['caja'];
	$Operador 	= $row_0['operador'];
} else {
	/*
	$DatosRespuesta['error'] 	= 1;
	$DatosRespuesta['codigo'] 	= 2;
	$DatosRespuesta['tipo'] 	= 'R E C I B O S';
	$DatosRespuesta['mensaje'] 	= 'Error, dispositivo no DISPONIBLE para realizar esta Transaccion';
	*/
	
	$sql="
	SELECT 
		1 AS error, 
		2 AS codigo, 
		'R E C I B O S' AS tipo, 
		'** Recibos **' AS descripcion, 
		'Error, dispositivo no DISPONIBLE para realizar esta Transaccion' AS mensaje";
	$result = $db->query($sql);
	foreach ($result as $row) {
        $Retorno[] = $row;
    }
	echo json_encode($Retorno);
	exit(0);
}

$sql="
SELECT 
	FORMAT( sum(IFNULL(db,0)) - sum(IFNULL(cr,0)), 2) saldo 
FROM 
	transacciones 
WHERE 
	tipo_cli = '". $TipoContrato ."' AND idcontrato = '". $IdContrato ."'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $row 		= $result->fetch_assoc();
	$SaldoCli 	= $row['saldo'];
	
	$NumRec = 0;
	/* SECUANCIA DE RECIBOS */
		$QQ="SELECT MAX(secuencia) + 1 AS secuencia FROM Secuencia_recibosAuto;";
		$result_1 = $db->query($QQ);
		if ($result_1->num_rows > 0) {
			$row_1 		= $result_1->fetch_assoc();
			$NumRec 	= $row_1['secuencia'];
		}
		
		// Actualizacion de la Secuencias de los Recibos a utilizar
		$sqlUpdate="UPDATE Secuencia_recibosAuto SET secuencia = secuencia + 1";
		$db->query($sqlUpdate);
	/* FIN DE SECUANCIA DE RECIBOS */
	
	if ($SaldoCli==0){
		/*Recibos Anticipados*/
		
		
		$Q="
		SELECT
			c.barriada, c.cobrador
		FROM
			contratos c
		WHERE
			c.tipocliente = '". $TipoContrato ."' AND c.idcontrato = '". $IdContrato ."'";
		$result_4 = $db->query($Q);
		if ($result_4->num_rows > 0) {
			while ($row_4 = $result_4->fetch_assoc()) {
				$Barriada 	= $row_4['barriada'];
				$Cobrador 	= $row_4['cobrador'];
			}
		}
		
		$Saldo = $SaldoCli - $AbonoOriginal;
		
		$sql="
		INSERT INTO recibo (num_rec, num_cli, num_contrato, fecha, monto, forma_pago, saldo, tipo_cli, txt1, txt2, username, saldo1, num_barriada, numerocaja)
		VALUES ('".$NumRec."', '".$IdContrato."', '".$IdContrato."', NOW(), '".$AbonoOriginal."', '".$forma_pago."', '".$Saldo."', 
		'".$TipoContrato."', '".$TXT1m."', '.', '".$Operador."', 0, '".$Barriada."', '".$NumCaja."')";
		$db->query($sql);
		
		$Ref = '';
		if ( $TipoPago=='02' ){
			$Ref = 'CHEQUE #: '.$NumeroCheque;
		}
		$Saldo = 0;
		$sql="
		INSERT INTO transacciones (tipotransaccion, num_doc, tipo_cli, idcliente, idcontrato, fecha, recargo, db, cr, saldo, ss, cobrador, ref)
		VALUES ('RE', '".$NumRec."', '".$TipoContrato."', '".$IdContrato."', '".$IdContrato."', NOW(),0,0,'".$AbonoOriginal."', '".$Saldo."', 'RE', 
		'".$Cobrador."', '".$Ref."')";
		$db->query($sql);
		
		$sql="
		SELECT SUM( IFNULL(db,2) ) - SUM( IFNULL(cr,2) ) AS saldo FROM transacciones
		WHERE idcontrato = '".$IdContrato."' AND tipo_cli='".$TipoContrato."' AND ss<>'AN';";
		$result_2 = $db->query($sql);
		if ($result_2->num_rows > 0) {
			$row_2 			= $result_2->fetch_assoc();
			$Saldoactual 	= $row_2['saldo'];
			
			$sqlUpdate="
			UPDATE contratos SET saldo = '". $Saldoactual ."'
			WHERE idcontrato='". $IdContrato ."' AND tipocliente='".$TipoContrato."'";
			$db->query($sqlUpdate);
		}
		
		$DatosRespuesta['tipo'] 		= 'RECIBO ANTICIPADO';
		$DatosRespuesta['error'] 		= "0";
		$DatosRespuesta['codigo'] 		= "0";
		$DatosRespuesta['descripcion'] 	= $TXT1m;
		$DatosRespuesta['mensaje'] 		= 'Se ha realizado el PAGO correctamente';
		
		$sql="
		SELECT 
			0 AS error, 
			0 AS codigo, 
			'RECIBO ANTICIPADO' AS tipo, 
			'".$TXT1m."' AS descripcion, 
			'Se ha realizado el PAGO correctamente' AS mensaje";
		$result = $db->query($sql);
		foreach ($result as $row) {
			$Retorno[] = $row;
		}
		
	} else {
		/*Pagos Normales Abonando a Facturas Abiertas*/
		
		$TXT1m		= '.';
		
		$AbonoC = $AbonoOriginal;
		
		$Q="
		SELECT
		  t.num_doc, DATE(t.fecha) fecha, t.db, t.saldo, UPPER(DATE_FORMAT(t.fecha, '%b-%Y')) txt1, c.barriada, c.cobrador
		FROM
			transacciones t
		INNER JOIN
			contratos c ON (t.tipo_cli=c.tipocliente AND t.idcontrato=c.idcontrato)
		WHERE
			t.tipotransaccion='FA' AND t.db>0.05 AND t.saldo>0.05 AND t.tipo_cli = '". $TipoContrato ."' AND t.idcontrato = '". $IdContrato ."'
		ORDER BY
			t.fecha ASC;";
		$result_4 = $db->query($Q);
		if ($result_4->num_rows > 0) {
			while ($row_4 = $result_4->fetch_assoc()) {
				$NumFac 	= $row_4['num_doc'];
				$FechaFactu = $row_4['fecha'];
				$MontoOrig 	= $row_4['saldo'];
				$txt1 		= $row_4['txt1'];
				$Barriada 	= $row_4['barriada'];
				$Cobrador 	= $row_4['cobrador'];
				
				if ( $AbonoC > 0 ){
				
					if ( $MontoOrig <= $AbonoC ){
						$Monto = $MontoOrig;
						$Saldo = 0;
					} else {
						$Monto = $AbonoC;
						$Saldo = $MontoOrig - $AbonoC;
					}
					
					$sql="
					INSERT INTO tempo_abono (num_fact, num_rec, abono, saldo, fecha_f, fecha_r, numerocaja)
					VALUES ('".$NumFac."', '".$NumRec."', '".$Monto."', '".$Saldo."', '".$FechaFactu."', NOW(), '".$NumCaja."')";
					$db->query($sql);
					
					$sql="
					INSERT INTO aplicarabonos (norecibo, fecha, fechafactura, nofactura, monto, idcontrato, tipocliente)
					VALUES ('".$NumRec."', NOW(), '".$FechaFactu."', '".$NumFac."', '".$Monto."', '".$IdContrato."', '".$TipoContrato."')";
					$db->query($sql);
					
					$AbonoC = $AbonoC - $Monto;
					$TXT1m = $TXT1m . $txt1 .', ';
					
				}
			}
			
			$DatosRespuesta['descripcion'] 	= $TXT1m;
			
			$sql="
			INSERT INTO recibo (num_rec, num_cli, num_contrato, fecha, monto, forma_pago, saldo, tipo_cli, txt1, txt2, username, saldo1, num_barriada, numerocaja)
			VALUES ('".$NumRec."', '".$IdContrato."', '".$IdContrato."', NOW(), '".$AbonoOriginal."', '".$forma_pago."', '".$Saldo."', 
			'".$TipoContrato."', '".$TXT1m."', '.', '".$Operador."', 0, '".$Barriada."', '".$NumCaja."')";
			$db->query($sql);
			
			$Ref = '';
			if ( $TipoPago=='02' ){
				$Ref = 'CHEQUE #: '.$NumeroCheque;
			}
			$Saldo = 0;
			$sql="
			INSERT INTO transacciones (tipotransaccion, num_doc, tipo_cli, idcliente, idcontrato, fecha, recargo, db, cr, saldo, ss, cobrador, ref)
			VALUES ('RE', '".$NumRec."', '".$TipoContrato."', '".$IdContrato."', '".$IdContrato."', NOW(),0,0,'".$AbonoOriginal."', '".$Saldo."', 'RE', 
			'".$Cobrador."', '".$Ref."')";
			$db->query($sql);
			
			$sql="
			SELECT SUM( IFNULL(db,2) ) - SUM( IFNULL(cr,2) ) AS saldo FROM transacciones
			WHERE idcontrato = '".$IdContrato."' AND tipo_cli='".$TipoContrato."' AND ss<>'AN';";
			$result_2 = $db->query($sql);
			if ($result_2->num_rows > 0) {
				$row_2 			= $result_2->fetch_assoc();
				$Saldoactual 	= $row_2['saldo'];
				
				$sqlUpdate="
				UPDATE contratos SET saldo = '". $Saldoactual ."'
                WHERE idcontrato='". $IdContrato ."' AND tipocliente='".$TipoContrato."'";
				$db->query($sqlUpdate);
			}
			
			$vfac = '';
			$sql="SELECT * FROM TEMPO_ABONO WHERE num_rec = '".$NumRec."'";
			$result_3 = $db->query($sql);
			if ($result_3->num_rows > 0) {
				while ($row_3 = $result_3->fetch_assoc()) {
					$vfac = $vfac.'F'.$row_3['num_fact'].', ';
					
					$num_doc 	= $row_3['num_fact'];
					$num_rec 	= $row_3['num_rec'];
					$abono 		= $row_3['abono'];
					$saldo 		= $row_3['saldo'];
					$fecha_f 	= $row_3['fecha_f'];
					$fecha_r 	= $row_3['fecha_r'];
					
					$Q = "INSERT INTO recibo_factura (num_doc, num_rec, abono, saldo, tipo_cli, fecha_f, fecha_r, numerocaja)
					VALUES ('".$num_doc."', '".$num_rec."', '".$abono."', '".$saldo."', '".$TipoContrato."', '".$fecha_f."', 
					'".$fecha_r."', '".$NumCaja."')";
					$db->query($Q);
					
					$Q="
					UPDATE transacciones SET saldo = '".$saldo."'
					WHERE tipo_cli='".$TipoContrato."' AND idcliente='".$IdContrato."' AND idcontrato='".$IdContrato."' 
					AND num_doc='".$num_doc."' and tipotransaccion='FA'";
					$db->query($Q);
					
					$Q="
					UPDATE transacciones SET ref = '".$num_rec."'
					WHERE tipo_cli='".$TipoContrato."' AND idcliente='".$IdContrato."' AND idcontrato='".$IdContrato."' 
					AND num_doc='".$num_doc."' and tipotransaccion='FA'";
					$db->query($Q);
					
					If ( $saldo == 0 ){
						$Q="
						UPDATE transacciones SET ss = '".$vss."'
						WHERE tipo_cli='".$TipoContrato."' AND idcliente='".$IdContrato."' AND idcontrato='".$IdContrato."' 
						AND num_doc='".$num_doc."' and tipotransaccion='FA'";
					} else {
						$Q="
						UPDATE transacciones SET ss = '".$vsss."'
						WHERE tipo_cli='".$TipoContrato."' AND idcliente='".$IdContrato."' AND idcontrato='".$IdContrato."' 
						AND num_doc='".$num_doc."' and tipotransaccion='FA'";
					}
					$db->query($Q);
				}
			}
			$DatosRespuesta['tipo'] 	= 'RECIBO NORMAL';
			$DatosRespuesta['error'] 	= "0";
			$DatosRespuesta['codigo'] 	= "0";
			$DatosRespuesta['mensaje'] 	= 'Se ha realizado el PAGO correctamente';
			
			$sql="
			SELECT 
				0 AS error, 
				0 AS codigo, 
				'RECIBO NORMAL' AS tipo, 
				'".$TXT1m."' AS descripcion, 
				'Se ha realizado el PAGO correctamente' AS mensaje";
			$result = $db->query($sql);
			foreach ($result as $row) {
				$Retorno[] = $row;
			}
			
		} else {
			$DatosRespuesta['tipo'] 	= 'RECIBOS';
			$DatosRespuesta['error'] 	= 1;
			$DatosRespuesta['codigo'] 	= 1;
			$DatosRespuesta['mensaje'] 	= 'ERROR, no existen facturas abiertas para aplicar este PAGO.';
			
			$sql="
			SELECT 
				1 AS error, 
				1 AS codigo, 
				'RECIBO NORMAL' AS tipo, 
				'".$TXT1m."' AS descripcion, 
				'ERROR, no existen facturas abiertas para aplicar este PAGO.' AS mensaje";
			$result = $db->query($sql);
			foreach ($result as $row) {
				$Retorno[] = $row;
			}
		}
	}
	
	//$Retorno[] = $DatosRespuesta;
    echo json_encode($Retorno);
    
} else {
    //$Retorno[] = $DatosRespuesta;
	
	$sql="
	SELECT 
		1 AS error, 
		1 AS codigo, 
		'A B O N O S' AS tipo, 
		'.' AS descripcion, 
		'ha Ocurrido un error inesperado..' AS mensaje";
	$result = $db->query($sql);
	foreach ($result as $row) {
		$Retorno[] = $row;
	}
	
    echo json_encode($Retorno);
}
?>