<?php
    require_once'db/conn.php';
    if (!$_GET['id']) {
        include 'includes/errormessage.php';
        header("Location:viewrecords.php");
    } else {
        // Obtener valor de ID
        $id=$_GET['id'];
        $result=$crud->deleteAttendee($id);
        if ($result) {
            header("Location: viewrecords.php");
        } else {
            echo '';
        }
        
    }
    


?>