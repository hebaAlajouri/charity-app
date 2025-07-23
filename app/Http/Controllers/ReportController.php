<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
  public function index()
{
    $reports = Report::orderBy('published_at', 'desc')->paginate(10);

    // Translate fields based on locale
    $locale = app()->getLocale();

    $reports->transform(function ($report) use ($locale) {
        if ($locale === 'en') {
            $report->title = $report->title_en ?? $report->title;
            $report->category = $report->category_en ?? $report->category;
            $report->description = $report->description_en ?? $report->description;
        }
        return $report;
    });

    // Get the first report (if exists)
    $firstReport = $reports->first();

    return view('reports.index', compact('reports', 'firstReport'));
}



    public function show($id)
    {
        $report = Report::findOrFail($id);

        $locale = app()->getLocale();

        if ($locale === 'en') {
            $report->title = $report->title_en ?? $report->title;
            $report->category = $report->category_en ?? $report->category;
            $report->description = $report->description_en ?? $report->description;
        }

        return view('reports.show', ['report' => $report]);
    }
}
