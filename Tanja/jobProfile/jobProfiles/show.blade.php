@extends('layouts.adminPannel')
@section('content')
<div class="container-fluid mb-5" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-12 h2 text-center">Specific Job Offer</div>
        <div class="col-md-11">
            <div class="form-group row">
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('jobProfiles.index') }}">
                        <button type="submit" class="btn btn-primary">
                        Go Back
                    </button></a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Job Profile</div>                

                <div class="card-body">
                    <div class="form-group row px-5">
                    	<div><b>Name: </b>{{ $profile->name }}</div>                  	
                    </div>

                    <div class="form-group row px-5">
                    	<div><b>Importance: </b>{{ $profile->importance }}</div>                  	
                    </div>                         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection