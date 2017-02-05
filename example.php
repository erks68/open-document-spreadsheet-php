<?php

/**
 * This is a a library that offers support for handling spreadsheets in OpenDocument format
 * Copyright (C) 2008-20112 Alexandru Szasz <alexxed@gmail.com>
 * http://code.google.com/p/open-document-spreadsheet-php/
 */
include("OpenDocument_Spreadsheet_Writer.class.php");

$objWriter = new OpenDocument_Spreadsheet_Writer('test.ods');

/**
 * Build a spreadsheet with three sheets, named Sheet 0, Sheet 1, Sheet 2, 5000 rows and 10 columns
 */
$objWriter->addColumnStyle('co1', 50); // column width 50px
$objWriter->addColumnStyle('co2', 550); // column width 450px
$objWriter->startDoc();
for ($s = 0; $s < 3; $s++) {
    $objWriter->startSheet('Sheet ' . $s);
    $objWriter->addColumn('co1');
    $objWriter->addColumn('co2');
    for ($i = 0; $i < 50; $i++) {
        for ($j = 0; $j < 1; $j++) {
            $objWriter->addCell($j, (float) $s . $i . $j . '.25', 'float');
        }
        $objWriter->addCell($j, "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada fringilla justo, non tincidunt ex scelerisque at.", 'string');
        $objWriter->saveRow();
    }
    $objWriter->endSheet();
}
$objWriter->endDoc();
$objWriter->saveOds();
