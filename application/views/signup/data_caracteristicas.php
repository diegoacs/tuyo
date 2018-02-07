

					<!-- info servicios -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-coffee text-title"></span>&nbsp;
								Servicios y caracteristicas
							</h3>
						</div>
						<div class="panel-body">
							
							<?php

								echo $caracteristicas;
							?>

						</div>
					</div>

					<!-- adicionales -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-coffee text-title"></span>&nbsp;
								Adicionales
							</h3>
						</div>
						<div class="panel-body">
							
						<?php

							echo $adicionales;
						?>


						</div>
					</div>


					<div class="modal fade" id="modal-img">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body">
									<?php

										echo form_input(array('type' => 'hidden',
														'value' => '',
														'class' => 'id-img-see'));

									?>
									<img class='img-responsive watch-img' src="" alt="">

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger delete-img">Eliminar</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>