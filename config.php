<?php
// This makes it easier to repurpose this app.
$current_year = '2015';
$data_source = 'csv'; // Either 'csv' or 'db'

$conf = array(
    '2015' => array(
        'intro' => 'Cast your predictions for the 67th Primetime Emmy Awards, to be broadcast live Sunday, Sept. 20, on Fox.',
        )
);

function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}
