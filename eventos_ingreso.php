<?php  
	require 'php/conexion.php';
	header('Content-Type: application/json');
	$pdo = new PDO("mysql:dbname=clinica; host=localhost","root","");
    
    $accion=(isset($_GET['accion']))?$_GET['accion']:'leer';
    switch($accion){
        case 'agregar':
            $sql = $pdo->prepare('INSERT INTO citas(title,doctor,doctor_asignado,enfermera,start,end,estatus,servicio,cubiculo,color)VALUES(:title,:doctor,:doctor_asignado,:enfermera,:start,:end,:estatus,:servicio,:cubiculo,:color)');
			$result = $sql->execute(array(                
				"title" => $_POST['title'],
				"doctor" => $_POST['doctor'],
				"doctor_asignado" => $_POST['doctor_asignado'],
				"enfermera" => $_POST['enfermera'],
				"start" => $_POST['start'],
				"end" => $_POST['end'],				
				"estatus" => 'Espera',
				"servicio" => $_POST['servicio'],
				"cubiculo" => $_POST['cubiculo'],
                "color" => 'green'
                
            ));
            echo json_encode($result);
            break;
                
        case 'eliminar':
            $respuesta = false;
            if(isset($_POST['id'])){
                $sql = $pdo->prepare("DELETE FROM citas WHERE id=:id");
                $result = $sql->execute(array("id"=>$_POST['id']));
            }
            echo json_encode($result);
            break;
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
				"estatus" => $_POST['estatus'],
				"servicio" => $_POST['servicio'],
				"cubiculo" => $_POST['cubiculo'],
                "color" => $_POST['color']
			));
            echo json_encode($result);
            break;
        case 'ingresar':
            $sql = $pdo->prepare('UPDATE citas SET                
                estatus=:estatus,
                color=:color
				WHERE id = :id');
                $result = $sql->execute(array(
                "id"=>$_POST['id'],								
				"estatus" => 'Ingreso',
                "color" => '#CC9900'
            ));
            echo json_encode($result);
            break;
        default:
            $sql = $pdo->prepare("SELECT * FROM citas where estatus = 'Generado'");
            $sql -> execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
    }

	
?>