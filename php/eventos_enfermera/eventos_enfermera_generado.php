<?php  
	require '../../php/conexion.php';
    session_start();
    $usuario = $_SESSION['usuario']['nombre_usuario'];
    $tipo = $_SESSION['usuario']['tipo'];
    $nombre = $_SESSION['usuario']['nombre'];
	header('Content-Type: application/json');
	$pdo = new PDO("mysql:dbname=clinica; host=localhost","root","");
    
    $accion=(isset($_GET['accion']))?$_GET['accion']:'leer';
    switch($accion){        
        case 'modificar':
            $sql = $pdo->prepare('UPDATE citas SET 
				title=:title,
				doctor=:doctor,
				doctor_asignado=:doctor_asignado,
				enfermera=:enfermera,
				start=:start,
				end=:end,
                estatus=:estatus,
                servicio=:servicio,
                cubiculo=:cubiculo,
                color=:color
				WHERE id = :id');
				$result = $sql->execute(array(
                "id"=>$_POST['id'],
				"title" => $_POST['title'],
				"doctor" => $_POST['doctor'],
				"doctor_asignado" => $_POST['doctor_asignado'],
				"enfermera" => $_POST['enfermera'],
				"start" => $_POST['start'],
				"end" => $_POST['end'],				
				"estatus" => 'Consulta',
				"servicio" => $_POST['servicio'],
				"cubiculo" => $_POST['cubiculo'],
                "color" => '#f0671f'
			));
            echo json_encode($result);
            break;       
        default:
            $sql = $pdo->prepare("SELECT id,CONCAT(title,'--',servicio) as title,doctor,doctor_asignado,enfermera,start,end,materiales,duracion,estatus,servicio,cubiculo,color from citas WHERE estatus = 'Generado' and enfermera like '$nombre'");
            $sql -> execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
    }

	
?>