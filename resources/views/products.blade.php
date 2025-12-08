<x-app-layout>
<div>
    <h1 class="text-5xl">List of Products Avaliable</h1>
     @foreach($products as $product)
        <div class="border-2 border-black rounded-md my-2">
            <p> Id: {{ $product->id }} </p>
            <p> Calories: {{ $product->calories }} </p>
            <p> Total Fat: {{ $product->total_fat }} </p>
            <p> Satured Fat: {{ $product->satured_fat }} </p>
            <p> Trans Fat: {{ $product->trans_fat }} </p>
            <p> Cholestero Fat: {{ $product->cholesterol_fat }} </p>
            <p> Polyunsaturated Fat: {{ $product->polyunsaturated_fat }} </p>
            <p> Carbohydrates: {{ $product->carbohydrates }} </p>
            <p> Monounsaturated Fat: {{ $product->monounsaturated_fat }} </p>
            <p> Fiber: {{ $product->fiber }} </p>
            <p> Proteins: {{ $product->proteins }} </p>
            <p> Unit Measurement: {{ $product->unit_measurement }} </p>
            <p> Product Category: {{ $product->product_category_id }} </p>
            @if($product->user_id != 0)
                <p> User Id: {{ $product->user_id }} </p>
                <button class="border-2 rounded-md bg-red-500 p-2 m-3">Delete</button>
            @endif
        </div>
     @endforeach
</div>
</x-app-layout>