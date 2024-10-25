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

                <li class="breadcrumb-item active">Books</li>
            </ol>
        </nav>

        <!--/ Draggable Cards -->

        <div class="col-xl-12">
            <!-- HTML5 Inputs -->
            <div class="card mb-4">
                <h5 class="card-header text-primary">+ New Book</h5>
                <div class="menu-divider mb-4"></div>
                <div class="card-body mt-0">
                    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="title">Title</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="title" class="form-control"
                                    placeholder="Title" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleFormControlTextarea1"
                                class="col-sm-2 col-form-label text-sm-end">Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control editor" id="editor" name="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="publisher">Publisher</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="publisher" class="form-control"
                                    placeholder="Publisher" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="language">Language</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="language" class="form-control"
                                    placeholder="Language" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="OrderNo">Order No</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="orderNo" class="form-control"
                                    placeholder="admin.book.columns.orderNo" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="#" class="col-sm-2 col-form-label text-sm-end">Available Status</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="status" id="exampleFormControlSelect1">
                                    <option value="">Select status</option>
                                    @foreach ($statuses as $key => $val)
                                        <option value='{{ $key }}'>
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
                                    placeholder="0.0" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="online Amount">Online Amount</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="online_amount" class="form-control"
                                    placeholder="0.0" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="title">Shipment Charges</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="ship_amount" class="form-control"
                                    placeholder="0.0" />
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">Category</label>
                            <div class="col-sm-8">
                                <select id="defaultSelect" name="category_id" class="form-select">
                                    <option value="">Select author</option>
                                    @foreach ($categories as $id => $category)
                                        <option value="{{ $category->id }}">
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
                                    <option value="">Select author</option>
                                    @foreach ($authors as $id => $name)
                                        <option value="{{ $id }}">
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <!-- Multi  -->
                        {{-- <div class="row mb-3">
                            <label class=" col-sm-2 col-form-label text-sm-end">Multiple</label>
                            <div class="col-sm-8">
                                <div class="dz-default dz-message needsclick dropzone" id="document-dropzone">
                                    <span>
                                        <i class="fa fa-cloud-upload"></i>
                                    </span>
                                    <span>Drop files here or click to upload</span>

                                </div>
                            </div>
                        </div> --}}
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
    {{-- <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script> --}}
    <!-- Vendors JS -->
    {{-- <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->
    {{-- ...Some more scripts... --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
