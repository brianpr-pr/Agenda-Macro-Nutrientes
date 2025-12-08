<x-app-layout>
<div>
    <h1 class="text-5xl mt-2 mb-7">Create New Product</h1>
    <div class="border-2 border-black mb-5">
        <form action="" class="flex flex-col mb-2 mt-4 ms-3">
            <div class="mb-2">
                <label>Calories:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label>Total Fat:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label>Satured Fat:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label>Trans Fat:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label> Cholestero Fat:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label> Polyunsaturated Fat:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label> Carbohydrates:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label> Monounsaturated Fat:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>
            
            <div class="mb-2">
                <label> Fiber:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label> Proteins:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label> Unit Measurement:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>

            <div class="mb-2">
                <label> Product Category:</label>
                <input type="text" name="" id="" class="rounded-md w-16">
            </div>    
            
            <button class="text-white rounded-md border-2 bg-blue-500 w-32 m-auto">Create Product</button>
        </form>
    </div>

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
            <p> Product Category: {{ $product_category[$product->product_category_id-1]->category}} </p>
            
            @if($product->user_id != 0)
                <p> User Id: {{ $product->user_id }} </p>
                <button class="text-white border-2 rounded-md bg-red-500 p-2 m-3">Delete</button>
                <button class="border-2 border-red-500 rounded-md bg-white p-2 m-3">Edit</button>
            @endif
        </div>
     @endforeach
</div>
</x-app-layout>