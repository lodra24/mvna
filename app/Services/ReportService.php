<?php

namespace App\Services;

use App\Models\MbtiTypeDetail;
use App\Models\TestResult;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class ReportService
{
    /**
     * PDF raporu oluşturur ve indirir.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\Response
     */
    public function generatePdfReport(TestResult $testResult): Response
    {
        // Raporu göstermek için gereken verileri topla
        $mbtiTypeDetail = MbtiTypeDetail::where('mbti_type', $testResult->mbti_type)->first();
        
        $mbtiType = $testResult->mbti_type;
        
        // PDF dosya adını oluştur
        $fileName = 'MindMetrics_Raporu_' . $mbtiType . '.pdf';
        
        // PDF'i oluştur ve indir
        $pdf = Pdf::loadView('test.report_pdf', compact('mbtiType', 'mbtiTypeDetail', 'testResult'));
        
        return $pdf->download($fileName);
    }
}