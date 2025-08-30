
@extends('layouts.login')

@if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" 
               name="name" 
               id="name" 
               class="form-control @error('name') is-invalid @enderror" 
               value="{{ old('name') }}" 
               required>
        @error('name')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" 
               name="email" 
               id="email" 
               class="form-control @error('email') is-invalid @enderror" 
               value="{{ old('email') }}" 
               required>
        @error('email')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" 
               name="password" 
               id="password" 
               class="form-control @error('password') is-invalid @enderror" 
               required>
        @error('password')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" 
               name="password_confirmation" 
               id="password_confirmation" 
               class="form-control" 
               required>
    </div>

    <!-- Hidden default role -->
<input type="hidden" name="roles[]" value="user">



    <!-- Is Admin -->
    <div class="mb-3 form-check">
        <input type="hidden" class="form-check-input" name="is_admin" id="is_admin" value="0">
    </div>

    <button type="submit" class="btn btn-primary w-100">Register</button>
</form>

