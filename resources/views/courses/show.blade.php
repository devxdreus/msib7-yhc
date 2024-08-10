<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h1 class="text-3xl font-medium pb-4">Courses</h1>

        <div class="flex items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-6">

            <div class="basis-1/4 rounded-l-lg overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-56 w-full flex justify-center items-center">
                    <x-icon name="o-globe-asia-australia" class="w-16 h-16 text-slate-200" />
                </div>
            </div>

            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$course->title}}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$course->description}}</p>
            </div>

            <div class="self-stretch p-4 flex gap-2">
                <x-button icon="o-arrow-uturn-left" class="btn-square" :link="route('courses.index')" />
                <x-button icon="o-pencil" class="btn-square btn-warning btn-gradient-warning" :link="route('courses.edit', $course->id)" />
                <form action="{{route('courses.destroy', $course->id)}}" method="post"> @csrf @method('DELETE')
                    <x-button icon="o-trash" class="btn-square btn-danger btn-gradient-danger" type="submit" />
                </form>
            </div>
        </div>

        <h2 class="text-2xl font-medium pb-4">Daftar Materi</h2>

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

            <div class="flex flex-col gap-4">

                @foreach($course->lessons as $lesson )
                    <a href="{{route('courses.show', $course->id)}}" wire:navigate >
                        <div class="flex bg-base-100 hover:bg-base-300 transition rounded-xl p-4 gap-8 h-36">
                            <div class="basis-1/6 bg-gradient-to-r from-blue-500 to-blue-700 rounded-xl flex justify-center items-center">
                                <x-icon name="o-book-open" class="w-12 h-12 text-slate-200" />
                            </div>
                            <div class="basis-5/6 flex flex-col gap-2">
                                <span class="text-xl">{{$lesson->title}}</span>
                                <p class="text-sm">{{$lesson->description}}</p>
                                <x-badge value="{{$lesson->reference}}" />
                            </div>
                            <div class="self-stretch flex items-center">
                                <x-button icon="o-pencil" class="btn-gradient-warning" />
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>

    </div>
</x-app-layout>
