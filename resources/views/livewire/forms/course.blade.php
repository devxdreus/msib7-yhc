<div class="bg-base-200 overflow-hidden shadow-sm sm:rounded-lg p-6">
    <div class="flex flex-col gap-4">
        <x-input label="Judul" placeholder="Judul" wire:model="title" />
        <x-textarea
            label="Deskripsi"
            wire:model="bio"
            placeholder="Deskripsi ..."
            rows="3"
            wire:model="description"
        />
        <div class="w-[200px]">
            <x-input label="Durasi" placeholder="Durasi" suffix="Bulan" type="number" wire:model="duration" />
        </div>

        <div class="flex justify-end gap-2">
            <x-button label="Cancel" class="btn-neutral" :link="route('courses.index')" />
            <x-button label="Tambah" icon="o-rocket-launch" class="btn-gradient-primary px-12" wire:click="save" />
        </div>
    </div>
</div>
