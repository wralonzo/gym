<section class="container bg-gray-50 dark:bg-gray-900 child-form">
	<div class="justify-center">
		<div class="bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
			<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
				<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
					Editar Pago
				</h1>
				<form class="" action="<?php echo base_url(); ?>payment/editar/<?= $data['id_payment'] ?>" method="post">
					<div>
						<label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detalle</label>
						<input type="text" value="<?= $data['detail'] ?>" name="detail" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Detalle del pago" required="">
					</div>

					<div>
						<label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monto</label>
						<input type="number" value="<?= $data['amount'] ?>" name="amount" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Monto del pago" required="">
					</div>
					<div>
						<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clientes</label>
						<select name="id_client" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option selected>Seleccione un cliente</option>
							<?php
							if (count($dataClients) > 0) :
								foreach ($dataClients as $row) :
									$select = '';
									if($data['id_client'] == $row['id_cliente']){
										$select = 'selected';
									}

							?>
									<option <?= $select ?> value="<?= $row['id_cliente'] ?>"><?= $row['nombres'] ?> - <?= $row['apellidos'] ?></option>
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
							if (count($horarios) > 0) :
								foreach ($horarios as $row) :
									$select = '';
									if($data['id_horario'] == $row['id_horario']){
										$select = 'selected';
									}

							?>
									<option <?= $select ?> value="<?= $row['id_horario'] ?>"><?= $row['nombre'] ?> - <?= $row['hora_inicio'] ?> A <?= $row['hora_fin'] ?></option>
							<?php
								endforeach;
							endif;
							?>
						</select>

					</div>
					<br>
					<button type="submit" class="w-full bg-blue-600 text-black font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Crear</button>
				</form>
			</div>
		</div>
	</div>
</section>