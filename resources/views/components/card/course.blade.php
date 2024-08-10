<x-card :title="$course->title" class="cursor-pointer hover:bg-base-300 transition">
    {{ $course->description }}

    <x-slot:figure>
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-[150px] w-full flex justify-center items-center">
            <x-icon name="o-globe-asia-australia" class="w-16 h-16 text-slate-200" />
        </div>
    </x-slot:figure>
    <x-slot:actions>
        <x-badge value="{{ intval($course->duration) }} Bulan" />
    </x-slot:actions>
</x-card>
