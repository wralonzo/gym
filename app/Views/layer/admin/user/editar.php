<section class="container bg-gray-50 dark:bg-gray-900  child-form">
	<div class="justify-center">
		<div class="bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
			<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
				<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
					Editar usuario
				</h1>
				<form class="space-y-4 md:space-y-12" action="<?= base_url(); ?>user/editar/<?= $data['id'] ?>" method="post">
					<div>
						<label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
						<input value="<?= $data['nombres'] ?>" type="text" name="nombres" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombres" required="">
					</div>

					<div>
						<label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
						<input value="<?= $data['apellidos'] ?>" type="text" name="apellidos" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apelldos" required="">
					</div>
					<div>
						<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
						<input value="<?= $data['usuario'] ?>" type="text" name="usuario" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="correo@company.com" required="">
					</div>
					<div>
						<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de usuario</label>
						<select name="type_user" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							<?php
							$selected = '';
							$selected2 = '';
							$selected3 = '';
							if ($data['type_user'] == 'admin') {
								$selected = 'selected';
							}
							if ($data['type_user'] == 'vendor') {
								$selected2 = 'selected';
							}
							if ($data['type_user'] == 'lead') {
								$selected3 = 'selected';
							}
							 ?>
							<option value="vendor" <?= $selected ?>>Instructor</option>
							<option value="admin" <?= $selected2 ?>>Administrador</option>
							<option value="lead" <?= $selected3 ?>>Cliente</option>
							<!-- <option value="lead">Invitado</option> -->
						</select>
					</div>

					<button type="submit" class="w-full bg-blue-600 text-black font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</section>