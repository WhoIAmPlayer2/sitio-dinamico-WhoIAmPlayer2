<?php
    $title='Mostrar información';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Obtener la asistencia por id
    if (!isset($_GET['id'])) {
        echo "<h1 class='text-center text-danger'>Verifica los detalles e intenta de nuevo</h1>";
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
<?php } ?>
<?php
    require_once 'includes/footer.php';
?>


