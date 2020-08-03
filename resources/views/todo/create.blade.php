@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm md:max-w-lg">
                <div 
                    class="flex flex-col break-words bg-gray-300 border border-2 rounded shadow-md mb-10"
                >

                    <form 
                        class="w-full p-6" 
                        method="POST" 
                        action="{{ route('todo.store') }}"
                        enctype="multipart/form-data" 
                    >
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            
                            {{-- name --}}
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Name') }}:
                            </label>

                            <input id="name" type="text" 
                                class="form-input w-full mb-4 
                                @error('name')  border-red-500 @enderror" name="name" 
                                value="{{ old('name') }}" required autocomplete="name" autofocus
                            >


                            @error('name')
                                <p class="text-red-500 text-xs italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            {{-- message --}}
                             <label for="message" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Message') }}:
                            </label>

                            <input id="message" type="text" 
                                class="form-input w-full mb-4 
                                @error('message')  border-red-500 @enderror" name="message" 
                                value="{{ old('message') }}" required autocomplete="message" autofocus
                            >

                            @error('message')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            {{-- details --}}
                            <label for="details" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Details (Optional)') }}:
                            </label>

                            <textarea id="details" rows="10" 
                             class="form-input w-full mb-4 p-0
                            @error('details')  border-red-500 @enderror" name="details" value="{{ old('details') }}" autocomplete="details" autofocus>
                            </textarea>

                            @error('details')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-900">
                                {{ __('Create Todo') }}
                            </button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
