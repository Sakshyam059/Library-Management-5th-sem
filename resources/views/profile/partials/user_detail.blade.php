<section>
    <header>
        <h2 class="text-lg  font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
    </header>
    <form action="{{route('profile.detail')}}" method="POST" class="flex flex-col ly:my-4 gap-4 lg:flex-row lg:justify-between " enctype="multipart/form-data">
        @csrf
        <div class="w-2/5">
            <img src="{{asset('images/profile/'.$user->user->image)}}" class="bg-gray-100 my-2 w-28 h-28 mx-auto lg:mx-0 lg:w-40 lg:h-40 rounded-full" />
            
            <input type="file" name="image" id="image" 
            class=" block w-11/12 ml-2 my-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 border file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
    
        </div>
        <div class="lg:w-full">
            <div class="grid grid-cols-2 gap-x-4 gap-y-2 mt-5 lg:mt-3 lg:w-full">
                <div>
                    <x-input-label for="firstname" :value="__('First Name')" />
                    <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" value="{{old('firstname', $user->user->firstname)}}" required autofocus autocomplete="firstname" />
                    <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
                </div>
                <div>
                    <x-input-label for="lastname" :value="__('Last Name')" />
                    <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" value="{{old('lastname', $user->user->lastname)}}" required autofocus autocomplete="lastname" />
                    <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                </div>
              
                <div>
                    <x-input-label for="address" :value="__('Address')" />
                    <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" value="{{old('address', $user->user->address)}}" required autofocus autocomplete="address" />
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>
                <div>
                    <x-input-label for="phone" :value="__('Phone No.')" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" value="{{old('phone', $user->user->phone)}}" required autofocus autocomplete="phone" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 my-4 rounded">{{ __('Save') }}</button>
        </div>
        
    </form>
</section>