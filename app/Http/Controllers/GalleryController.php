<?php 
namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;

class GalleryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::with('galleries.images')->get();
        return view('galleries.index', compact('categories'));
    }

    public function show(Gallery $gallery)
    {
        $gallery->load('images');
        return view('galleries.show', compact('gallery'));
    }
}

