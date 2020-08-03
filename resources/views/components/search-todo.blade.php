<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->

    <div class="flex items-center justify-center bg-gray-400 mx-10 my-4 bg-gray-400 p-4">
        <form 
            method="get" 
            action="{{ route('todo.search') }}" 
        >
            <input id="q" type="text" class="form-input md:w-64" name="todo" 
             required autocomplete="todo" autofocus placeholder="Search Todo by Name">


            <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-900 hover:bg-white hover:text-blue-900">
                            {{ __('Go') }}
            </button>

             @error('q')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
            @enderror
        </form>
     </div>
</div>