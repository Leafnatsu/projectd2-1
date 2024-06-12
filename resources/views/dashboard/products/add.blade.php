@extends('layouts.admin')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">
                    สินค้า/
                </span>
                เพิ่มสินค้า
            </h4>

            <!-- Form -->
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-auto">
                        <div class="card">
                            <div class="card-body demo-vertical-spacing demo-only-element">

                                <form action="{{ route('dashboard.product.insert') }}" method="post"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="mb-3">
                                        <label for="productName" class="form-label">
                                            ชื่อสินค้า
                                            @error('product_name')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('product_name') ? 'is-invalid' : null }}"
                                            id="productName" name="product_name" placeholder="ชื่อสินค้า" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="productPrice" class="form-label">
                                            ราคา
                                            @error('product_price')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                        <input type="number"
                                            class="form-control {{ $errors->has('product_price') ? 'is-invalid' : null }}"
                                            id="productPrice" name="product_price" placeholder="ราคา" pattern="[0-9]*"
                                            min="0" max="99999999" onkeypress="validate(event)" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="categoryId" class="form-label">
                                            ประเภทสินค้า
                                            @error('product_category')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                        <select
                                            class="form-select {{ $errors->has('product_category') ? 'is-invalid' : null }}"
                                            id="categoryId" name="product_category">
                                            <option value="" selected>
                                                ==== โปรดเลือกประเภทสินค้า ====
                                            </option>
                                            @foreach ($category as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ProductImage" class="form-label">
                                            รูปสินค้า
                                            @error('product_image')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                        <input
                                            class="form-control {{ $errors->has('product_image') ? 'is-invalid' : null }}"
                                            type="file" name="product_image" id="ProductImage" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="ProductDetail" class="form-label">
                                            รายละเอียดสินค้า
                                            @error('product_detail')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                        <textarea class="form-control {{ $errors->has('product_detail') ? 'is-invalid' : null }}" id="ProductDetail"
                                            name="product_detail" placeholder="รายละเอียด" rows="0"></textarea>
                                    </div>

                                    <div class="mb-0 mt-3 text-center">
                                        <button class="btn btn-success">
                                            บันทึกข้อมูล
                                        </button>
                                        <a href="{{ route('dashboard.product.index') }}" class="btn btn-secondary">
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
