<nav class="bg-stone-100 text-stone-700  font-semibold  lg:px-32 fixed top-0 left-0 right-0 z-10 flex items-center justify-center lg:justify-between w-full mx-auto">
            
    <div class="p-4">
        <a href="" class="text-xl tracking-wide"><span class="text-red-600">Library</span><span class="">System</span></a>
        
    </div>

    <div class="hidden absolute bg-white lg:bg-transparent w-full lg:w-auto lg:static top-14 p-4  lg:flex items-center" >
        <a class=" px-4 hover:text-blue-600 " href="/">Home</a>
        <a class=" ml-2 px-4 hover:text-blue-600 " href="{{route('about')}}">About</a>
        
        @if (Route::has('login'))
            <div class="flex flex-col lg:flex-row lg:items-center ml-2 ">
                @auth
                    <div class="mb-4 lg:mb-0">
                        <a href="{{ route('dashboard') }}" class="px-4 p-1 focus:outline focus:outline-2 focus:rounded-sm focus:outline-stone-200 hover:text-blue-600 ">Dashboard</a>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                            <div class="">
                                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class=" flex items-center px-4 py-1.5 focus:outline focus:outline-2 focus:rounded-sm focus:outline-gray-500 hover:text-blue-600 ">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                    <p class=" ml-2  duration-1000" >Logout</p>
                                </a>
                            </div>
                    </form>
            
                @else
                    <div class="mb-4 lg:mb-0 ">
                        <a href="{{ route('login') }}" class=" px-4    focus:outline focus:outline-2 p-1 focus:rounded-sm focus:outline-white hover:text-blue-600">Log in</a>
                    </div>
                    @if (Route::has('register'))
                        <div class=" ">
                            <a href="{{ route('register') }}" class=" px-4  focus:outline focus:outline-2 p-1 focus:rounded-sm focus:bg-stone-100  hover:text-stone-500">Register</a>
                        </div>
                    @endif
                @endauth
            </div>
        @endif
    </div>       
</nav>
