  <?php 
      $title= ' | Inicio';
      require_once'includes/header.php'; 
      require_once'db/conn.php'; 

      $results =$crud->getSpecialties();
  ?>
      <!--
          - First name
          - Last name
          - Date of birth (Use DataPicker)
          - Specialty (Database Admin, Software Developer, Web Administrator, Other)
          - Email Address
          - Contact Number 
      -->

      <h1 class="text-center">Registro de Asistencia para Conferencia de TI</h1>
  
      <form method="post" action="success.php">
          <div class="form-group">
            <label for="firstname" class="form-label">Nombre(s):</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
          </div>
          <div class="form-group">
            <label for="lastname" class="form-label">Apellido(s):</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
          </div>
          <div class="form-group">
            <label for="dob" class="form-label">Fecha de nacimiento:</label>
            <input required type="text" class="form-control" id="dob" name="dob">
          </div>
          <div class="form-group">
            <label for="specialty" class="form-label">Area de especialidad:</label>
            <select class="form-select" id="specialty" name="specialty">
                <?php while ($r=$results->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $r['specialty_id'];?>"><?php echo $r['name'];?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="email" class="form-label">Correo Electronico</label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">Nosotros nunca compartiremos tu correo con alguien más.</div>
          </div>
          <div class="form-group">
            <label for="phone" class="form-label">Numero de Contacto</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">Nosotros nunca compartiremos tu numero con alguien más.</div>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-outline-primary" name="submit">Registrar</button>
          </div>
      </form>


  <?php require_once'includes/footer.php'; ?>