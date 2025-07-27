<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'required|string',
        ]);

        $path = $request->file('image')?->store('news', 'public');

        News::create([
            'title' => $request->title,
            'image' => $path,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'تمت إضافة الخبر بنجاح');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'required|string',
        ]);

        $path = $news->image;

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $path = $request->file('image')->store('news', 'public');
        }

        $news->update([
            'title' => $request->title,
            'image' => $path,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'تم تعديل الخبر بنجاح');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'تم حذف الخبر بنجاح');
    }
    public function getLocalizedTitleAttribute()
{
    return app()->getLocale() === 'en' && $this->title_en ? $this->title_en : $this->title;
}

public function getLocalizedContentAttribute()
{
    return app()->getLocale() === 'en' && $this->content_en ? $this->content_en : $this->content;
}

}
