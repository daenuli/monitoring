<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadCsvController extends Controller
{
    public function index()
    {
        $csvFileName = "project.csv";
        $csvFile = public_path($csvFileName);
        $data = $this->readCSV($csvFile,array('delimiter' => ';'));
        foreach ($data as $key => $value) {
            $date = str_replace('/', '-', $value[0]);
            $date_result = date('Y-m-d', strtotime($date));
            echo strtotime($date_result).'<br>';
            // echo $date.'<br>';
        }
        // dd($row);
    }
    public function readCSV($csvFile, $array)
    {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
        }
        fclose($file_handle);
        return $line_of_text;
    }
    
}
