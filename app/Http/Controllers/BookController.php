<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('booke.index', compact('books', 'categories'));
    }
    public function allindex(Request $request)
    {
        $query = Book::query();

        // إذا تم اختيار فئة معينة
        if ($request->has('categoryId') && $request->categoryId != '') {
            $query->where('categoryId', $request->categoryId);
        }

        $bookes = $query->get();
        $categories = Category::all(); // جلب جميع الفئات لعرضها في الفلتر

        return view('booke.allbook', compact('bookes', 'categories'));
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
        $request->validate([
            'categoryId' => 'required',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'history' => 'required|string',
            'number_page' => 'required|integer',
            'price' => 'required|string',
            'language' => 'required|string',
            'state' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $imageData = base64_encode(file_get_contents($request->file('image')));
            Book::create([
                'categoryId' => $request->categoryId,
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description,
                'history' => $request->history,
                'number_page' => $request->number_page,
                'price' => $request->price,
                'language' => $request->language,
                'state' => $request->state,
                'image' => $imageData,
            ]);
            // dd($imageData);
            return redirect()->route('booke.index')->with('success', 'Book added successfully.');
        } else {
            return redirect()->back()->withErrors(['image' => 'Please upload a valid image.']);
        }
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
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'categoryId' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'history' => 'required|string',
            'number_page' => 'required|integer',
            'price' => 'required|string',
            'language' => 'required|string',
            'state' => 'required|string',
        ]);

        $book->update($request->all());

        return redirect()->route('booke.index')->with('success', 'Book updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('booke.index')->with('success', 'Book deleted successfully.');
    }
}
