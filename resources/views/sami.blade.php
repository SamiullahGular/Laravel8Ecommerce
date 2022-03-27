
<style>
    nav svg{
        height: 20px;
    }
</style>
<ul>
    @php $i = 1 @endphp
    @foreach($products as $product)
        <li>{{ $i }}-{{ $product->name }}</li>
        @php $i++ @endphp
    @endforeach
</ul>
{{$products->links()}}

