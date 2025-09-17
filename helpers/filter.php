<?php

namespace Helpers;

function filter_sepeda_by_tipe($data_sepeda, $tipe)
{
    $dataSepeda = [];

    if(!$tipe) {
        foreach($data_sepeda as $sepeda){
            foreach($sepeda['items'] as $item) {
                $dataSepeda[] = $item;
            }
        }

        return $dataSepeda;
    }

    foreach ($data_sepeda as $sepeda) {
        if ($sepeda['judul'] == $tipe) {
            $dataSepeda = $sepeda['items'];
        }
    }

    return $dataSepeda;
};
