<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div style="display: flex; gap: 5px;">

            <!-- nom -->
            <div>
                <x-input-label for="nom" :value="__('Nom')" />
                <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus
                    autocomplete="nom" />
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>

            <!-- prenom -->
            <div>
                <x-input-label for="prenom" :value="__('Prenom')" />
                <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required
                    autofocus autocomplete="prenom" />
                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>
        </div>

        <div style="display: flex; gap: 5px;">

            <!-- lieu_de_naissance -->
            <div>
                <x-input-label for="lieu-de-naissance" :value="__('Lieu de naissance')" />
                <x-text-input id="lieu-de-naissance" class="block mt-1 w-full" type="text" name="lieu_de_naissance"
                    :value="old('lieu_de_naissance')" required autofocus autocomplete="lieu_de_naissance" />
                <x-input-error :messages="$errors->get('lieu_de_naissance')" class="mt-2" />
            </div>
            <!-- date_de_naissance -->
            <div>
                <x-input-label for="date-de-naissance" :value="__('Date de naissance')" />
                <x-text-input id="date-de-naissance" class="block mt-1 w-full" type="date" name="date_de_naissance"
                    :value="old('date_de_naissance')" required autofocus autocomplete="date_de_naissance" />
                <x-input-error :messages="$errors->get('date_de_naissance')" class="mt-2" />
            </div>
        </div>
        <div style="display: flex; gap: 5px;">

            <!-- tel -->
            <div>
                <x-input-label for="tel" :value="__('Telephone')" />
                <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" autofocus
                    autocomplete="tel" />
                <x-input-error :messages="$errors->get('tel')" class="mt-2" />
            </div>
            <!-- photo -->
            <div>
                <x-input-label for="photo" :value="__('Photo')" />
                <x-text-input id="photo" class="block mt-1 w-full" type="file" name="name" :value="old('photo')" autofocus
                    autocomplete="photo" />
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>
        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div style="display: flex; gap: 5px;">

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                    required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>