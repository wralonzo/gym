<section class="bg-gray-50 dark:bg-gray-900 child-form">
	<div class="justify-center">
		<div class="bg-white shadow dark:border dark:bg-gray-800 dark:border-gray-700">
			<div class="p-6 space-y-4 md:space-y-6 ">
				<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
					Crear usuario
				</h1>
				<form class="space-y-4 md:space-y-12" action="<?php echo base_url(); ?>/login/registrar" method="post">
					<div>
						<label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
						<input type="text" name="nombres" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tus nombres" required="">
					</div>

					<div>
						<label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
						<input type="text" name="apellidos" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tus apelldos" required="">
					</div>
					<div>
						<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
						<input type="text" name="usuario" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tucorreo@company.com" required="">
					</div>
					<div>
						<label for="clave" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clave</label>
						<input type="password" name="clave" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="****" required="">
					</div>
					<div>
						<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cliente es opcional</label>
						<select name="id_client" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option selected value="0">Seleccione un cliente</option>
							<?php
							if (count($clients) > 0) :
								foreach ($clients as $row) :

							?>
									<option value="<?= $row['id_cliente'] ?>"><?= $row['nombres'] ?> - <?= $row['apellidos'] ?></option>
							<?php
								endforeach;
							endif;
							?>
						</select>
					</div>
					<div>
						<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de usuario</label>
						<select name="type_user" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							<option selected>Seleccione una tipo</option>
							<option value="vendor" selected>Instructor</option>
							<option value="admin">Administrador</option>
							<option value="lead">Cliente</option>
							<!-- <option value="lead">Invitado</option> -->
						</select>
					</div>
					<button type="submit" class="w-full text-black bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Crear usuario</button>
				</form>
			</div>
		</div>
	</div>
</section>