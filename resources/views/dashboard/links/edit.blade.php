<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Edit Link')}}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route('dashboard.links.update', $link)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12">
                                    <div>
                                        <x-label for="name" :value="__('Name')" />
                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $link->name" autofocus />
                                    </div>
                                </div>

                                <div class="col-span-12">
                                    <x-label for="link" :value="__('URL')" />
                                    <x-input id="link" class="block mt-1 w-full" type="text" name="link" :value="old('link') ?? $link->link" autofocus />
                                </div>
                                @if ($errors->any())
                                    <div class="col-span-12">
                                        <ul class="list-disc list-inside text-sm text-red-600">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                            <x-button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{__('Save')}}
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
