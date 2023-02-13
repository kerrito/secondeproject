<?php
include_once "../config.php";

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

if ($_SESSION['login'] != "true") {
    header("location:../index.php");
    exit;
}
$email = $_SESSION['email'];
$chkid = "SELECT * FROM `signup` WHERE `email`='$email'";
$chkres = mysqli_query($con, $chkid);
if (mysqli_num_rows($chkres) > 0) {
    $chkresult = mysqli_fetch_assoc($chkres);
    $userrol = $chkresult['user_rol'];
    if ($userrol != 2 && $userrol != 3) {
        header("location:../index.php");
        exit;
    }
}


if (isset($_POST['record_btn'])) {

    $file_type = $_POST['file_type'];
    $filename="Order_details";

    $sql = "SELECT * FROM `order`";

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Product_ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Number');
        $sheet->setCellValue('F1', 'Address');
        $sheet->setCellValue('G1', 'City');
        $sheet->setCellValue('H1', 'Country');
        $sheet->setCellValue('I1', 'Payment Method');
        $sheet->setCellValue('J1', 'Amount');
        $sheet->setCellValue('K1', 'Process');
        $sheet->setCellValue('L1', 'Tracking_id');
        $sheet->setCellValue('M1', 'Account_user_Email');
        $sheet->setCellValue('N1', 'Reason');
        $sheet->setCellValue('O1', 'Request Time');
        $iterate = 2;

        foreach ($res as $value) {

            $sheet->setCellValue('A' . $iterate, $value['id']);
            $sheet->setCellValue('B' . $iterate, $value['product_id']);
            $sheet->setCellValue('C' . $iterate, $value['name']);
            $sheet->setCellValue('D' . $iterate, $value['email']);
            $sheet->setCellValue('E' . $iterate, $value['number']);
            $sheet->setCellValue('F' . $iterate, $value['address']);
            $sheet->setCellValue('G' . $iterate, $value['city']);
            $sheet->setCellValue('H' . $iterate, $value['country']);
            $sheet->setCellValue('I' . $iterate, $value['payment'] == 0 ? "Payment on delivery" : "Payment by card");
            $sheet->setCellValue('J' . $iterate, $value['price']);
            $sheet->setCellValue('K' . $iterate, $value['state']);
            $sheet->setCellValue('L' . $iterate, $value['tracking_id']);
            $sheet->setCellValue('M' . $iterate, $value['user_email']);
            $time = "";
            if (!empty($value['reason']) && $value['reason'] != null && $value['reason'] != "") {

                $sheet->setCellValue('N' . $iterate, $value['reason']);

                $start = $value['remainning_time'];
                $end = strtotime("now");
                $reminning = round(($end - $start) / 60);
                if ($reminning < 60) {
                    $GLOBALS['time'] = $reminning . " mins ago";
                } else if ($reminning > 60 && $reminning < (60 * 24)) {
                    $ti = round($reminning / 60);
                    $GLOBALS['time'] = $ti . " hours ago";
                } else if ($reminning > (60 * 24) && $reminning < (60 * 24 * 30)) {
                    $ti = round(($reminning / 60) / 24);
                    $GLOBALS['time'] = $ti . " days ago";
                } else if ($reminning > (60 * 24 * 30) && $reminning < (60 * 24 * 30 * 12)) {
                    $ti = round((($reminning / 60) / 24) / 30);
                    $GLOBALS['time'] = $ti . " months ago";
                } else if ($reminning > (60 * 24 * 30 * 12)) {
                    $ti = round(((($reminning / 60) / 24) / 30) / 12);
                    $GLOBALS['time'] = $ti . " years ago";
                }
                $sheet->setCellValue('O' . $iterate, $GLOBALS['time']);
            } else {

                $sheet->setCellValue('N' . $iterate, "-");
                $sheet->setCellValue('O' . $iterate, "-");
            }
        }
        if ($file_type == "xlsx") {

            $writer = new Xlsx($spreadsheet);
            $filename=$filename.".xlsx";
        }
        else if ($file_type == "xls") {
    
            $writer = new Xls($spreadsheet);
            $filename=$filename.".xls";
        }
        else if ($file_tyoe = "csv") {
            $writer = new Csv($spreadsheet);
            $filename=$filename.".csv";
        }
        header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attactment; filename="'.urlencode($filename).'"');
        // $writer->save($filename);
        $writer->save("php://output");
    }else{
        $_SESSION['error']=19;
        header("location:order.php");
        exit;
    }
    
}
