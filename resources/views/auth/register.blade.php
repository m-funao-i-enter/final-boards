@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center">
        <h2>Sign up</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('register') }}" class="w-1/2">
            @csrf

            <div class="form-control my-4">
                <label for="user_name" class="label">
                    <span class="label-text">ユーザネーム</span>
                </label>
                <input type="text" name="user_name" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="user_id" class="label">
                    <span class="label-text">ユーザID</span>
                </label>
                <input type="user_id" name="user_id" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="password" class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="password_confirmation" class="label">
                    <span class="label-text">Confirmation</span>
                </label>
                <input type="password" name="password_confirmation" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn btn-primary btn-block normal-case">Sign up</button>
        </form>
    </div>
@endsection