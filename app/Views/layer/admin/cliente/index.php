<h1 class="w-full text-sm font-large text-left rtl:text-right text-black-500 dark:text-black-400 text-center" style="font-size: 40px;">Listado de clientes</h1>
<a href="<?= base_url() ?>client/registrar" class="text-white bg-green-700 "><span class="px-6 py-4 font-medium text-white-900 whitespace-nowrap dark:text-white">Agregar</span></a>
<br><br>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table id="example" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombres
                </th>
                <th scope="col" class="px-6 py-3">
                    Apellidos
                </th>
                <th scope="col" class="px-6 py-3">
                    Direccion
                </th>
                <th scope="col" class="px-6 py-3">
                    Correo
                </th>
                <th scope="col" class="px-6 py-3">
                    Telefono
                </th>
                <th scope="col" class="px-6 py-3" align="center">
                    Membresia
                </th>
                <th scope="col" class="" align="center">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($data) > 0) :
                foreach ($data as $row) :
            ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['nombres'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['apellidos'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['direccion'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['correo'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['telefono'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['descripcion'] . ': Monto' . $row['precio'] ?>
                        </td>
                        <td width="30%">
                            <a href="<?= base_url() ?>client/editar/<?= $row['id_cliente'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <span class="">
                                    <i class="bx bxs-edit"></i>
                                </span>
                            </a>
                            <a title="Cursos" href="<?= base_url() ?>client/clases/<?= $row['id_cliente'] ?>" class="font-medium text-indigo-600 dark:text-blue-500 hover:underline">
                                <span class="">
                                    <i class="bx bxs-copy"></i>
                                </span>
                            </a>
                            <?php if (session()->get('type_user') == 'admin') : ?>
                            <a href="<?= base_url() ?>client/borrar/<?= $row['id_cliente'] ?>" class="font-medium text-red-600 dark:text-blue-500 hover:underline">
                                <span class="">
                                    <i class="bx bxs-trash"></i>
                                </span>
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
        pagination: {
            limit: 20,
            summary: true
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