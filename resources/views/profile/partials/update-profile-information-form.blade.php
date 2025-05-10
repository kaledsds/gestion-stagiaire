<section class="card-body">
    <!-- Section Header -->
    <h5 class="card-title">
        {{ __('Profile Information') }}
    </h5>

    <p class="mt-1 text-muted">
        {{ __("Update your account's profile information and email address.") }}
    </p>

    <!-- Verification Form -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile Update Form -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="inputName" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name', $user->name) }}"
                required />
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required
                autocomplete="username" />
            @error('email')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-3">
                <p class="text-muted">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification" class="btn btn-link p-0" type="submit">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 text-success">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="d-flex justify-content-end gap-3 mt-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
            <p class="text-success mb-0">
                {{ __('Saved.') }}
            </p>
            @endif
        </div>
    </form>
</section>