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

        <livewire:table.lesson-table :$course />

    </div>
</x-app-layout>
