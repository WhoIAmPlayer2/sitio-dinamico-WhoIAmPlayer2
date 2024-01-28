<?php 
      $title= ' | Exito';
      require_once'includes/header.php'; 
      require_once'db/conn.php';

      if(isset($_POST['submit'])){
        //Extraer valores del arreglo $_POST
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];
        //Llama a la función para insertar y trazar si exitoso o no
        $isSuccess = $crud->insert($fname,$lname,$dob,$email,$contact,$specialty);

        if ($isSuccess) {
            //echo '<h1 class="text-center text-success">Has sido registrado exitosamente!</h1>';
            include 'includes/successmessage.php';
        }
        else{
            //echo '<h1 class="text-center text-danger">Hubo un error en el procesamiento.</h1>';
            include 'includes/errormessage.php';
        }

      }
?>

    
    <!--Imprime los valores previamente introducidos con el metodo GET-->
    <!--
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <?php //echo $_GET['firstname'] . " " . $_GET['lastname'];?>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    <?php //echo $_GET['specialty'];?>
                </h6>
                <p class="card-text">
                    <?php //echo "Fecha de Nacimiento: " . $_GET['dob'];?>
                </p>
                <p class="card-text">
                    <?php //echo "Correo Electronico: " . $_GET['email'];?>
                </p>
                <p class="card-text">
                    <?php //echo "Numero de Contacto: " . $_GET['phone'];?>
                </p>
            </div>
        </div>
    -->
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] . " " . $_POST['lastname'];?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $_POST['specialty'];?>
            </h6>
            <p class="card-text">
                <?php echo "Fecha de Nacimiento: " . $_POST['dob'];?>
            </p>
            <p class="card-text">
                <?php echo "Correo Electronico: " . $_POST['email'];?>
            </p>
            <p class="card-text">
                <?php echo "Numero de Contacto: " . $_POST['phone'];?>
            </p>
        </div>
    </div>



<?php require_once'includes/footer.php'; ?>