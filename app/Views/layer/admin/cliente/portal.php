<h1 class="w-full text-sm font-large text-left rtl:text-right text-black-500 dark:text-black-400 text-center" style="font-size: 40px;">Marcaje de asistencia</h1>
<br>
<style>
	.navbar {
		display: none;
	}

	.sidebar {
		display: none;
	}
</style>
<section class="container bg-gray-50 dark:bg-gray-900">
	<div class="justify-center">
		<div class="bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
			<div class="p-6 md:space-y-2 sm:p-8">
				<form class="md:space-y-2" action="<?php echo base_url(); ?>client/asistencia" method="post">
					<div>
						<label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id Cliente</label>
						<input type="text" name="id_cliente" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombres" required="">
					</div>

					<div>
						<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Su clase asignada</label>
						<select name="id_clase" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option selected>Seleccione una clase</option>
							<?php
							if (count($data) > 0) :
								foreach ($data as $row) :
							?>
									<option value="<?= $row['id_clase'] ?>"><?= $row['nombre'] ?></option>
							<?php
								endforeach;
							endif;
							?>
						</select>

					</div>

					<button type="submit" class="w-full bg-blue-600 text-black font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white">Marcar asistencia</button>
				</form>
			</div>
		</div>
	</div>
</section>
<script src="https://cdn.tailwindcss.com"></script>
<script>
	tailwind.config = {
		theme: {
			extend: {
				colors: {
					clifford: '#da373d',
				}
			}
		}
	}
</script>
<style type="text/tailwindcss">
	@layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>