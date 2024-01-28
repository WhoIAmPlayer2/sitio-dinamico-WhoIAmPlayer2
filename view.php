<?php
    $title='Mostrar información';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Obtener la asistencia por id
    if (!isset($_GET['id'])) {
        //echo "<h1 class='text-center text-danger'>Verifica los detalles e intenta de nuevo</h1>";
        include 'includes/errormessage.php';
    } else {
        $id=$_GET['id'];
        $result=$crud->getAttendeesDetails($id);
        
?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $result['firstname'] . " " . $result['lastname'];?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['name'];?>
            </h6>
            <p class="card-text">
                <?php echo "Fecha de Nacimiento: " . $result['dateofbirth'];?>
            </p>
            <p class="card-text">
                <?php echo "Correo Electronico: " . $result['emailaddress'];?>
            </p>
            <p class="card-text">
                <?php echo "Numero de Contacto: " . $result['contactnumber'];?>
            </p>
        </div>
    </div>
    <br>
    
    <a href="viewrecords.php" class="btn btn-info">Volver a la lista</a>
    <a href="edit.php?id=<?php echo $result['asistencia_id']?>" class="btn btn-warning">Editar</a>
    <a onclick="return confirm('¿Estás seguro que deseas borrar este registro?')" href="delete.php?id=<?php echo $result['asistencia_id']?>" class="btn btn-danger">Eliminar</a>
<?php } ?>
<?php
    require_once 'includes/footer.php';
?>


