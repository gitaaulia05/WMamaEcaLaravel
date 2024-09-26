    @extends('user.template.navbar')

    @section('container')

    <h1> ini section buat gambar - alamat - perbarui data </h1>

    <div class="flex justify-end mt-0 px-12">
    <a href="/update-profile" class="bg-orange-400 text-white font-bold py-2 px-4 rounded-xl">Perbarui Data</a>
</div>

       @livewire('profile-table')
    @endsection
