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
        // URL de la página
        $url = 'https://www.fcf.cat/classificacio/2425/futbol-11/segona-catalana/grup-5';


        function filterCellsByClass($cells, $classToAvoid) {
            $filteredCells = [];

            foreach ($cells as $cell) {
                $classAttribute = $cell->getAttribute('class');
            
                // Si no contiene 'classToAvoid', lo agregamos al resultado
                if (strpos($classAttribute, $classToAvoid) === false) {
                    $filteredCells[] = $cell;
                }
            }

            return $filteredCells;
        }


        // Inicializamos cURL
        $ch = curl_init();

        // Establecemos la URL y algunas opciones de cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // Deshabilitar la verificación SSL (si es necesario)

        // Ejecutamos la petición
        $html = curl_exec($ch);

        // Cerramos cURL
        curl_close($ch);

        // Cargar el HTML en DOMDocument
        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        // Buscamos la tabla por la clase "fcftable-e"
        $xpath = new DOMXPath($dom);
        $table = $xpath->query("//table[contains(@class, 'fcftable-e')]")->item(0);

        // Si encontramos la tabla, procesamos sus filas
        if ($table) {
            echo "<table border='1'>";
            echo "<tr><th>Posición</th><th>Logo</th><th>Equipo</th><th>Puntos</th><th>PJ</th><th>PG</th><th>PE</th><th>PP</th><th>GF</th><th>GC</th></tr>";

            // Iteramos sobre las filas de la tabla (saltamos la cabecera)
            foreach ($table->getElementsByTagName('tr') as $index => $row) {
                if ($index === 0 || $index===1) {
                    // Saltamos la primera fila (cabecera)
                    continue;
                }

                $cells = $row->getElementsByTagName('td');

                $cells = filterCellsByClass($cells, 'detallada');

                // if ($cells->length > 0) {
                if (count($cells) > 0) {
                    echo "<tr>";
                
                    // Posición
                    $position = $cells[0]->nodeValue;
                    echo "<td>" . trim($position) . "</td>";
                
                    // Logo (si existe una imagen en la celda)
                    $logoCell = $cells[1];
                    $logoImg = $logoCell->getElementsByTagName('img')->item(0);
                    if ($logoImg) {
                        $logo = $logoImg->getAttribute('src');
                        echo "<td><img src='" . $logo . "' width='30' height='30'></td>";
                    } else {
                        // Si no hay logo, dejamos la celda vacía o mostramos un texto
                        echo "<td>No Logo</td>";
                    }

                    // Nombre del equipo
                    $teamName = $cells[2]->nodeValue;
                    echo "<td>" . trim($teamName) . "</td>";
                
                    // Puntos
                    $points = $cells[3]->nodeValue;
                    echo "<td>" . trim($points) . "</td>";
                
                    // Partits jugats (PJ)
                    $gamesPlayed = $cells[6]->nodeValue;
                    echo "<td>" . trim($gamesPlayed) . "</td>";
                
                    // Patits guanyats (PG)
                    $gamesFor = $cells[7]->nodeValue;
                    echo "<td>" . trim($gamesFor) . "</td>";
                
                    // Partits empatats (PE)
                    $gamesDrawn = $cells[8]->nodeValue;
                    echo "<td>" . trim($gamesDrawn) . "</td>";

                    // Partits perduts (PP)
                    $gamesLost = $cells[9]->nodeValue;
                    echo "<td>" . trim($gamesLost) . "</td>";
                
                    // Gols a favor (GF)
                    $goalsFor = $cells[10]->nodeValue;
                    echo "<td>" . trim($goalsFor) . "</td>";
                
                    // Gols contra (GC)
                    $goalsAgainst = $cells[11]->nodeValue;
                    echo "<td>" . trim($goalsAgainst) . "</td>";

                    echo "</tr>";
                }
            }
            echo "</table>";
        } else {
            echo "No se encontró la tabla de clasificación.";
        }
    }
}