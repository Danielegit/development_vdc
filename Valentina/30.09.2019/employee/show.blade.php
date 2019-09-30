@extends('layouts.default')
 
@section('content')
<div class="d-flex justify-content-around">
	<a href="{{ url('account/'.$resUser->id.'/edit')}}" >
		<button class="btn btn-info">Edit Account</button>
	</a>

	<a href="{{ url('employee/'.$resUser->id.'/edit')}}" >
		<button class="btn btn-info">Edit Profile</button>
	</a>

</div>
	<hr>	
<div class="row d-flex justify-content-center my-4">	
	<div class="col-6">
		<h2 class="text-primary">User Table</h2>
	<h3><small>Name:</small>  {{ $resUser->name}}</h3>
	<h3><small>Last Name:</small> {{ $resUser->last_name}}</h3>
	<h3><small>Gender:</small> {{ $resUser->gender}}</h3>
	<hr>

	<h2 class="text-primary">Employee Table</h2>
		@foreach ($res as $res)
			<h3>Date of Birth: {{ $res->date_birth }}</h3>
			<h3>Description: {{ $res->description }}</h3>
		@endforeach
		@foreach($company as $company)
		<h3>Company: {{ $company->company_name }}</h3>
		@endforeach
	</div>
</div>
<!-- Comment Section -->
@if(Auth::user()->id != $resUser->id)
	@if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'trainer' OR Auth::user()->role == 'course_provider' OR Auth::user()->role == 'consultant')

	<div class="row d-flex justify-content-center flex-column align-items-center">
		<div class="col-6 mb-3">
			<form method="POST" action="{{ route('comments.store') }}">
			@csrf
				<h3 class="text-blue">Write a Note</h3>
				<input type="hidden" name="FK_author" value="{{ Auth::user()->id}}" >
				<input type="hidden" name="FK_subject" value="{{ $resUser->id }}" >
				<textarea name="content" class="w-100"></textarea >
				<div class="text-right">
					<button type="submit" class="btn btn-primary text-right">Send</button>
				</div>
			</form>
		</div>
		<div class="col-6">
		@foreach ($resUser->comment()->orderBy('created_at', 'desc')->get() as $comment)
			<div class="alert alert-primary d-flex flex-column" role="alert">
				@if(Auth::user()->id == $comment->FK_author)
				<form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
		            {{ method_field('DELETE') }}
		            @csrf
	                <div class="text-right">
	                	<button type="submit" class="btn btn-sm btn-link text-decoration-none text-danger" onclick="return confirm('Are you sure to delete?')">x</button>
	                </div>
				</form>
				@endif
			  {{ $comment->content }}
			@foreach($comment->author()->get() as $author)
			  <small class="text-right"><span class="text-left small">{{ $comment->created_at }}</span> {{ $author->name }}</small>
			@endforeach
			</div>
		@endforeach
		</div>
	</div>
	@endif

@endif

@endsection