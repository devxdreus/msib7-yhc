<div class="bg-base-200 overflow-hidden shadow-sm sm:rounded-lg p-6">
    <div class="p-4 bg-base-100 mb-4 rounded-xl flex justify-between">
        <div class="flex gap-4">
            <div class="flex gap-4 items-center">
                <x-select icon="o-arrows-up-down" :options="[['id' => 'desc', 'name' => 'Terbaru'], ['id' => 'asc', 'name' => 'Terlama']]" wire:model="sort" wire:change="syncData" class="text-sm" />
            </div>
            <x-input placeholder="Search..." icon="o-magnifying-glass" wire:model="search" wire:keyup.debounce="syncData" />
        </div>
        <x-button label="Materi Baru" icon="o-plus" class="btn-gradient-primary" :link="route('courses.create')" />
    </div>

    <div class="grid grid-cols-2 gap-4">
        @foreach($courses as $course)
            <a href="{{route('courses.show', $course->id)}}" wire:navigate >
                <x-card.course :$course />
            </a>
        @endforeach
    </div>
</div>
