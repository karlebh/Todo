@extends('layouts.app')

@section('content')

<div>
	hello There!
</div>
{{-- 	
	<section>

		@forelse($result as $todo)
		<div class="mx-10 my-4 bg-gray-400 p-4">

			<h4 class="text-center mb-5 font-bold">{{ $todo->name }}</h4>
			
			<p class="py-5">{{ $todo->message }}</p>

			<hr>
			<p class="py-5">{{ $todo->details ?? ''}}</p>
			<hr>
			<div>
				
				@if($todo->image)
				<img src="/storage/{{ $todo->image }}" alt="Todo Image"
				class="object-cover w-40 h-40 align-middle" 
				>
				@endif

			</div>

			<p class="my-4"> <i> Created: </i>{{ $todo->created_at->diffForHumans() }}</p>

			<hr />

			<div class="flex m-4 ">
				<div
				class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 mr-6 rounded text-base leading-normal no-underline text-gray-100 bg-blue-900 hover:bg-white hover:text-blue-900 cursor-pointer"
				>
					<a href="{{ route('todo.edit', $todo->slug) }}">Edit</a>
				</div>
				
				<div>
					<form method="post" action="{{ route('todo.update', $todo->slug) }}">
						@csrf
						@method('DELETE')
						<button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-900 hover:bg-white hover:text-blue-900">
                                {{ __('Delete') }}
                        </button>
					</form>
				</div>

			</div>
		</div>
		@empty <p class="text-center">No Todo Available</p>

		@endforelse
	</section>

	<div class="mx-10 my-20 bg-gray-400">

	{{ $result->links() }}
		
	</div>
 --}}@endsection