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
        <x-input label="Link Referensi" placeholder="Link Referensi..." wire:model="reference" />

        <div class="flex justify-end gap-2 mt-4">
            <x-button label="Cancel" class="btn-neutral" :link="route('courses.show', $course->id)" />
            @if($lesson)
                <x-button label="Update" icon="o-rocket-launch" class="btn-gradient-primary px-12" wire:click="update" />
            @else
                <x-button label="Tambah" icon="o-rocket-launch" class="btn-gradient-primary px-12" wire:click="save" />
            @endif
        </div>
    </div>
</div>
