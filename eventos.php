<?php  
	require 'php/conexion.php';
	header('Content-Type: application/json');
	$pdo = new PDO("mysql:dbname=clinica; host=localhost","root","");
    
    $accion=(isset($_GET['accion']))?$_GET['accion']:'leer';
    switch($accion){
        case 'agregar':
            $sql = $pdo->prepare('INSERT INTO citas(title,doctor,doctor_asignado,enfermera,start,end,estatus,servicio,cubiculo,color,hora_agr,razon_social)VALUES(:title,:doctor,:doctor_asignado,:enfermera,:start,:end,:estatus,:servicio,:cubiculo,:color,:dat,:raz)');
			$result = $sql->execute(array(                
				"title" => $_POST['title'],
				"doctor" => $_POST['doctor'],
				"doctor_asignado" => $_POST['doctor_asignado'],
				"enfermera" => $_POST['enfermera'],
				"start" => $_POST['start'],
				"end" => $_POST['end'],				
				"estatus" => 'Generado',
				"servicio" => $_POST['servicio'],
				"cubiculo" => $_POST['cubiculo'],
                "color" => '#ef8cf9',
                "dat" => $_POST['date'],
                "raz" => $_POST['razon_social']
                
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
				"estatus" => 'Espera',
                "color" => '#0c6f0f'
            ));
            echo json_encode($result);
            break;
        case 'confirmar':
            $sql = $pdo->prepare('UPDATE citas SET                
                estatus=:estatus,
                color=:color
				WHERE id = :id');
                $result = $sql->execute(array(
                "id"=>$_POST['id'],								
				"estatus" => 'Confirmado',
                "color" => '#57cbc0'
            ));
        default:
            $sql = $pdo->prepare("SELECT * FROM citas");
            $sql -> execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
    }

	
?>