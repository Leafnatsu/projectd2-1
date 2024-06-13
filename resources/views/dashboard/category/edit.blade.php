@extends('layouts.admin')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">
                    ประเภทสินค้า/
                </span>
                แก้ไขประเภทสินค้า
            </h4>

            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-auto">
                        <div class="card">
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <form action="{{ route('dashboard.category.update', $category->id) }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <div class="mb-3">
                                        <label for="categoryName" class="form-label">
                                            ชื่อประเภทสินค้า
                                            @error('category_name')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('category_name') ? 'is-invalid' : null }}"
                                            id="categoryName"
                                            name="category_name"
                                            placeholder="ชื่อประเภทสินค้า"
                                            value="{{ $category->name }}"
                                            />
                                    </div>

                                    <div class="mb-0 mt-3 text-center">
                                        <button class="btn btn-primary">
                                            แก้ไขข้อมูล
                                        </button>
                                        <a href="{{ route('dashboard.category.index') }}" class="btn btn-secondary">
                                            ยกเลิก
                                        </a>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Form -->

        </div>
        <!-- ./Content -->

    </div>
@endsection
