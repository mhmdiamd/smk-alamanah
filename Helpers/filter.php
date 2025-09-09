<?php

namespace Helpers;

function filter_data_sepeda($data, $tipe)
{
    $newData = [];

    if (!$tipe) {
        foreach ($data as $sepeda) {
            foreach ($sepeda['items'] as $item) {
                $newData[] = $item;
            }
        }

        return $newData;
    }

    foreach ($data as $sepeda) {
        if ($sepeda['tipe'] == $tipe) {
            $newData = $sepeda['items'];
        }
    }

    return $newData;
}

function filter_by_id($data, $id)
{
    $detail_sepeda = null;
    foreach ($data as $sepeda) {
        if ($sepeda['id'] == $id) {
            $detail_sepeda = $sepeda;
        }
    }
    
    return $detail_sepeda;
}
