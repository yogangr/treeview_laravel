@extends('home')

@section('navbar')
    <h1 class="judul">Profile</h1>
@endsection

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <div class="container profile">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->telephone }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->address }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " href="{{ route('profile.update.view') }}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <div class="col-sm-5 mb-3">
                        <div class="card">
                            <div class="card-body project">
                                <h6 class="d-flex align-items-center mb-3">Project Public</h6>
                                @foreach ($user->menu as $menu)
                                    @if ($menu->is_public == true)
                                        <small>{{ Str::upper($menu->title) }}</small>
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <div class="col-sm-5 mb-3">
                        <div class="card">
                            <div class="card-body project">
                                <h6 class="d-flex align-items-center mb-3">Project Private</h6>
                                @foreach ($user->menu as $menu)
                                    @if ($menu->is_public == false)
                                        <small>{{ Str::upper($menu->title) }}</small>
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
