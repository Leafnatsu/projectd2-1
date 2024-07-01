@extends('layouts.admin')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">
                    ขนาดของสินค้าสินค้า/
                </span>
                แก้ไขขนาดของสินค้า
            </h4>

            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-auto">
                        <div class="card">
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <form action="{{ route('dashboard.size.update', $size->id) }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <div class="mb-3">
                                        <label for="sizeName" class="form-label">
                                            ชื่อขนาดของสินค้า
                                            @error('size_name')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('size_name') ? 'is-invalid' : null }}"
                                            id="sizeName"
                                            name="size_name"
                                            placeholder="ชื่อขนาดของสินค้า"
                                            value="{{ $size->name }}"
                                            />
                                    </div>
                                    <div class="mb-3">
                                        <label for="sizeSize" class="form-label">
                                            ขนาดของสินค้า
                                            @error('size_sizes')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('size_sizes') ? 'is-invalid' : null }}"
                                            id="sizeSize"
                                            name="size_sizes"
                                            placeholder="ขนาดของสินค้า"
                                            value="{{ $size->size }}"
                                            />
                                    </div>
                                    <div class="mb-3">
                                        <label for="sizePrice" class="form-label">
                                            ราคา
                                            @error('size_price')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('size_price') ? 'is-invalid' : null }}"
                                            id="sizeName"
                                            name="size_price"
                                            placeholder="ราคา"
                                            value="{{ $size->price }}"
                                            />
                                    </div>

                                    <div class="mb-0 mt-3 text-center">
                                        <button class="btn btn-primary">
                                            แก้ไขข้อมูล
                                        </button>
                                        <a href="{{ route('dashboard.size.index') }}" class="btn btn-secondary">
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
