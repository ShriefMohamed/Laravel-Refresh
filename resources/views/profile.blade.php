@extends('layouts.app')


@section('content')
<section class="my-5">
        <div class="row">
            <div class="col-6" style="margin: auto;">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Update Profile Information</h5>
                        @if(isset($exception))
                            <div class="alert alert-danger">Error: {{$exception->getMessage()}}</div>
                        @elseif(isset($success))
                            <div class="alert alert-success">Profile was updated successfully!</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(isset($user))
                        <form role="form" method="post" action="{{ route('profile_update')  }}">
                        @csrf <!-- {{ csrf_field() }} -->
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="Name" placeholder="Enter Name" value="{{old('name') ?: $user->name}}" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="Email">Email address</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="Email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email') ? : $user->email}}" name="email" required >
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" name="password">
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Info</button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>.form-group {margin-bottom: 1rem} </style>
@endsection


