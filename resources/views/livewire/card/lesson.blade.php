<div class="relative">
    <a href="{{route('lessons.edit', [$lesson->course->id, $lesson->id])}}" wire:navigate >
        <div class="flex bg-base-100 hover:bg-base-300 transition rounded-xl p-4 gap-8 h-36">
            <div class="basis-1/6 bg-gradient-to-r from-blue-500 to-blue-700 rounded-xl flex justify-center items-center">
                <x-icon name="o-book-open" class="w-12 h-12 text-slate-200" />
            </div>
            <div class="basis-5/6 flex flex-col gap-2">
                <span class="text-xl">{{$lesson->title}}</span>
                <p class="text-sm">{{$lesson->description}}</p>
                <x-badge value="{{$lesson->reference}}" class="bg-base-200" />
            </div>
        </div>
    </a>
    <x-button icon="o-trash" class="btn-sm btn-square btn-gradient-danger absolute top-4 right-4" wire:click.prevent="confirmDelete" />
</div>
