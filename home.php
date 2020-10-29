<?php
    include('header.php');
?>
<section>
    <div class="container">
        <div class="row text-left">
            <div class="col-xs-12 col-md-12 my-2">
            </div>
                <?php
					$query = "SELECT * FROM usuarios";
					$result_tasks = mysqli_query($conn, $query);
					while($dato = mysqli_fetch_assoc($result_tasks)) {
				?>
            <div class="col-xs-4 col-md-1 m-0 p-1">
                <!-- Card deck -->
                <div class="card-deck">
                    <!-- Card -->
                    <div class="card">
                        <!--Card image-->
                        <div class="view overlay">
                            <img class="card-img-top" src="img/Perfil-Foto/<?php echo $dato['foto_perfil']; ?>" alt="Imagen">
                            <a href="visualizar.php?id=<?php echo $dato['id']; ?>">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card content-->
                        <div class="card-body d-none">
                            <!--Title-->
                            <h4 class="card-title"><?php echo $dato['nombre']; ?></h4>
                            <!--Text-->
                            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                            <a href="visualizar.php?id=<?php echo $dato['id']; ?>"><button type="button" class="btn btn-light-blue btn-md">Saber Mas</button></a>
                        </div>

                    </div>
                    <!-- Card -->
                </div>
                <!-- Card deck -->
                
            </div> <!-- COL 12 -->

                <?php } ?>
            <div class="col-xs-12 col-md-12 my-2">
            </div>
            <div class="col-xs-12 col-md-4 p-1 m-0">
				<div class="ImagenHome">
					<img class="card-img-top" src="img/Perfil-Foto/persona1.jpg" alt="Imagen">
					<img class="card-img-top" src="img/Perfil-Foto/persona1.jpg" alt="Imagen">
					<img class="card-img-top" src="img/Perfil-Foto/persona1.jpg" alt="Imagen">
				</div>
            </div>
            <div class="col-xs-12 col-md-4 p-1 m-0">
				<div class="ImagenHome">
					<img class="card-img-top" src="img/Perfil-Foto/persona1.jpg" alt="Imagen">
					<img class="card-img-top" src="img/Perfil-Foto/persona1.jpg" alt="Imagen">
					<img class="card-img-top" src="img/Perfil-Foto/persona1.jpg" alt="Imagen">
				</div>
            </div>
            <div class="col-xs-12 col-md-4 p-1">
				<div class="ImagenHome">
					<img class="card-img-top" src="img/Perfil-Foto/persona1.jpg" alt="Imagen">
					<img class="card-img-top" src="img/Perfil-Foto/persona1.jpg" alt="Imagen">
					<img class="card-img-top" src="img/Perfil-Foto/persona1.jpg" alt="Imagen">
				</div>
            </div>
        </div>
    </div>

</section>

<?php
    require_once('footer.php');
?>