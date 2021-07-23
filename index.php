<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM odoo PHP</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<!-- FORMULARIO -->
<div class="container">
  <a href="crm.php"><h1>ODOO CRM</h1></a>
  <?php
      echo 'Current PHP Version: ' .  phpversion();
    ?>
    
  <div class="row">
    <form name="frmContacto" method="get" action="crm.php" role="form">
      <!-- Nombre -->
      <div class="mb-3">
        <label class="form-label">Nombre y Apellidos</label>
        <input type="text" class="form-control" id="input-name"  name="input-name" required value="Marlon">
      </div>
      <!-- Telefono -->
      <div class="mb-3">
        <label class="form-label">Teléfono de Contacto</label>
        <input type="text" class="form-control" id="input-phone"  required name="input-phone" value="+34662470645">
      </div>
      <!-- Email -->
      <div class="mb-3">
        <label class="form-label">Email de Contacto</label>
        <input type="email" class="form-control" id="input-email"  required name="input-email" value="mfalcon@ynext.cl">
      </div>
      <!-- Provincia -->
      <div class="mb-3">
        <label class="form-label">Provincia</label>
        <select name="taskOption" required class="form-control" required>
            <option value="madrid">Madrid</option>
            <option value="valencia">Valencia</option>
        </select>
      </div>
      <!-- Comentarios -->
      <div class="mb-3">
      <label class="form-label">Comentarios</label>
      <textarea class="form-control" rows="3" class="form-control" name="comentario" placeholder="comentario" 
      value="Clear" required>Comentarios Demo
      </textarea>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    </div>

    

    
    <?php
        $input_name = $_GET['input-name'];
        $input_email = $_GET['input-email'];
        $input_phone = $_GET['input-phone'];
        $comentario = $_GET['comentario'];
        $ciudad = $_GET['taskOption'];
        
        if ($input_name) {
          echo "El nombre es:".$input_name;
        } else {
          echo "Sin Datos";
        }
    ?>
 


</div>

  </body>
</html>