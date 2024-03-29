<section class="container bg-gray-50 dark:bg-gray-900 child-form">
	<div class="justify-center">
		<div class="bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
			<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
				<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
					Agregar reservacion
				</h1>
				<form class="space-y-4 md:space-y-12" action="<?php echo base_url(); ?>reservacion/registrar" method="post">
					<div>
						<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Su clase a reservar</label>
						<select name="id_cliente" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option selected>Seleccione un cliente</option>
							<?php
							if (count($dataClients) > 0) :
								foreach ($dataClients as $row) :

							?>
									<option value="<?= $row['id_cliente'] ?>"><?= $row['nombres'] ?> - <?= $row['apellidos'] ?></option>
							<?php
								endforeach;
							endif;
							?>
						</select>
					</div>

					<div>
						<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Su clase a reservar</label>
						<select name="id_horario" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option selected>Seleccione una clase</option>
							<?php
							if (count($data) > 0) :
								foreach ($data as $row) :

							?>
									<option value="<?= $row['id_horario'] ?>"><?= $row['nombre'] ?> - <?= $row['hora_inicio'] ?> A <?= $row['hora_fin'] ?></option>
							<?php
								endforeach;
							endif;
							?>
						</select>

					</div>

					<button type="submit" class="w-full bg-blue-600 text-black font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Crear</button>
				</form>
			</div>
		</div>
	</div>
</section>