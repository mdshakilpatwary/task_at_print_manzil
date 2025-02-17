<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin Dashboard</title>
</head>
<body>
    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </button>

    <div class="p-4">
        <h2>Admin Dashboard</h2>
        <div class="row pt-3">
            <div class="offset-md-2 col-md-8">
                <table class="table">
                    <thead>

                        <tr>
                            <th>serial no</th>
                            <th>Merchant Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if(count($users) > 0)
                        @php
                         $sl = 1;
                        @endphp
                        @foreach ($users as $user)
                        <tr>
                           <td>{{$sl++}}</td> 
                           <td>{{$user->name}}</td> 
                           <td>{{$user->email}}</td> 
                        </tr>
                        @endforeach
                        @else
                        <tr>

                            <td colspan="3"><p class="text-center">no data found</p></td>
                        </tr>
                        @endif
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>