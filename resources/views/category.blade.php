<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Merchant-add category') }}
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
                                <tr>
                                    <th>serial no</th>
                                    <th>Category Name</th>
                                </tr>
                                <tr>
                                    @if(count($categories) > 0)
                                    @php
                                     $sl = 1;
                                    @endphp
                                    @foreach ($categories as $category)
                                    <tr>
                                       <td>{{$sl++}}</td> 
                                       <td>{{$category->category_name}}</td> 
                                    </tr>
                                    @endforeach
                                    @else
                                    <p>no data found</p>
                                    @endif
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <h1>Category Add</h1>
                            <form action="{{route('store.catagory')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group pb-3 pt-2">
                                    <label for="cat_name">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="">
                                    @error('category_name')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <button class="btn btn-lg btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
