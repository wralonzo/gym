<h1 class="w-full text-sm font-large text-left rtl:text-right text-black-500 dark:text-black-400 text-center" style="font-size: 40px;">Listado de reservaciones</h1>
<br>
<a href="<?= base_url() ?>reservacion/registrar" class="text-white bg-green-700 "><span class="px-6 py-4 font-medium text-white-900 whitespace-nowrap dark:text-white">Agregar</span></a>
<br><br>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Cliente
                </th>
                <th scope="col" class="px-6 py-3">
                    Clase
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora inicio
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora fin
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($data) > 0) :
                foreach ($data as $row) :
            ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['nombres'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $row['nombre'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['hora_inicio'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['hora_fin'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['estado'] == 1 ? 'Aceptado': 'En progreso' ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['created_at'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="<?= base_url() ?>reservacion/editar/<?= $row['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <a href="<?= base_url() ?>clreservacionase/borrar/<?= $row['id'] ?>" class="px-6 py-4 font-medium text-red-600 dark:text-blue-500 hover:underline">Borrar</a>
                        </td>
                    </tr>
            <?php endforeach;
            endif; ?>

        </tbody>
    </table>
</div>
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