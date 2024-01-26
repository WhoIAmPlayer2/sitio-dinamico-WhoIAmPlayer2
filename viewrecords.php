<?php
    $title='Ver asistentes';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Obtener toda la asistencia
    $results= $crud->getAttendees();
?>


    <table class="table">
        <tr>
            <th>#</th>
            <th>Nombre(s)</th>
            <th>Apellido(s)</th>
            <th>Especialidad</th>
            <th>Acciones</th>
        </tr>
        <?php while ($r=$results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['asistencia_id']?></td>
                <td><?php echo $r['firstname']?></td>
                <td><?php echo $r['lastname']?></td>
                <td><?php echo $r['name']?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['asistencia_id']?>" class="btn btn-primary">Ver</a>
                    <a href="edit.php?id=<?php echo $r['asistencia_id']?>" class="btn btn-warning">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </table>

<?php
    require_once 'includes/footer.php';
?>

