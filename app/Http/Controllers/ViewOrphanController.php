<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Orphan;

class ViewOrphanController extends Controller
{
 public function show($id)
{
    $orphan = Orphan::with('application')->findOrFail($id);
    return view('orphans.show', compact('orphan'));
}
}
