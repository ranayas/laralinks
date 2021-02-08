<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Settings')}}
        </h1>
    </x-slot>
    @if (session("success"))
        <div x-data="Modal()" class="fixed z-10 inset-0 overflow-y-auto" x-show="visible">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                    {{ session('success') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="visible=false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Ok
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('dashboard.users.update', Auth::user()) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid gap-6">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        {{$error}}
                                    @endforeach
                                @endif
                                <div>
                                    <x-label for="background-color">Background Color</x-label>
                                    <x-input id="background-color" class="block mt-1 w-full" type="text" name="background-color" :value="old('background_color') ?? $user->background_color" autofocus />
                                </div>
                                <div>
                                    <x-label for="text-color">Foreground Color</x-label>
                                    <x-input id="text-color" class="block mt-1 w-full" type="text" name="text-color" :value="old('text-color') ?? $user->text_color" autofocus />
                                </div>
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
        @if (session("success"))
            <x-slot name="scripts">
                <script charset="utf-8">
                    const Modal = () => {
                        return {
                            visible: true,
                        }
                    }
                </script>
            </x-slot>
        @endif
</x-app-layout>
