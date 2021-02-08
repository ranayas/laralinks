<x-guest-layout>
    <x-slot name="slot">
        <div class="absolute h-full w-full" style="background-color: {{ $backgroundColor }};">
            <ul class="container mx-auto">
                @foreach($links as $link)
                    <li><a link-id="{{$link->id}}" style="border: .5rem {{$textColor}} solid; color: {{ $textColor }}" class="user-link block my-10 text-xl font-bold text-center rounded p-5" href="{{$link->link}}" target="_blank">{{$link->name}}</a><li>
                @endforeach
            </ul>
        </div>
    </x-slot>
</x-guest-layout>
