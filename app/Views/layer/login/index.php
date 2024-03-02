<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Boxicons CSS -->
	<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
	<title>Gimnacio GT</title>
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
</head>

<body>
	<main>
		<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">


			<div class="sm:mx-auto sx:w-full" style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593); width: 30%; height: 400px;">
				<div class="sm:mx-auto sm:w-full sm:max-w-sm ">
					<br>
					<img class="mx-auto h-20 w-30 w-auto" width="50%" height="50%" src="<?php echo base_url() ?>images/logo.png" alt="Your Company">
				</div>
				<div class="mt-1 sm:mx-auto sm:w-full sm:max-w-sm">
					<form class="space-y-6" action="<?php echo base_url(); ?>login/" method="POST">
						<div>
							<label for="email" class="block text-sm font-medium leading-6 text-white">Usuario</label>
							<div class="mt-2">
								<input id="email" name="usuario" type="text" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
							</div>
						</div>

						<div>
							<div class="flex items-center justify-between">
								<label for="password" class="block text-sm font-medium leading-6  text-white">Contraseña</label>
							</div>
							<div class="mt-2">
								<input id="clave" name="clave" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
							</div>
						</div>

						<div>
							<button type="submit" class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Iniciar sesión</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
</body>

</html>