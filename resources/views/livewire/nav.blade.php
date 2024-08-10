<x-nav sticky full-width>

    <x-slot:brand>
        {{-- Drawer toggle for "main-drawer" --}}
        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer" />
        </label>

        {{-- Brand --}}
        <div class="text-2xl font-black text-gradient-primary">Digitaliz</div>
    </x-slot:brand>

    {{-- Right side actions --}}
    <x-slot:actions>
        <x-dropdown :label="auth()->user()->name" icon="o-user" right="right" class="btn-sm">
            <x-button icon="o-power" label="Sign Out" wire:click="logout" />
        </x-dropdown>
        <x-theme-toggle />
    </x-slot:actions>
</x-nav>
