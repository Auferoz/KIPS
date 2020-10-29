<?php
    include('header.php');
    $id = $_GET['id'];
?>



<section>
    <div class="container">
        <div class="row text-left">
			<div class="col-md-12 LoginLogo text-center my-3">
				<h3>PERFIL</h3>
			</div>
            <?php
                  $query = "SELECT * FROM usuarios WHERE id = '$id'";
                  $result_tasks = mysqli_query($conn, $query);    

                  while($dato = mysqli_fetch_assoc($result_tasks)) {
            ?>
            <div class="col-xs-12 col-md-7">
                    <form id="perfilform" class="form-horizontal text-center pr-4 pb-4 pl-4" role="form" action="php/perfil_guardar.php" method="POST" autocomplete="off">
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <div class="row">
                                <div class="col-md-5 text-left">
                                    <label for="" class="textlabel">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="" value="<?php echo $dato['nombre']; ?>" required>
                                </div>
                                <div class="col-md-5 text-left">
                                    <label for="" class="textlabel">Apellido:</label>
                                    <input type="text" class="form-control" name="apellido" placeholder="" value="<?php echo $dato['apellido']; ?>" required>
                                </div>
                                <div class="col-md-5 text-left">
                                    <label for="" class="textlabel">Apodo:</label>
                                    <input type="text" class="form-control" name="apodo" placeholder="" value="<?php echo $dato['apodo']; ?>" required>
                                </div>
                                <div class="col-md-5 text-left">
                                    <label for="" class="textlabel">Edad:</label>
                                    <input type="text" class="form-control" name="edad" placeholder="18+" value="<?php echo $dato['edad']; ?>" required>
                                </div>
                                <div class="col-md-5 text-left">
                                    <label for="" class="textlabel">Telefono:</label>
                                    <input type="text" class="form-control" name="telefono" placeholder="" value="<?php echo $dato['telefono']; ?>" required>
                                </div>
                                <div class="col-md-5 text-left">
                                    <label for="" class="textlabel">Genero:</label>
									<select class="browser-default custom-select mb-4" name="genero">
										<option value="<?php echo utf8_decode($row['genero']);?>" disabled><?php echo $dato['genero']; ?></option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
										<option value="Otro">Otro</option>
									</select>
                                </div>
                                <div class="col-md-5 text-left">
                                    <label for="" class="textlabel">Region:</label>
									<select class="custom-select" id="regiones" name="region"></select>
									<option><?php echo $dato['region']; ?></option>
                                </div>
                                <div class="col-md-5 text-left">
                                    <label for="" class="textlabel">Comuna:</label>
									<select class="custom-select" id="comunas" name="comuna"></select>
									<option><?php echo $dato['comuna']; ?></option>
                                </div>
                                <div class="col-md-5 text-left">
                                    <label for="" class="textlabel">Correo Electronico:</label>
                                    <input type="email" class="form-control" name="email" placeholder="" value="<?php echo $dato['correo']; ?>" required>
                                </div>
                                <div class="col-md-12 text-left">
									<label for="" class="textlabel">Biografia:</label>
									<div class="form-group">
										<textarea class="form-control rounded-0" id="bio" name="descripcion" rows="3" value="<?php echo $dato['descripcion']; ?>"><?php echo $dato['descripcion']; ?></textarea>
									</div>
                                </div>
                                <div class="col-md-12 text-left my-3">
                                    <input type="hidden" name="id" value="<?php echo $dato['id']; ?> ">
                                </div>
                                <div class="col-md-5 text-left">
                                <!-- Sign in button -->
                                <button class="btn btn-login btn-block" type="submit">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="col-xs-12 col-md-5 ImgPerfil">
				<img src="img/Perfil-Foto/<?php echo utf8_decode($row['foto_perfil']); ?>" />
            </div>
            <?php } ?>
        </div>
    </div>

</section>

<?php
    require_once('footer.php');
?>