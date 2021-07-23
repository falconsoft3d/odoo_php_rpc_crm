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
  <a href="index.php"><h1>ODOO CRM</h1></a>
  <?php
      echo '<h3>Current PHP Version: ' .  phpversion() . '</h3>';
    ?>
    
  <div class="row">
    <form name="frmContacto" method="get" action="index.php" role="form">
      <!-- Nombre -->
      <div class="mb-3">
        <label class="form-label">Nombre y Apellidos</label>
        <input type="text" class="form-control" id="input-name"  name="input-name" required value="<?php echo "Marlon" ?>">
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
        // Paso 1 - Cargamos los datos via GET
        $input_name = $_GET['input-name'];
        $input_email = $_GET['input-email'];
        $input_phone = $_GET['input-phone'];
        $comentario = $_GET['comentario'];
        $ciudad = $_GET['taskOption'];
        
        if ($input_name) {
          echo "El nombre es:".$input_name;

          // Paso 2 - Datos de conexión Odoo
          $url = 'http://localhost:8069';
          $url_auth = $url . '/xmlrpc/2/common';
          $url_exec = $url . '/xmlrpc/2/object';
          $db = 'db14-credit';
          $username = 'admin';
          $password = 'x1234567890';

          // Paso 4 - Requerimos la libreria
          // Ripcord puedes clonarlo en https://github.com/poef/ripcord
          require_once('ripcord/ripcord.php');

          // Paso 5 - Hacemos Login
          $common = ripcord::client($url_auth);
          $uid = $common->authenticate($db, $username, $password, array());
          echo("<p>Your current user id is '${uid}'</p>");
          $models = ripcord::client($url_exec);

          // Paso 6 - Insertamos el registro
          $new_lead_id = $models->execute_kw($db, $uid, $password,
              'crm.lead',
              'create', // Function name
              array( // Values-array
                  array( // First record
                      'name'=>$input_name,
                      'email_from'=>$input_email,
                      'mobile'=>$input_phone,
                      'description'=>$comentario,
                      'city'=>$ciudad,
                  )
              )
          );
          
        } else {
          echo "Sin Datos";
        }
    ?>
 


</div>

  </body>
</html>