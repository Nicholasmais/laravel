<x-layout title='Series'>
    <ul>
        @foreach($series as $serie)
            <li>{{ $serie->serie }}</li>
        @endforeach
    </ul>
</x-layout>