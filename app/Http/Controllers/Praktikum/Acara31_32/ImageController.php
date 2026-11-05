<?php

namespace App\Http\Controllers\Praktikum\Acara31_32;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    /** Membuat manager Intervention Image versi 4 menggunakan driver GD. */
    private function manager(): ImageManager
    {
        return new ImageManager(new Driver());
    }

    private function validateImage(Request $request): void
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
    }

    private function saveImage($image, string $filename): string
    {
        $directory = public_path('uploads/acara31_32');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $image->save($directory . DIRECTORY_SEPARATOR . $filename);

        return 'uploads/acara31_32/' . $filename;
    }

    public function resize(Request $request)
    {
        $this->validateImage($request);
        $image = $this->manager()->decode($request->file('photo'))->resize(300, 200);
        $path = $this->saveImage($image, uniqid('resize_', true) . '.jpg');

        return view('acara31_32.acara31.result', ['title' => 'Resize gambar', 'path' => $path]);
    }

    public function crop(Request $request)
    {
        $this->validateImage($request);
        $image = $this->manager()->decode($request->file('photo'))->crop(200, 200, 100, 100);
        $path = $this->saveImage($image, uniqid('crop_', true) . '.jpg');

        return view('acara31_32.acara31.result', ['title' => 'Crop gambar', 'path' => $path]);
    }

    public function watermark(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'watermark' => 'required|image|mimes:png,jpeg,jpg,webp|max:2048',
        ]);
        $manager = $this->manager();
        $image = $manager->decode($request->file('photo'));
        $watermark = $manager->decode($request->file('watermark'));
        $image->place('bottom-right', $watermark, 10, 10);
        $path = $this->saveImage($image, uniqid('watermark_', true) . '.jpg');

        return view('acara31_32.acara31.result', ['title' => 'Watermark gambar', 'path' => $path]);
    }

    public function rotate(Request $request)
    {
        $this->validateImage($request);
        $image = $this->manager()->decode($request->file('photo'))->rotate(45);
        $path = $this->saveImage($image, uniqid('rotate_', true) . '.jpg');

        return view('acara31_32.acara31.result', ['title' => 'Rotate gambar', 'path' => $path]);
    }

    public function format(Request $request)
    {
        $this->validateImage($request);
        $image = $this->manager()->decode($request->file('photo'));
        $path = $this->saveImage($image->toPng(), uniqid('format_', true) . '.png');

        return view('acara31_32.acara31.result', ['title' => 'Konversi format PNG', 'path' => $path]);
    }

    public function showImage(Request $request): Response
    {
        $this->validateImage($request);
        $image = $this->manager()->decode($request->file('photo'));

        return response($image->toJpeg()->toString(), Response::HTTP_OK, [
            'Content-Type' => 'image/jpeg',
        ]);
    }

    public function quality(Request $request)
    {
        $this->validateImage($request);
        $image = $this->manager()->decode($request->file('photo'));
        $path = $this->saveImage($image->toJpeg(quality: 75), uniqid('quality_', true) . '.jpg');

        return view('acara31_32.acara31.result', ['title' => 'JPEG kualitas 75', 'path' => $path]);
    }

    /**
     * Upload gambar, ubah ukurannya menjadi 300x300, lalu simpan.
     */
    public function upload(Request $request)
    {
        // Validasi format gambar dan  ukuran file (2MB).
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil file upload dan buat nama file unik berdasarkan waktu.
        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // Buat ImageManager driver GD.
        $manager = $this->manager();

        // Baca gambar upload dan crop menjadi 300x300.
        $image = $manager->decode($file)->cover(300, 300);

        // Buat folder tujuan jika belum tersedia.
        if (! is_dir(public_path('uploads'))) {
            mkdir(public_path('uploads'), 0755, true);
        }

        // Simpan hasil manipulasi ke dalam folder public/uploads.
        $image->save(public_path('uploads/' . $filename));

        // Kembali ke form dengan pesan sukses.
        return back()->with('success', 'Image uploaded and resized successfully.')
            ->with('filename', $filename);
    }
}
