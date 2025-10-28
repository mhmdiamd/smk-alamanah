<?php

require_once "../Storage/data_sepeda.php";

class SepedaRepository
{
    protected $data_sepeda = [];

    public function __construct($default_data_sepeda)
    {
        $this->data_sepeda = $default_data_sepeda;
    }

    // Get All
    public function getAllSepeda()
    {
        return $this->data_sepeda;
    }

    // Get Detail
    public function getDetailSepedaById($id)
    {
        $foundSepeda = null;
        foreach ($this->data_sepeda as $sepeda) {
            if ($sepeda['id'] == $id) {
                $foundSepeda = $sepeda;
            }
        }

        return $foundSepeda;
    }

    // Create
    public function createSepeda($sepeda)
    {
        array_push($this->data_sepeda, $sepeda);
    }

    // Update
    public function updateSepedaById($id, $new_sepeda)
    {
        for ($i = 0; $i < count($this->data_sepeda); $i++) {
            if ($this->data_sepeda[$i]['id'] == $id) {
                $this->data_sepeda[$i] = $new_sepeda;
            }
        }
    }

    // Delete
    public function deleteSepedaById($id)
    {
        $new_data_sepeda = [];
        foreach ($this->data_sepeda as $sepeda) {
            if ($sepeda['id'] != $id) {
                array_push($new_data_sepeda, $sepeda);
            }
        }

        $this->data_sepeda = $new_data_sepeda;
    }

    public function showData() {
        foreach($this->data_sepeda as $sepeda) {
            echo $sepeda['id'] . " " . $sepeda['merek'] . "<br>";
        }
    }
}

$sepedaRepository = new SepedaRepository($data_sepeda);
// $sepedaRepository->showData();

// echo "<br>";
// echo "<br>";

// echo $sepedaRepository->getDetailSepedaById(6)['merek'];

// echo "<br>";
// echo "<br>";

// $sepedaRepository->deleteSepedaById(1);
// $sepedaRepository->deleteSepedaById(2);

// $sepedaRepository->showData();

// echo "<br>";
// echo "<br>";

// $new_sepeda = [
//     "id" => 7,
//     "merek" => "Polygon7",
//     "tipe" => "Mountain",
//     "harga" => 1500000,
//     "gambar" => "./sepeda1.jpg",
//     "deskripsi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique sunt 
//     ad delectus facere neque fugiat suscipit odit nulla possimus harum corrupti voluptatem, sapiente obcaecati porro."
// ];

// $sepedaRepository->createSepeda($new_sepeda);
// $sepedaRepository->showData();

// echo "<br>";
// echo "<br>";


// $new_sepeda_update = [
//     "id" => 6,
//     "merek" => "Polygon6 Update",
//     "tipe" => "Mountain",
//     "harga" => 1500000,
//     "gambar" => "./sepeda1.jpg",
//     "deskripsi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
//     Similique sunt ad delectus facere neque fugiat suscipit odit nulla possimus harum corrupti voluptatem, sapiente obcaecati porro."
// ];

// $sepedaRepository->updateSepedaById(6, $new_sepeda_update);
// $sepedaRepository->showData();