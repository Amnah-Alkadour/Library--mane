<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ReadingBook;
use App\Models\User;
use Illuminate\Http\Request;

class ReadingBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ReadingBook::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $reades = $query->with(['user', 'book'])->get();
        $users = User::all();
        $books = Book::all();
        return view('read.index', compact('reades', 'users', 'books'));
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
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'BookingPeriod' => 'required|date',
        ]);
        $existingReservation = ReadingBook::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
            ->first();
        if ($existingReservation) {
            return redirect()->back()->with('error', __('message.relboker'));
        }
        ReadingBook::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'BookingPeriod' => $request->BookingPeriod,
        ]);
        return redirect()->back()->with('success', __('message.successboker'));
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
    public function update(Request $request, ReadingBook $read)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'BookingPeriod' => 'required|date',
        ]);

        $read->update([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'BookingPeriod' => $request->BookingPeriod,
        ]);

        return redirect()->route('read.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReadingBook $read)
    {
        $read->delete();

        return redirect()->route('read.index')->with('success', 'Category deleted successfully.');
    }
}
