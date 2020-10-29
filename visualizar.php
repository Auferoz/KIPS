<?php
    include('header.php');
    $id = $_GET['id'];
?>



<section>
    <div class="container">
        <div class="row text-left">
            <div class="col-xs-12 col-md-12 my-4">
			</div>
            <?php
                  $query = "SELECT * FROM usuarios WHERE id = '$id'";
                  $result_tasks = mysqli_query($conn, $query);    

                  while($dato = mysqli_fetch_assoc($result_tasks)) {
            ?>
            <div class="col-xs-12 col-md-7">
               <h1>PERFIL DE: <br><b><?php echo $dato['nombre'].' '.$dato['apellido']; ?></b></h1>
               <h1><b>Edad: </b><?php echo $dato['edad']; ?></h1>
               <h1><b>Genero: </b><?php echo $dato['genero']; ?></h1>
               <h1><b>Region: </b><?php echo $dato['region']; ?></h1>
               <h1><b>Comuna: </b><?php echo $dato['comuna']; ?></h1>
            </div>
            <div class="col-xs-12 col-md-5 ImgVizualizar">
				<img src="img/Perfil-Foto/<?php echo $dato['foto_perfil']; ?>" />
            </div>
            <?php } ?>
        </div>
    </div>

</section>

<?php
    require_once('footer.php');
?>