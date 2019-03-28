<?php
include './includes/settings.php';
include 'includes/library/PDFMerger/PDFMerger.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$pdf = new PDFMerger;

$pdf->addPDF(FILE_PATH.'uploads/41800070.pdf'); // with links
$pdf->addPDF(FILE_PATH.'uploads/41800070_tmp.pdf');

$pdf->merge('file', FILE_PATH.'uploads/new.pdf'); // generate the file
$pdf->merge('download', FILE_PATH.'uploads/new1.pdf'); // force download 