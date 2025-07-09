<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('published_at', 'desc')->paginate(10); // paginate 10 per page
        return view('reports.index', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.show', compact('report'));
    }
}
