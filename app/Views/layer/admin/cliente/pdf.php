<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>

    <style>
        .box {
            display: flex;
            flex-direction: column;
        }

        table {
            border-collapse: collapse;
            border: 1.5px solid black;

        }

        table td {
            border: 1px dotted #121312c7;

            padding: 10px;
        }

        table td:first-child {
            border-left: 0px solid #000000;
        }

        table tr:first-child {
            border: 1.5px solid black;
            padding: 5px;

        }

        table th {
            border: 0px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <center>
        <h4>Control de asistencia</h4>
        <table>
            <thead>
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
                    Fecha de asistencia
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
    </center>

    <script>
        window.addEventListener('load', function() {
            window.print();
        });
    </script>
</body>

</html>