@extends('home')

@section('content')
    <link rel="stylesheet" href="../css/style.css">
    <div class="container update-profile">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update', ['id' => $user->id]) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Profile</h6>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan nama anda" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukkan email anda" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="telephone">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone"
                                            placeholder="Masukkan nomor telepon anda" value="{{ $user->telephone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Alamat</h6>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Surabaya/Jawa Timur/Indonesia" value="{{ $user->address }}">
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit" class="btn btn-secondary mt-3">
                                            <a href="{{ route('profile') }}">Cancel</a></button>
                                        <button type="submit" id="submit" name="submit"
                                            class="btn btn-primary mt-3">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
