<x-guest-layout>
    <x-slot name="slot">
        <div class="container mx-auto py-10">
            <ul class="px-5">
                @foreach($links as $link)
                    <li><a style="border: .5rem {{$textColor}} solid;" class="block my-10 text-xl font-bold text-center rounded-full p-5" href="{{$link->link}}" target="_blank">{{$link->name}}</a><li>
                @endforeach
            </ul>
        </div>
    </x-slot>
</x-guest-layout>
