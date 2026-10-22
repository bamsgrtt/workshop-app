<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::all();
        return view("products.product", compact("products"));
    }

    public function create()
    {
        $categories = Category::all();

        return view('acara29.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'brand' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        if (Product::where('slug', $data['slug'])->exists()) {
            $data['slug'] .= '-' . Str::lower(Str::random(6));
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = Str::uuid() . '.' . ($extension === 'png' ? 'png' : 'jpg');
            $path = 'products/' . $filename;

            $manager = new ImageManager(Driver::class);
            $image = $manager->decodePath($file->getRealPath())->cover(800, 800);
            $encoded = $extension === 'png'
                ? $image->encodeUsingFileExtension('png', quality: 90)
                : $image->encodeUsingFileExtension('jpg', quality: 85);

            Storage::disk('public')->put($path, $encoded->toString());
            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }
}
