<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use DOMDocument;
use DOMXPath;

class ProgramesController extends BaseController
{
    public function programes()
    {
        echo view("programes");
    }
    
    
    public function fcfPrimerEquip()
    {
    $url = 'https://www.fcf.cat/classificacio/2425/futbol-11/segona-catalana/grup-5';

    function filterCellsByClass($cells, $classToAvoid) {
        $filteredCells = [];

        foreach ($cells as $cell) {
            $classAttribute = $cell->getAttribute('class');
            if (strpos($classAttribute, $classToAvoid) === false) {
                $filteredCells[] = $cell;
            }
        }

        return $filteredCells;
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $html = curl_exec($ch);
    curl_close($ch);

    $dom = new \DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new \DOMXPath($dom);
    $table = $xpath->query("//table[contains(@class, 'fcftable-e')]")->item(0);

    $clasificacio = [];

    if ($table) {
        foreach ($table->getElementsByTagName('tr') as $index => $row) {
            if ($index === 0 || $index === 1) {
                continue;
            }

            $cells = $row->getElementsByTagName('td');
            $cells = filterCellsByClass($cells, 'detallada');

            if (count($cells) > 0) {
                $logoImg = $cells[1]->getElementsByTagName('img')->item(0);
                $logo = $logoImg ? $logoImg->getAttribute('src') : null;

                $clasificacio[] = [
                    'posicio' => trim($cells[0]->nodeValue),
                    'logo' => $logo,
                    'equip' => trim($cells[2]->nodeValue),
                    'punts' => trim($cells[3]->nodeValue),
                    'pj' => trim($cells[6]->nodeValue),
                    'pg' => trim($cells[7]->nodeValue),
                    'pe' => trim($cells[8]->nodeValue),
                    'pp' => trim($cells[9]->nodeValue),
                    'gf' => trim($cells[10]->nodeValue),
                    'gc' => trim($cells[11]->nodeValue),
                ];
            }
        }
    }
        return view('programes/fcfPrimerEquip', ['clasificacio' => $clasificacio]);
    }

}