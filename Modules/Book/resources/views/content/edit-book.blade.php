@extends('masterlayout.master')

@push('content')
    <!-- Draggable Cards -->
    <div class="row">
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href={{ route('home') }}>Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('book') }}">Book</a>
                </li>

                <li class="breadcrumb-item active">book</li>
            </ol>
        </nav>

        <!--/ Draggable Cards -->

        <div class="col-xl-12">
            <!-- HTML5 Inputs -->
            <div class="card mb-4">
                <h5 class="card-header text-primary">Edit book</h5>
                <div class="menu-divider mb-4"></div>
                <div class="card-body mt-0">
                    <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data"'>
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="title">Title</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" class="form-control" name="title" placeholder="Title"
                                    value="{{ old('title', $book->title) }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleFormControlTextarea1"
                                class="col-sm-2 col-form-label text-sm-end">Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control editor" name="description" id="editor" rows="3">{{ old('description', $book->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="publish">Publisher</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="publisher" class="form-control"
                                    value="{{ old('publisher', $book->publisher) }}" placeholder="Publisher" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="language">Language</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="language" class="form-control"
                                    value="{{ old('language', $book->language) }}" placeholder="Language" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="Order No">Order No</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="orderNo" class="form-control"
                                    value="{{ old('orderNo', $book->orderNo) }}" placeholder="admin.book.columns.orderNo" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="#" class="col-sm-2 col-form-label text-sm-end">Available Status</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="status" id="exampleFormControlSelect1">
                                    <option>Select Status</option>
                                    @foreach ($statuses as $key => $val)
                                        <option value="{{ $key }}"
                                            {{ old('status', $book->status) == $key ? 'selected' : '' }}>
                                            {{ $val }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="price">Price</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="price" class="form-control"
                                    value="{{ old('price', $book->price) }}" placeholder="0.0" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="online payment">Online Amount</label>
                            <div class="col-sm-8">
                                <input type="text" id="online_payment" name="online_amount" class="form-control"
                                    value="{{ old('online_amount', $book->online_amount) }}" placeholder="0.0" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="shipment charges">Shipment
                                Charges</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" class="form-control" name="ship_amount"
                                    value="{{ old('ship_amount', $book->ship_amount) }}" placeholder="0.0" />
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">Category</label>
                            <div class="col-sm-8">
                                <select id="defaultSelect" name="category_id" class="form-select">
                                    <option>Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">Author</label>
                            <div class="col-sm-8">
                                <select id="defaultSelect" name="author_id" class="form-select">
                                    <option>Seletc author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="gallery">Image</label>
                            <div class="col-sm-8">
                                @if ($book->media->isNotEmpty())
                                    @foreach ($book->media as $media)
                                        <img src="{{ $media->getUrl() }}" class="image-fluid" alt="Image Book">
                                    @endforeach
                                @else
                                    <p>No images found.</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="gallery">Gallery</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="file" name="image[]" id="image_id" multiple>
                            </div>
                        </div>
                        <!-- Multi  -->
                        <div class="row mb-3">
                            <div class="col-mt-4">
                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script src="{{ asset('assets/editors/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
