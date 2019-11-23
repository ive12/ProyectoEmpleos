<?php
require '../seguridad/conn_mysqli.php';
$op=$_POST['op'];
switch ($op) {
case '1': {//AGREGAR 
    
                $rfc=$_POST['rfc'];
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $edad=$_POST['edad'];
                $sexo=$_POST['sexo'];
                $email=$_POST['email'];
                $telefono=$_POST['telefono'];
                $direccion=$_POST['direccion'];
                $ciudad=$_POST['ciudad'];
                $usuario=$_POST['usuario'];
                $hash=$_POST['password']; 
                //$password= password_hash($hash, PASSWORD_DEFAULT);
              $password= md5($hash);

            $sql="select * from personal where rfcp='$rfc'";
            $result=$conn->query($sql);
            $nf=$result->num_rows;


            if($nf>0)
            {
                ?>
                <div class="alert alert-warning" alert>
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Warning!</strong> El registro ya existe.
                </div>
                <?php
            }else{

                    $sql_insert=$conn->query("INSERT INTO personal set rfcp='$rfc', nombrep='$nombre',apellido='$apellido',edadp=$edad,sexop='$sexo',emailp='$email',telp='$telefono',direccionp='$direccion',ciudadp='$ciudad',passwordp='$password',fk_puesto=$usuario");
                if ($sql_insert) 
                {
                    ?>
                    <div class="alert alert-success">
                         <strong>Success!</strong> Se ha guardado la información.
                    </div>
                    <?php
                       
                }
                else
                {
                    ?>
                    <div class="alert alert-warning" alert>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Warning!</strong> No se pudo Guardar.
                    </div>
                    <?php
                }
                    $conn->close();

        
    }
}break;
case '2': {
    
    echo "hola";

                $rfc=$_POST['rfcs'];
                $email=$_POST['emails'];
                $telefono=$_POST['tels'];
                $usuario=$_POST['usuarios'];
                $direccion=$_POST['dirs'];
                $ciudad=$_POST['ciudads'];
                $estado=$_POST['ests'];
                $hash=$_POST['spassword']; 
                //$password= password_hash($hash, PASSWORD_DEFAULT);
              $password= md5($hash);

            $sql="select * from emp where rfcs='$rfc'";
            $result=$conn->query($sql);
            $nf=$result->num_rows;


            if($nf>0)
            {
                ?>
                <div class="alert alert-warning" alert>
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Warning!</strong> El registro ya existe.
                </div>
                <?php
            }else{

                    $sql_insert=$conn->query("INSERT INTO emp set rfcs='$rfc',emails='$email',tels='$telefono',direccions='$direccion',ciudads='$ciudad',estados='$estado',spassword='$password',fk_puesto=$usuario");
                if ($sql_insert) 
                {
                    ?>
                    <div class="alert alert-success">
                         <strong>Success!</strong> Se ha guardado la información.
                    </div>
                    <?php
                       
                }
                else
                {
                    ?>
                    <div class="alert alert-warning" alert>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Warning!</strong> No se pudo Guardar.
                    </div>
                    <?php
                }
                    $conn->close();



}
}break;
}
?>

