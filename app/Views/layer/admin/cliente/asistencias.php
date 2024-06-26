<h1 class="w-full text-sm font-large text-left rtl:text-right text-black-500 dark:text-black-400 text-center" style="font-size: 40px;">Asistencias</h1>
<a target="_blank" href="<?= base_url() ?>client/pdf/<?= $idHorario ?>/<?= $idCliente ?>" class="text-red">
    <span class="px-6 py-4 font-medium text-red-600 whitespace-nowrap dark:text-white">
        <i width="100px" class="bx bxs-printer"></i>
    </span>
</a>
<br><br>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombres
                </th>
                <th scope="col" class="px-6 py-3">
                    Apellidos
                </th>
                <th scope="col" class="px-6 py-3">
                    clase
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora inicio
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora Fin
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha y hora de asistencia
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
                            <?= $row['apellidos'] ?>
                        </td>
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
                            <?= $row['created_at'] ?>
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