<?php

class ExcelHelper
{
    public static function getTable($file)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/protected/components/PHPExcel.php';

        $inputFileType = PHPExcel_IOFactory::identify($file);

        $objReader = PHPExcel_IOFactory::createReader($inputFileType);

        $objPHPExcel = $objReader->load($file);

        $array = $objPHPExcel->getActiveSheet()->toArray();

        for ($i = 0, $count_array = count($array); $i < $count_array; $i++) {
            for ($j = 0, $count_sub = count($array[$i]); $j < $count_sub; $j++) {
                if (!$array[$i][$j]) {
                    unset($array[$i][$j]);
                }
            }
            $array[$i] = array_values($array[$i]);
            if (!$array[$i]) {
                unset($array[$i]);
            }
        }

        $array = array_values($array);

        $table = '';
        $first = true;
        $th = true;
        $colspan = count($array[1]);
        for ($i = 0, $count_array = count($array); $i < $count_array; $i++) {
            if (1 == count($array[$i])) {
                $th = true;
            }
            if ($th) {
                if (!$first) {
                    $table .= '</table>';
                }
                $table .= '<table class="prod-bottom__table">';
            }
            $table .= '<tr>';
            for ($j = 0, $count_item = count($array[$i]); $j < $count_item; $j++) {
                $break = false;
                if ($th) {
                    $table .= '<th';
                    if (!$first) {
                        $table .= ' colspan="' . $colspan . '"';
                    } elseif (2 == $j) {
                        $table .= ' colspan="' . ($colspan - 2) . '"';
                        $break = true;
                    } elseif ($first) {
                        $table .= ' colspan="' . $colspan . '"';
                    }
                    $table .= '>' . $array[$i][$j] . '</th>';
                } else {
                    $table .= '<td>' . $array[$i][$j] . '</td>';
                }
                if ($break) {
                    $j = $count_item;
                }
            }
            $table .= '</tr>';
            $first = false;
            $th = false;
        }
        $table .= '</table>';

        return $table;
    }
}
