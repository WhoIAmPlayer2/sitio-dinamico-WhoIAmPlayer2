<?php 
    $title= ' | Editar';
    require_once'includes/header.php'; 
    require_once'db/conn.php'; 

    $results =$crud->getSpecialties();

    if (!isset($_GET['id'])) {
        //echo 'Error';
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id=$_GET['id'];
        $attendee = $crud->getAttendeesDetails($id);
?>
    <h1 class="text-center">Edición de registro</h1>
    <form method="post" action="editpost.php">
        <input type="hidden" name="asistencia_id" value="<?php echo $attendee['asistencia_id'];?>">
        <div class="form-group">
            <label for="firstname" class="form-label">Nombre(s):</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname']; ?>" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname" class="form-label">Apellido(s):</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname']; ?>" id="lastname" name="lastname">
        </div>
        <div class="form-group">
            <label for="dob" class="form-label">Fecha de nacimiento:</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth']; ?>" id="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="specialty" class="form-label">Area de especialidad:</label>
            <select class="form-select" id="specialty" name="specialty">
                <?php while ($r=$results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['specialty_id'];?>" <?php if ($r['specialty_id']==$attendee['specialty_id']) echo 'selected';?>><?php echo $r['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" value="<?php echo $attendee['emailaddress']; ?>" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">Nosotros nunca compartiremos tu correo con alguien más.</div>
        </div>
        <div class="form-group">
            <label for="phone" class="form-label">Numero de Contacto</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber']; ?>" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">Nosotros nunca compartiremos tu numero con alguien más.</div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-outline-success" name="submit">Guardar cambios</button>
        </div>
    </form>
<?php } ?>

  <?php require_once'includes/footer.php'; ?>