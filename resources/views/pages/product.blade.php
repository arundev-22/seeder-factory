@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <table class="table text-center align-middle mt-4">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>        
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </table>
        <div class="pagination justify-content-center align-item-center">
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
