<section class="container my-4">
    <!-- Header Section -->
    <header class="mb-4">
        <h2 class="h4 fw-semibold text-dark">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-2 text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <!-- Update Password Form -->
    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">
                {{ __('Current Password') }}
            </label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control"
                autocomplete="current-password" />
            @error('current_password')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label">
                {{ __('New Password') }}
            </label>
            <input id="update_password_password" name="password" type="password" class="form-control"
                autocomplete="new-password" />
            @error('password')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">
                {{ __('Confirm Password') }}
            </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="form-control" autocomplete="new-password" />
            @error('password_confirmation')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-end gap-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
            <p class="text-success mb-0">
                {{ __('Saved.') }}
            </p>
            @endif
        </div>
    </form>
</section>