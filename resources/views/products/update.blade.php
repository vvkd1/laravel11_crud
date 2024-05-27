<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel 11 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Laravel 11 CRUD</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8 text-end">
                <!-- Back button can be added here if needed -->
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Update Product</h3>
                    </div>
                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Enter product name">
                                @error('name')
                                <small class="text-danger"><strong>{{ $message }}</strong></small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" value="{{ $product->sku }}" placeholder="Enter SKU">
                                @error('sku')
                                <small class="text-danger"><strong>{{ $message }}</strong></small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" placeholder="Enter price">
                                @error('price')
                                <small class="text-danger"><strong>{{ $message }}</strong></small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" cols="30" rows="3" placeholder="Enter product description">{{ $product->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                @if($product->image)
                                    <div class="mb-2">
                                        <img id="currentImage" src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="150">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                                @error('image')
                                <small class="text-danger"><strong>{{ $message }}</strong></small>
                                @enderror
                                <!-- Hidden field to hold the current image URL -->
                                <input type="hidden" name="current_image" value="{{ $product->image }}">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('currentImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
