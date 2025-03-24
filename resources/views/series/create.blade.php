<x-layout title='Criar serie'>
    <form action="/series/store" method="POST">
        @csrf
        <label for="name">Serie name</label>
        <input type="text" id="name" name="name">

        <button type="submit">Save Serie</button>
    </form>
</x-layout>