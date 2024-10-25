<?php

namespace Modules\Book\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Book\App\Models\Book;
use Modules\Book\App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Book\App\Models\Category;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('book::index');
    }

    public function book()
    {
        $books = Book::all();
        return view('book::content.book', [
            'books' => $books,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::pluck('name', 'id')->toArray();
        $books = Book::all();
        $categories = Category::all();
        $statuses = Book::STATUSES;
        return view('book::content.create-book', [
            'authors' => $authors,
            'books' => $books,
            'statuses' => $statuses,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $book = Book::create($request->all());
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image)
            $book->addMedia($image)->toMediaCollection('images');
        }
        // Redirect back 
        return redirect()->route('book.books')->with('success', 'Book Created successfully!');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('book::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $authors = Author::all();
        $book = Book::find($id);
        $categories = Category::all();
        // $statuses = [
        //     1,
        //     2,
        //     3,
        //     4,
        //     5
        // ];
        $statuses = Book::STATUSES;
        return view('book::content.edit-book', [
            'categories' => $categories,
            'book' => $book,
            'authors' => $authors,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'publisher' => 'nullable|string|max:255',
        //     'language' => 'nullable|string|max:255',
        //     'orderNo' => 'nullable|string|max:255',
        //     'status' => 'required|integer',
        //     'price' => 'nullable|numeric',
        //     'online_amount' => 'nullable|numeric',
        //     'ship_amount' => 'nullable|numeric',
        //     'category' => 'required|integer',
        //     'author' => 'required|integer',
        // ]);

        $books = Book::where('id', $id)->first();

        $books->title = $request->title;
        $books->description = $request->description;
        $books->publisher = $request->publisher;
        $books->language = $request->language;
        $books->orderNo = $request->orderNo;
        $books->status = $request->status;
        $books->price = $request->price;
        $books->online_amount = $request->online_amount;
        $books->ship_amount = $request->ship_amount;
        $books->category_id = $request->category_id;
        $books->author_id = $request->author_id;


        if ($request->hasFile('image')) {

            $books->clearMediaCollection('images'); // all media in the images collection will be deleted

            $books->addMediaFromRequest('image')->toMediaCollection('images');
        }

        $books->save();
        // Redirect back 
        return redirect()->route('book.books')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if ($book) {
            $book->delete();
            return response()->json(['success' => 'Book deleted successfully.']);
        } else {
            return response()->json(['error' => 'Book not found.'], 404);
        }
    }

    // public function storeMedia()
    // {

    //     return view('book::content.create-book');
    // }
}