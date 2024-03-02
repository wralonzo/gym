<section class="container bg-gray-50 dark:bg-gray-900">
	<div class="justify-center">
		<div class="bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
			<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
				<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
					Editar cliente
				</h1>
				<form class="space-y-4 md:space-y-12" action="<?=  base_url(); ?>client/editar/<?= $data['id_cliente'] ?>" method="post">
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
						<input value="<?= $data['correo'] ?>" type="text" name="correo" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="correo@company.com" required="">
					</div>
					<div>
						<label for="clave" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Direccion</label>
						<input value="<?= $data['direccion'] ?>" type="text" name="direccion" id="direccion" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Direccion" required="">
					</div>
					<div>
						<label for="typo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">telefono</label>
						<input value="<?= $data['telefono'] ?>" type="text" name="telefono" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="5454-8989" required="">
					</div>

					<button type="submit" class="w-full bg-blue-600 text-black font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</section>