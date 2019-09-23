@extends('layouts.adminPannel')
@section('content')

<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12 h2 text-center">Job Profiles</div>
        <div class="col-6 my-3 text-left">
            <a href="{{ route('admin.index') }}"><button type="submit" class="btn btn-primary text-light">Back
            </button></a>
        </div>
        <div class="col-6 my-3 text-right">
            <a href="{{ route('jobProfiles.create') }}"><button type="submit" class="btn btn-primary text-light">Create New Profile
            </button></a>
        </div>
		
		<table class="w-100 table table-striped table-bordered">		
		<thead>
			<tr>
				<th>id</th>
				<th>Profile Name</th>
				<th>Importance</th>						
				<th>Created:</th>	
				<th>EDIT</th>
				<th>DELETE</th>				
			</tr>
		</thead>
		<tbody>
			@foreach ($profiles as $profiles)		
				<tr>
					<td>{{ $profiles->id }}</td>
					<td>{{ $profiles->name }}</td>
					<td>{{ $profiles->importance }}</td>					
					<td>{{ $profiles->created_at }}</td>					
					<td class="text-success text-center font-weight-bold">
						<a href="{{ route('jobProfiles.edit', $profiles->id)}}">
							<button class="bg-success text-white pointer" style="border-radius: 100%; border:0; cursor: pointer;">O</button>
						</a>
					</td>
					<td class="text-danger text-center font-weight-bold">
						<form method="POST" action="{{ route('jobProfiles.destroy', $profiles->id) }}">
						@csrf
						{{ method_field('DELETE') }}
						    
						<button type="submit" value="delete" class="bg-danger text-white pointer" onclick="return confirm('Do you really want to delete this profile?')" style="border-radius: 100%; border:0; cursor: pointer;">X</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
		</table>
	</div>
</div>

@endsection