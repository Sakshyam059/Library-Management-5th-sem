<section>
    <form action="{{route('admin.user_update',$user->id)}}" method="post">
        @csrf
        @if (auth()->user()->usertype=='admin')
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="usertype" :value="__('User Type')" />
            <select name="usertype" id="usertype" class="block w-full mt-1 rounded-md border-gray-300">
              <option value="{{$user->usertype}}" selected>{{$user->usertype}}</option>
              <option value="student">Student</option>
              <option value="admin">Admin</option>
            </select>
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
        
        <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded my-4">Update</button>

        @endif
    </form>
</section>