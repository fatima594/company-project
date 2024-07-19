<?php
namespace App\Http\Controllers;


use App\Models\Blogs;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // عرض قائمة التدوينات
    public function index()
    {
        $blogs = Blogs::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    // عرض نموذج إضافة تدوينة جديدة
    public function create()
    {
        return view('admin.blogs.create');
    }

    // تخزين تدوينة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $blog = new Blogs(); // تأكد من استخدام الاسم الصحيح للنموذج
        $blog->title = $request->title;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $blog->image = basename($imagePath);
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    // عرض نموذج تعديل تدوينة
    public function edit($id)
    {
        $blog = Blogs::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $blog = Blogs::findOrFail($id);
        $blog->title = $request->title;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $blog->image = basename($imagePath);
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'blog updated successfully.');
    }

    // عرض تفاصيل تدوينة
    public function show($id)
    {
        $blog = Blogs::findOrFail($id);
        return view('admin.blogs.show', compact('blog'));
    }

    // حذف تدوينة
    public function destroy($id)
    {
        $blog = Blogs::findOrFail($id);

        if ($blog->image) {
            // تحديد المسار الصحيح للصورة في التخزين
            $imagePath = 'images/' . $blog->image;

            // التحقق من وجود الصورة في التخزين
            if (Storage::exists($imagePath)) {
                // حذف الصورة من التخزين
                Storage::delete($imagePath);
            }
        }

        // حذف سجل المدونة من قاعدة البيانات
        $blog->delete();

        // إعادة التوجيه مع رسالة النجاح
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }

}

