<div>
    @if($success)
        <div class="bordered p-5 text-green-400">
            {{ $success }}
        </div>
    @endif

    <form wire:submit.prevent="submit">

        <div>
            <x-jet-label for="name" value="{{ __('Name') }}"/>
            <x-jet-input id="name"
                         class="block mt-1 w-full"
                         type="string"
                         wire:model="name"
                         autocomplete=""
                         autofocus/>
            @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <x-jet-label for="email" value="{{ __('eMail') }}"/>
            <x-jet-input id="email"
                         class="block mt-1 w-full"
                         type="string"
                         wire:model="email"
                         required/>
            @error('email') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <x-jet-label for="phone" value="{{ __('Phone') }}"/>
            <x-jet-input id="phone"
                         class="block mt-1 w-full"
                         type="string"
                         wire:model="phone"
                         required/>
            @error('phone') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <x-jet-label for="message" value="{{ __('Message') }}"/>

            <textarea name="message"
                      wire:model="message"
                      class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
            @error('message') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>

        <x-jet-button class="ml-4" type="submit">
            {{ __('Submit') }}
        </x-jet-button>
    </form>
</div>
