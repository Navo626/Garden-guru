<?php
require_once 'C:\xampp\htdocs\GardenGURU\TCPDF-main\tcpdf.php';
require_once './classes/DbConnector.php';
require_once './classes/report.php';

use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
$user = null;
$manager = null;
$admin = null;
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
if (isset($_SESSION["manager"])) {
    $manager = $_SESSION["manager"];
}
if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
}

// extend TCPF with custom functions
class MYPDF extends TCPDF
{


    // Colored table
    public function ColoredTable($header, $data)
    {
        // Colors, line width, and bold font
        $this->SetFillColor(13, 201, 113);

        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');

        // Header
        $this->Cell(0, 10, 'Total Sales in GardenGURU', 0, 1);
        $this->SetTextColor(255);
        $w = array(50, 50, 80); // Adjusted column widths

        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();


        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');


        // Data

        $fill = 0;
        foreach ($data as $row) {
            $this->Cell($w[0], 10, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 10, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 10, $row[2], 'LR', 0, 'L', $fill);

            $this->Ln();
            $fill = !$fill;
        }



        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
    public function ColoredTable2($header, $data)
    {
        // Colors, line width, and bold font
        $this->SetFillColor(13, 201, 113);

        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');


        $this->Ln();
        $this->Ln();
        $this->Cell(140, 10, 'Number of Registered Users', 1);
        $this->Cell(40, 10, Report::RegisteredUsers() . " Users", 1);
        $this->Ln();
        $this->Cell(140, 10, 'Number of Recieved Orders', 1);
        $this->Cell(40, 10, Report::totalOrders() . " Orders", 1);
        $this->Ln();
        $this->Cell(140, 10, 'Number of Completed Orders', 1);
        $this->Cell(40, 10, Report::happyCustomers() . " Orders", 1);
        $this->Ln();
        $this->Cell(140, 10, 'Number of Available Items in Shop', 1);
        $this->Cell(40, 10, Report::availableItems() . " Items", 1);
        $this->Ln();
        $this->Cell(140, 10, 'Total Income in GardenGURU', 1);
        $this->Cell(40, 10, "Rs " . Report::totalIncome() . " /=", 1);
        $this->Ln();
        $this->Cell(140, 10, 'Total 5 Star Ratings', 1);
        $this->Cell(40, 10, Report::reviewStarCount(5), 1);
        $this->Ln();
        $this->Cell(140, 10, 'Total 4 Star Ratings', 1);
        $this->Cell(40, 10, Report::reviewStarCount(4), 1);
        $this->Ln();
        $this->Cell(140, 10, 'Total 3 Star Ratings', 1);
        $this->Cell(40, 10, Report::reviewStarCount(3), 1);
        $this->Ln();
        $this->Cell(140, 10, 'Total 2 Star Ratings', 1);
        $this->Cell(40, 10, Report::reviewStarCount(2), 1);
        $this->Ln();
        $this->Cell(140, 10, 'Total 1 Star Ratings', 1);
        $this->Cell(40, 10, Report::reviewStarCount(1), 1);
        $this->Ln();

        // Header
        $this->SetXY(15, 130); //65
        $this->Cell(10, 15, 'Manager Details in GardenGURU', 0, 1);
        $this->SetTextColor(255);
        $w = array(5, 25, 32, 60, 28, 30); // Adjusted column widths

        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();

        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data

        $fill = 0;
        foreach ($data as $row) {
            $this->Cell($w[0], 10, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 10, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 10, $row[2], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 10, $row[3], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 10, $row[4], 'LR', 0, 'L', $fill);
            $this->Cell($w[5], 10, $row[5], 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('GardenGuru');
$pdf->SetTitle('GardenGuru');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "GardenGURU" . ' ', "Overall Report\nwww.gardenguru.lk");

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------


// set font
$pdf->SetFont('helvetica', '', 12);
if ($user != null || $manager != null || $admin != null) {


    $pdf->AddPage();

    // column titles
    $header = array('ID', 'First Name', 'Last Name', 'Email', 'NIC', 'Phone');

    // data loading
    ////////////////////////////////////// $data = $pdf->LoadData('data/table_data_demo.txt');

    try {
        $con = $dbcon->getConnection();
        $query = "SELECT * FROM manager";
        $pstmt = $con->prepare($query);

        $pstmt->execute();

        $myarray = array(); // Initialize an empty array

        while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {

            $myarray[] = array(
                $row['managerID'],
                $row['mFirstName'],
                $row['mLastName'],
                $row['mEmail'],
                $row['mNIC'],
                $row['mPhone'],

            );
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }

    $data = $myarray;

    // print colored table
    $pdf->ColoredTable2($header, $data);
}

$pdf->AddPage();
// Registered Users Pie Chart
$pdf->Write(0, 'A Visual Snapshot of Our Registered Users');

$xc = 80;
$yc = 90;
$r = 50;

$malePercentage = Report::maleUserPercentage();
$male = ($malePercentage / 10) * 36;
$femalePercentage = Report::femaleUserPercentage();


$pdf->SetFillColor(0, 153, 0);
$pdf->PieSector($xc, $yc, $r, 0, $male, 'FD', false, 0,);

$pdf->SetFillColor(153, 255, 153);
$pdf->PieSector($xc, $yc, $r, $male, 360, 'FD', false, 0,);

// $pdf->SetFillColor(255, 0, 0);
// $pdf->PieSector($xc, $yc, $r, 250, 20, 'FD', false, 0, 2);

// write labels
$pdf->SetTextColor(0, 0, 0);
$pdf->Text(140, 60, 'MALE - ' . "$malePercentage" . " %");
$pdf->Text(140, 110, 'FEMALE - ' . "$femalePercentage" . " %");
// $pdf->Text(120, 115, 'RED');

// Recireved Orders Pie chart
$pdf->SetXY(15, 155);
$pdf->Write(0, 'A Visual Snapshot of Our Registered Users');

$xc = 80;
$yc = 220;
$r = 50;

$malePercentage = Report::maleOrderPercentage();
$male = ($malePercentage / 10) * 36;
$femalePercentage = Report::femaleOrderPercentage();


$pdf->SetFillColor(0, 153, 0);
$pdf->PieSector($xc, $yc, $r, 0, $male, 'FD', false, 0,);

$pdf->SetFillColor(153, 255, 153);
$pdf->PieSector($xc, $yc, $r, $male, 360, 'FD', false, 0,);

// $pdf->SetFillColor(255, 0, 0);
// $pdf->PieSector($xc, $yc, $r, 250, 20, 'FD', false, 0, 2);

// write labels
$pdf->SetTextColor(0, 0, 0);
$pdf->Text(140, 200, 'MALE - ' . "$malePercentage" . " %");
$pdf->Text(140, 240, 'FEMALE - ' . "$femalePercentage" . " %");
// $pdf->Text(120, 115, 'RED');

// add a page
$pdf->AddPage();

// column titles
$header = array('Item Name', 'Total Sales', 'Unit Price x Sales = Total');

// data loading
////////////////////////////////////// $data = $pdf->LoadData('data/table_data_demo.txt');

try {
    $con = $dbcon->getConnection();
    $query = "SELECT * FROM shop";
    $pstmt = $con->prepare($query);

    $pstmt->execute();

    $myarray = array(); // Initialize an empty array

    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
        $sales = Report::totalSales($row['ItemId']);
        $unitPrice = $row['ItemPrice'];
        $total = $unitPrice * $sales;
        $myarray[] = array(
            $row['ItemName'],
            $sales,
            $unitPrice . " x " . $sales . " = " . $total,

        );
    }
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

$data = $myarray;



// print colored table
$pdf->ColoredTable($header, $data);



// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+
