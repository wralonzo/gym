<h1 class="w-full text-sm font-large text-left rtl:text-right text-black-500 dark:text-black-400 text-center" style="font-size: 40px;">Listado de horarios</h1>
<br>
<a href="<?= base_url() ?>horario/registrar" class="text-white bg-green-700 "><span class="px-6 font-medium text-white-900 whitespace-nowrap dark:text-white">Agregar</span></a>
<br><br>
<div class="">
    <table id="example" class="text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3" width="200px">
                Descripcion
            </th>
            <th scope="col" class="px-6 py-3" width="200px">
                Hora Inicio
            </th>
            <th scope="col" class="px-6 py-3" width="200px">
                Hora fin
            </th>
            <th scope="col" class="px-6 py-3" width="200px">
                Clase
            </th>
            <th scope="col" class="px-6 py-3" width="200px">
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($data) > 0) :
            foreach ($data as $row) :
        ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                    <td class="px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $row['descripcion'] ?>
                    </td>
                    <td scope="row" class="px-6 ">
                        <?= $row['hora_inicio'] ?>
                    </td>
                    <td scope="row" class="px-6 ">
                        <?= $row['hora_fin'] ?>
                    </td>
                    <td scope="row" class="px-6 ">
                        <?= $row['nombre'] ?>
                    </td>
                    <td class="px-6">
                        <a href="<?= base_url() ?>clase/editar/<?= $row['id_horario'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <i class="bx bxs-edit"></i>
                        </a>
                        <?php if (session()->get('type_user') == 'admin') : ?>
                            <a href="<?= base_url() ?>clase/borrar/<?= $row['id_horario'] ?>" class="font-medium text-red-600 dark:text-blue-500 hover:underline">
                                <i class="bx bxs-trash"></i>
                            </a>
                        <?php endif ?>
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

    $("table#example").Grid({
        pagination: {
            enabled: true,
            limit: 5,
            summary: false
        },
        search: {
            enabled: true
        },
        resizable: true,
        language: {
            'search': {
                'placeholder': '🔍 Buscar...'
            },
        },
        style: {
            th: {
                'text-align': 'center'
            },
            td: {
                'text-align': 'center'
            },
        }
    });
</script>
<style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }

    #example{
        overflow: hidden;
    }
  </style>