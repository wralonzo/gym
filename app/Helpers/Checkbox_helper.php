<?php


function getChecked($idHorario, $idDia)
{
    $db  = \Config\Database::connect();
    $builder = $db->table('dias_horario');
    $builder->where('id_horario', $idHorario);
    $builder->where('id_dia', $idDia);
    $output = $builder->get()->getRow();
    if(isset($output)){
        return 'checked';
    }
    return '';
}
