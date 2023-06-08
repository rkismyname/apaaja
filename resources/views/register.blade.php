<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Juragan Sertifikasi Indonesia</title>
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap') }}"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}" />
    <script src="{{ asset('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js') }}" defer></script>
    <script src="{{ asset('./assets/js/init-alpine.js') }}"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="../assets/img/jsi1.jpg" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="../assets/img/jsi1.jpg" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Buat Akun
                        </h1>
                        <form method="POST" action="{{ route('register') }}" class="my-10">
                            @csrf
                            <label for="name" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nama User</span>
                                <input id="name" name="name" type="name"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Mark Ryden" />
                                @error('name')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </label>
                            <label for="email" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input id='email' name="email" type="email"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="example@examplemail.com" />
                                @error('email')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </label>
                            <label for="password" class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input id="password" name="password" type="password"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="***************" />
                                @error('password')
                                    <p class="text-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </label>
                            <label for="password_confirmation" class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Konfirmasi password
                                </span>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="***************" />
                            </label>
                            <button type="submit"
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                                Buat Akun
                            </button>

                            <p class="mt-4">
                                <a class="text-sm font-medium text-yellow-600 dark:text-yellow-400 hover:underline"
                                    href="/">
                                    Login dengan akun yang sudah ada
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
