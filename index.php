<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Tecnica</title>

</head>

<body>
    <div class="container" id = "crud">
        <div class="row">
            <div class="col">
                <h1>INSERTAR CLIENTE</h1>    
                <form id="frmInsert" method="post">
                    <div class="col">
                        <label for="">Nombre</label>
                        <input class="col" type="text" name="nombre" value="" id="nombre" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Apellido</label>
                        <input class="col" type="text" name="apellidos" value="" id="apellidos" placeholder="">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btnGuardar" id="btnGuardar" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="col-8">
            <h1>LISTAR/ACTUALIZAR/BORRAR CLIENTE</h1>   
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                        </tr>
                    </thead>
                    <?php
                    include 'connection.php';
                    $sql = "SELECT * FROM cliente";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($fila = mysqli_fetch_array($ejecutar)) {
                        $datos = $fila[0]."||".
                        $fila[1]."||".
                        $fila[2];    
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $fila[0]; ?></td>
                                <td><?php echo $fila[1]; ?></td>
                                <td><?php echo $fila[2]; ?></td>
                                <td><button class="btn-small modal-trigger" data-toggle="modal" id="btnModal" data-target = "#modal2" onclick= "completeModal('<?php echo $datos?>');">Editar</button></td>
                            </tr> 
                        </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id = "modal2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="frmUpdate" method="post">
                    <div class="col">
                        <label for="">Id</label>
                        <input class="col" type="text" name="idU" value="" id="idU" placeholder="">
                    </div>
                    <div class="col">
                        <label for="">Nombre</label>
                        <input class="col" type="text" name="nombreU" value="" id="nombreU" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Apellido</label>
                        <input class="col" type="text" name="apellidosU" value="" id="apellidosU" placeholder="">
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnActualizar" id="btnActualizar" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                    <button type="submit" name="btnEliminar" id="btnEliminar" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id = "crud2">
    <div class="col-8">
    <h1>CONSULTA INNER JOIN - WHERE LIKE </h1>   
                <table>
                    <thead>
                        <tr>
                            <th>ID CLIENTE</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>ID VENTA</th>
                            <th>ID PRODUCTO</th>
                            <th>NOMBRE PRODUCTO</th>
                            <th>PRECIO UNITARIO</th>
                            <th>CANTIDAD</th>
                            <th>MONTO TOTAL</th>
                        </tr>
                    </thead>
                    <?php
                    include 'connection.php';
                    
                    $sql = "SELECT * from cliente c inner join venta v 
                                        on c.idCliente = v.idCliente
                            inner join producto p 
                                        on v.idProducto = p.idProducto 
                            WHERE p.idTienda LIKE 1";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $fila[0]; ?></td>
                                <td><?php echo $fila[1]; ?></td>
                                <td><?php echo $fila[2]; ?></td>
                                <td><?php echo $fila[3]; ?></td>
                                <td><?php echo $fila[4]; ?></td>
                                <td><?php echo $fila[10]; ?></td>
                                <td><?php echo $fila[11]; ?></td>
                                <td><?php echo $fila[6]; ?></td>
                                <td><?php echo $fila[11]*$fila[6]; ?></td>
                            </tr> 
                        </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>
    </div>
    <script src="funciones.js"></script>
    <script src="https://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#btnGuardar").on('click', function(e) {
                e.preventDefault();
                addData();
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#btnActualizar").on('click', function(e) {
                e.preventDefault();
                actualizarDatos();
            });
        });
        
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#btnEliminar").on('click', function(e) {
                e.preventDefault();
                eliminarDatos();
            });
        });
        
    </script>
</body>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>

</html>