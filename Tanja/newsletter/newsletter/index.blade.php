@extends('layouts.default')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subscribe to Newsletter</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('newsletter.store') }}">
                        @csrf
                        

                        <div class="alert alert-primary"></div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" placeholder="name@example.com" required>
                            </div>
                        </div>                    
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Subscribe
                                </button>
                            </div>
                        </div>
                    </form>

                    @if(Auth::user()/* && Newsletter::email() == auth::user()->email*/)
                    <a href="{{ route('newsletter.delete', $res->id) }}">
                        <button class="btn btn-primary">
                            Unsubscribe
                        </button></a>
                                
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection