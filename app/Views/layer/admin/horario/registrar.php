<section class="container bg-gray-50 dark:bg-gray-900">
	<div class="justify-center">
		<div class="bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
			<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
				<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
					Registrar Horario
				</h1>
				<form class="space-y-4 md:space-y-12" action="<?php echo base_url(); ?>horario/registrar" method="post">
					<div>
						<label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
						<input type="text" name="descripcion" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre" required="">
					</div>

					<div>
						<label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hora inicial</label>
						<input type="time" name="hora_inicio" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descripcion" required="">
					</div>

					<div>
						<label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hora final</label>
						<input type="time" name="hora_fin" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descripcion" required="">
					</div>

					<div>
						<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clase asignada</label>
						<select name="id_clase" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option selected>Seleccione una clase</option>
							<?php
							if (count($clases) > 0) :
								foreach ($clases as $row) :
							?>
									<option value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>
							<?php
								endforeach;
							endif;
							?>
						</select>

					</div>

					<div>
						<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instructor asignado</label>
						<select name="id_user" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option selected>Seleccione un usuario</option>
							<?php
							if (count($usuarios) > 0) :
								foreach ($usuarios as $row) :
							?>
									<option value="<?= $row['id'] ?>"><?= $row['nombre'] ?> <?= $row['apellidos'] ?></option>
							<?php
								endforeach;
							endif;
							?>
						</select>

					</div>

					<div class="flex items-center mb-4">
						<?php
						if (count($dias) > 0) :
							$count = 0;
							foreach ($dias as $dia) :
								if ($count % 2 == 0) :
						?>
									<input id="<?= $dia['id_dia'] ?>" name="dias[]" type="checkbox" value="<?= $dia['id_dia'] ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
									<label for="<?= $dia['id_dia'] ?>" class="ms-2 text-sm px-4 font-medium text-gray-900 dark:text-gray-300"><?= $dia['nombre'] ?></label>
						<?php
								endif;
								$count = $count + 1;
							endforeach;
						endif;
						?>
					</div>

					<div class="flex items-center mb-4">
						<?php
						if (count($dias) > 0) :
							$count = 0;
							foreach ($dias as $dia) :
								if ($count % 2 == 1) :
						?>
									<input id="<?= $dia['id_dia'] ?>" name="dias[]" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
									<label for="<?= $dia['id_dia'] ?>" class="ms-2 text-sm px-4 font-medium text-gray-900 dark:text-gray-300"><?= $dia['nombre'] ?></label>
						<?php
								endif;
								$count = $count + 1;
							endforeach;
						endif;
						?>
					</div>
					<button type="submit" class="w-full bg-blue-600 text-black font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Crear</button>
				</form>
			</div>
		</div>
	</div>
</section>