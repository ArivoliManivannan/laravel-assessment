<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products</title>
</head>
<body>
    <h1>Product List</h1>
    <div style="display: flex; flex-wrap: wrap;">
        @foreach ($products as $product)
            <div style="border: 1px solid #ddd; margin: 10px; padding: 10px; width: 200px;">
                <h2>{{ $product->name }}</h2>
                <p>Price: ${{ $product->price }}</p>
                <form action="{{ route('products.buy', $product->id) }}" method="GET">
                    <button type="submit">Buy Now</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
