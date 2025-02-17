<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Merchant-add store') }}
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
                                    <th>Store Name</th>
                                </tr>
                                
                                    @if(count($stores) > 0)
                                    @php
                                     $sl = 1;
                                    @endphp
                                    @foreach ($stores as $store)
                                    <tr>
                                       <td>{{$sl++}}</td> 
                                       <td>{{$store->store_name}}</td> 
                                    </tr>
                                    @endforeach
                                    @else
                                    <p>no data found</p>
                                    @endif
                                
                            </table>
                        </div>
                        <div class="col-md-4">
                            <h1>Store Add</h1>
                            <form action="{{route('store.create')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group pb-3 pt-2">
                                    <label for="cat_name">Store Name</label>
                                    <input type="text" name="store_name" class="form-control" id="">
                                    @error('store_name')
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
