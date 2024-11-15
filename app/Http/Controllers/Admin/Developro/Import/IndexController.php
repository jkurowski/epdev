<?php

namespace App\Http\Controllers\Admin\Developro\Import;

use App\Http\Controllers\Controller;
use App\Imports\ExcelImportClass;
use App\Models\Property;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{
    public function index()
    {
        $importedData = Excel::toArray(new ExcelImportClass(), public_path('investment/import/budynek_e.xlsx'));

        $additionalAreaTypes = [
            'TARAS' => 'terrace_area',
            'BALKON' => 'balcony_area'
        ];


//        '1' => 'Mieszkanie / Apartament',
//        '2' => 'Komórka lokatorska',
//        '3' => 'Miejsce parkingowe'

//        '1' => 'Na sprzedaż',
//        '2' => 'Rezerwacja',
//        '3' => 'Sprzedane',
//        '4' => 'Wynajęte'

        foreach ($importedData as &$sheet) {

            foreach($sheet as $key => $row) {

                //if($row['nazwa_powierchni'] == "Mieszkanie"){

                $property = new Property();
                $property['investment_id'] = 1;
                $buildingId = $this->building($row['budynek']);

                // Set building_id in property
                $property->building_id = $buildingId;
                $property->floor_id = $this->floor($row['pietro'], $buildingId);

                if (isset($additionalAreaTypes[$row['powiechrznia_dod']])) {
                    $property->{$additionalAreaTypes[$row['powiechrznia_dod']]} = $row['powiechrznia_dod_m'];
                }

                $property['status'] = $this->status($row['status']);
                $property['name'] = $row['nazwa_powierzchni'] .' '.$row['nr_mieszkania'];
                $property['name_list'] = $row['nazwa_powierzchni'];
                $property['number'] = $row['nr_mieszkania'];
                $property['number_order'] = $key + 1;

                $property['rooms'] = $row['pokoje'];
                $property['area'] = $row['metraz'];

                if(isset($row['cena_brutto'])) {
                    $property['price'] = round(floatval($row['cena_brutto']) / 1.23);
                }

                if(isset($row['cena_brutto'])) {
                    $property['price_brutto'] = $row['cena_brutto'];
                }

                if(isset($row['cena_promocyjna'])){
                    $property['price_promotion'] = $row['cena_promocyjna'];

                    if (is_numeric($row['cena_promocyjna']) && $row['cena_promocyjna'] > 0) {
                        $property['specialoffer'] = 1;
                    } else {
                        $property['specialoffer'] = 0;
                    }
                }

                if(isset($row['cena_30_dni'])) {
                    $property['price_30'] = $row['cena_30_dni'];
                }

                if(isset($row['widok_360'])) {
                    $property['view_360'] = $row['widok_360'];
                }
                if(isset($row['spacer_3d'])) {
                    $property['view_3d'] = $row['spacer_3d'];
                }

                $property['type'] = 1;
                $property['active'] = 1;
//
                //echo '<pre>';
                //print_r($property->toArray());
                //echo '</pre>';

                $property->save();
                //}
            }
        }

        //return view('admin.developro.import.index', ['importedData' => $importedData[0]]);
    }

    public function building($building) {
        if (isset($building)) {
            switch ($building) {
                case 'D':
                    return 1;
                case 'E':
                    return 2;
                default:
                    return 0; // Return 0 for unknown buildings
            }
        }
        return 0; // Return 0 if building is not set
    }

    public function status($status) {
        if (isset($status)) {
            switch ($status) {
                case 'Sprzedane':
                    return 3;
                default:
                    return 1; // Return 0 for unknown buildings
            }
        }
        return 1; // Return 0 if building is not set
    }

    public function floor($pietro, $buildingId) {
//        if ($buildingId == 1) { // Budynek B1
            switch ($pietro) {
                case '0':
                    return 7; // Parter in B1
                case '1':
                    return 8; // Piętro 1 in B1
                case '2':
                    return 9; // Piętro 2 in B1
                case '3':
                    return 10; // Piętro 2 in B1
                case '4':
                    return 11; // Piętro 2 in B1
                case '5':
                    return 12; // Piętro 2 in B1
                default:
                    return 0; // Default if floor is unknown
            }
//        } elseif ($buildingId == 2) { // Budynek B2
//            switch ($pietro) {
//                case 'parter':
//                    return 4; // Parter in B2
//                case 'I':
//                    return 5; // Piętro 1 in B2
//                case 'II':
//                    return 6; // Piętro 2 in B2
//                default:
//                    return 0; // Default if floor is unknown
//            }
//        }

//        return 0; // Return 0 if buildingId is not recognized
    }
}

//Budynek B1 - ID: 1
//Parter - ID: 1
//Piętro 1 - ID: 2
//Piętro 2 - ID: 3

//Budynek B2 - ID: 2
//Parter - ID: 4
//Piętro 1 - ID: 5
//Piętro 2 - ID: 6