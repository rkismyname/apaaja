@extends('layouts.main')

@section('content')
    <div class="container grid px-6 mx-auto">
        <div class="w-full overflow-x-auto mt-4">
            <form action="{{ route('profile.update', $user->id) }}" method="POST"
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="name">
                        Nama Lengkap
                    </label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 dark:text-gray-200" for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" disabled>
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    
                </div>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Profile
            </button>
        </div>
        </form>
    </div>
    </div>
@endsection
