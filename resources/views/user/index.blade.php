@extends('layouts.app')

@section('content')
@vite(['resources/js/user.js'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Users' }}</div>

                <table id="userTable" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">City</th>
                        <th scope="col">Count of images</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <nav aria-label="...">
                    <ul class="pagination" id="pagination-container">

                    </ul>
                </nav>

                <form method="POST" id="userForm" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                        <div class="col-md-6">
                            <label>
                                <input type="text"
                                       class="form-control
                                       @error('name') is-invalid @enderror"
                                       name="name"
                                       id="name"
                                       value="{{ old('name') }}"
                                       required
                                       autofocus>
                            </label>
                            @error('name')
                                <div class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">City</label>

                        <div class="col-md-6">
                            <label>
                                <input type="text"
                                       class="form-control
                                       @error('city') is-invalid @enderror"
                                       name="city"
                                       id="city"
                                       value="{{ old('city') }}"
                                       required>
                            </label>
                            @error('city')
                                <div class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Image</label>

                        <div class="col-md-6">
                            <label>
                                <input type="file"
                                       accept=".jpg,.jpeg,.png"
                                       class="form-control
                                       @error('image') is-invalid @enderror"
                                       name="image"
                                       id="image"
                                       value="{{ old('image') }}"
                                       required>
                            </label>
                            @error('name')
                                <div class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div id="message"></div>


                    <div class="row mb-3">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
