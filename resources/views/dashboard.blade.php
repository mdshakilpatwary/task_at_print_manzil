<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Merchant Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div>
                        @if(session('success'))
                        <p class="alert alert-success">{{ session('success')}}</p>
                        @elseif(session('error'))
                            <p class="alert alert-error">{{ session('error')}}</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table">
                                <thead>

                                    <tr>
                                        <th>serial no</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Store Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @if(count($products) > 0)
                                    @php
                                     $sl = 1;
                                    @endphp
                                    @foreach ($products as $product)
                                    <tr>
                                       <td>{{$sl++}}</td> 
                                       <td>{{$product->name}}</td> 
                                       <td>{{$product->category->category_name}}</td> 
                                       <td>{{$product->store->store_name}}</td> 
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>

                                        <td colspan="4"><p class="text-center">no data found</p></td>
                                    </tr>
                                    @endif
                                </tbody>
                                
                            </table>
                        </div>
                        <div class="col-md-4">
                            <h1>Product Add</h1>
                            <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group pt-2 pb-2">
                                    <label for="select_category">Select Category Name</label>
                                    <select name="select_category" id="" class="form-control select-form">
                                      <option value="" class="disable selected">---Select Category</option>
                                      @foreach($categories as $category)
                                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                    
                                      @endforeach
                                    </select>
                                    @error('select_category')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group pb-2">
                                    <label for="select_category">Select Store Name</label>
                                    <select name="select_store" id="" class="form-control select-form">
                                      <option value="" class="disable selected">---Select Store</option>
                                      @foreach($stores as $store)
                                      <option value="{{$store->id}}">{{$store->store_name}}</option>
                    
                                      @endforeach
                                    </select>
                                    @error('select_store')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group pb-3 pt-2">
                                    <label for="cat_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="">
                                    @error('product_name')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <button class="btn btn-lg btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
