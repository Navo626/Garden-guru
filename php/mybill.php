<?php
require_once 'C:\xampp\htdocs\GardenGURU\TCPDF-main\tcpdf.php';
require_once './classes/DbConnector.php';
require_once './classes/report.php';
session_start();
if (isset($_SESSION["orderID"])) {
    $orderID = $_SESSION["orderID"];
}
if (isset($_GET["orderID"])) {
    $orderID = $_GET["orderID"];
}

// extend TCPF with custom functions
class MYPDF extends TCPDF
{
    // Colored table
    public function ColoredTable($header, $data)
    {

        // Colors, line width, and bold font
        $this->SetFillColor(13, 201, 113);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);

        if($data[0][9] == 'rejected'){
            $this->SetTextColor(255,0,0);
            $this->Cell(0, 10, "We are sorry! We can not accept your order at this moment. Please try to place new order.", 0, 1);
        }

        if($data[0][9] == 'success'){
            $this->SetTextColor(0,128,0);
            $this->Cell(0, 10, "We confiremed your order. Your package will be delivered within 2-7 days.", 0, 1);
            $this->SetTextColor(0);
        }
        // Customer details
    
        $this->Cell(0, 10, "Receiver Name: ".$data[0][0], 0, 1);
        $this->Cell(0, 10, "Delivery Address: ".$data[0][3], 0, 1);
        $this->Cell(0, 10, "Nearest City: ".$data[0][8], 0, 1);
        $this->Cell(0, 10, "Telephone Number: ".$data[0][7], 0, 1);
        $this->Ln();
        $this->SetFont('', 'B');

        $this->SetTextColor(255);
        // Header
        $w = array(40, 35, 45); // Adjusted column widths
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
            $total = $row[4] * $row[6];
            $this->Cell($w[0], 6, $row[5], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[4], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row[6], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $total, 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->Cell(0, 10, "Total : " . $data[0][2]."/=", 1, 1, 'C', 0, '', 0);


        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('GardenGuru');
$pdf->SetTitle('View Bill');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "GardenGURU" . ' ', "Order ID - " . $orderID . " \nwww.gardenguru.lk");

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

// add a page
$pdf->AddPage();

// column titles
$header = array('Item', 'Qty', 'Unit Price', 'Total');


// data loading
$data = Report::getBill($orderID);

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+
