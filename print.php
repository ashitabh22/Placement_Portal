<?php
if (isset($_POST['print']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    require("fpdf/fpdf.php");
    $db = new SiteData();
    $sql = "SELECT * FROM all_jobs";
    $res = $db->getData($sql);

    class mypdf extends FPDF
    {
        function header()
        {
            $this->Image('fpdf/logo.jpg', 10, 6);
            $this->SetFont('Arial', 'B', 18);
            $this->Cell(276, 5, 'List of All Available Jobs', 0, 0, 'C');
            $this->Ln(25);
        }

        function footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', '', 8);
            $this->Cell(0, 10, '' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }

        function table()
        {
            $this->SetFont('Times', 'B', '8');
            $this->Cell(10, 10, 'post_id', 1, 0, 'C');
            $this->Cell(17, 10, 'company_id', 1, 0, 'C');
            $this->Cell(20, 10, 'Company', 1, 0, 'C');
            $this->Cell(16, 10, 'job_title', 1, 0, 'C');
            $this->Cell(20, 10, 'job_description', 1, 0, 'C');
            $this->Cell(10, 10, 'CGPA', 1, 0, 'C');
            $this->Cell(12, 10, 'program', 1, 0, 'C');
            $this->Cell(10, 10, 'branch', 1, 0, 'C');
            $this->Cell(18, 10, 'min_package', 1, 0, 'C');
            $this->Cell(12, 10, 'Posts', 1, 0, 'C');
            $this->Cell(24, 10, 'application-period', 1, 0, 'C');
            $this->Cell(16, 10, 'ppt_date', 1, 0, 'C');
            $this->Cell(16, 10, 'test_date', 1, 0, 'C');
            $this->Cell(19, 10, 'interview_date', 1, 0, 'C');
            $this->Cell(22, 10, 'shortlisting_date', 1, 0, 'C');
            $this->Cell(19, 10, 'academic_year', 1, 0, 'C');
            $this->Ln();
        }

        function data_table($res)
        {
            $this->SetFont('Arial', '', 8);
            for ($i = 0; $i < ($res['NO_OF_ITEMS']); $i++) {
                $data = $res['oDATA'][$i];
                $this->Cell(10, 10, $data['post_id'], 1, 0, 'C');
                $this->Cell(17, 10, $data['company_id'], 1, 0, 'C');
                $this->Cell(20, 10, $data['company_name'], 1, 0, 'C');
                $this->Cell(16, 10, $data['job_title'], 1, 0, 'C');
                $this->Cell(20, 10, $data['job_description'], 1, 0, 'C');
                $this->Cell(10, 10, $data['cgpa_requirement'], 1, 0, 'C');
                $this->Cell(12, 10, $data['program'], 1, 0, 'C');
                $this->Cell(10, 10, $data['branch'], 1, 0, 'C');
                $this->Cell(18, 10, $data['min_package_offered'], 1, 0, 'C');
                $this->Cell(12, 10, $data['number_of_posts'], 1, 0, 'C');
                $this->Cell(24, 10, $data['application_period'], 1, 0, 'C');
                $this->Cell(16, 10, $data['ppt_date'], 1, 0, 'C');
                $this->Cell(16, 10, $data['test_date'], 1, 0, 'C');
                $this->Cell(19, 10, $data['interview_date'], 1, 0, 'C');
                $this->Cell(22, 10, $data['shortlisting_date'], 1, 0, 'C');
                $this->Cell(19, 10, $data['academic_year'], 1, 0, 'C');
                $this->Ln();
            }
        }
    }

    $pdf = new mypdf();
    $pdf->AliasnbPages();
    $pdf->AddPage('L', 'A4', '0');
    $pdf->table();
    $pdf->data_table($res);
    $pdf->Output();
}

?>