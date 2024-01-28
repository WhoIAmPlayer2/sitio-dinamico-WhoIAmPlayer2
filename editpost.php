<?php
    require_once'db/conn.php';    
    //Obtener valores de la operación POST
    if(isset($_POST['submit'])){
        //Extraer valores del arreglo $_POST
        $id= $_POST['asistencia_id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];
        //Llama a la función CRUD
        $result=$crud->editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty);
        //Redirigir al index.php
        if ($result) {
            header("Location: viewrecords.php");
        }
        else{
            //echo 'error';
            include 'includes/errormessage.php';
        }
    }
    else{
        //echo 'error';
        include 'includes/errormessage.php';
    }
    
?>