<?php

namespace App\Http\Controllers;

use App\Ai\Agents\ResumeAnalyzer;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class ResumeAnalyzerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('resume-analyzer.index');
        }
    
        /**
         * Clean the text extracted from the PDF.
         */
        private function cleanPdfText(string $text): string
        {
            // Example cleaning logic: remove extra spaces and newlines
            $cleanedText = preg_replace('/\s+/', ' ', $text);
            return trim($cleanedText);
        }



    public function analyze(Request $request){
        $request->validate([
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
            'job_description' => ['nullable', 'string', 'max:10000'],
        ]);

        $file = $request->file('resume');

        $parser = new Parser();
        $pdf = $parser->parseFile($file->getPathname());
        $resumeText = $this->cleanPdfText($pdf->getText());

       //  print_r(strlen($resumeText));
//exit;
        if(strlen($resumeText) > 1500){
            return back()->withErrors(['resume' => 'The resume is too long to process. Please upload a shorter resume.']);
        }

        $resumeText = str($resumeText)->limit(180000); // Limit to 1000 characters for processing
        $jobDescription = $request->input('job_description');

        $prompt =  <<<PROMPT
        Analyze this resume.

    Resume text:
    {$resumeText}

    Job description:
    {$jobDescription}

    Give Practical feedback for improving this Resume.
    PROMPT;

        // Here you would call your AI service to analyze the resume using the $prompt
        // For example:
        // $analysis = $this->aiService->analyzeResume($prompt);

        // For demonstration, we'll just return the prompt as the analysis result
        $analysis = (new ResumeAnalyzer)->prompt($prompt);

        return view('resume-analyzer.result', ['analysis' => $analysis]);


    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
