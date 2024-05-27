<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Laravel 11 CRUD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Laravel 11 CRUD</h3>
    </div>

    <div class="container mt-4">
        <!-- Flash message -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>

        <!-- Create Button -->
        <div class="row justify-content-end mb-4">
            <div class="col-md-10 text-end">
                <a href="{{ route('products.create') }}" class="btn btn-dark">Create</a>
            </div>
        </div>

        <!-- Products Listing -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-md">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Products</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($show as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        @if(empty($product->description))
                                        N/A
                                        @else
                                        {{ $product->description }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->image)
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                                        @else
                                        N/A
                                        @endif
                                      
                                    </td>
                                    <td>
                                        <a href="{{route('products.edit',$product->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="{{ route('products.delete', $product->id) }}" onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash-alt" style="color: #f21818;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12TL+aNkjo41rXA+QmvFoE5xZl5HbIUMvI5jZhNkka+N3xG9" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("div.alert-success").fadeOut(2000);
        });
    </script>
</body>

</html>
