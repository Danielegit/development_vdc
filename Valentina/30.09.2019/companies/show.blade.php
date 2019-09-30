@extends('layouts.default')
@section('content')	
<div class="container">
	<h3 class="p-3 text-center text-dark">{{ $res->company_name }}</h3>

	<div class="row">		
		<div class="col-12 p-3">
			<div class="col-12 border rounded p-3">				
				<div class="my-3"> {{ $res->description }}</div>
				<div><b>Web : </b>{{ $res->website }}</div>
				<hr>
				<div class="h5"><b>Contact</b></div>
				<div><b>Tel: </b>{{ $res->company_phone }}</div>
				<div><b>Mail: </b>{{ $res->company_email }}</div>
				<br>
				<div class="h5"><b>Address</b></div>
				<div>{{ $res->street }}</div>
				<div>{{ $res->zipCode }} {{ $res->city }}</div>
				<div>{{ $res->country }}</div>
			</div>
		</div>		
	</div>
</div>
<!-- Comment Section -->
@if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'consultant')

<div class="row d-flex justify-content-center flex-column align-items-center">
	<div class="col-6 mb-3">
		<form method="POST" action="{{ route('comments.store') }}">
		@csrf
			<h3 class="text-blue">Write a Note</h3>
			<input type="hidden" name="FK_author" value="{{ Auth::user()->id}}" >
			<input type="hidden" name="FK_company" value="{{ $res->id }}" >
			<textarea name="content" class="w-100"></textarea >
			<div class="text-right">
				<button type="submit" class="btn btn-primary text-right">Send</button>
			</div>
		</form>
	</div>
	<div class="col-6">
	@foreach ($res->commentCompany()->orderBy('created_at', 'desc')->get() as $comment)
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
@endsection