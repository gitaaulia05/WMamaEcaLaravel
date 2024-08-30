@extends('admin.template.aside')

@section('container')

<div class="container mx-auto py-6">
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
        <thead style="background-color: #ff8567;">
                <tr>
                    <th class="py-2 px-8 border-b text-center">Nama Produk</th>
                    <th class="py-2 px-8 border-b text-center">Total Habis</th>
                    <th class="py-2 px-8 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-8 border-b">Beras</td>
                    <td class="py-2 px-8 border-b text-center">10</td>
                    <td class="py-2 px-8 border-b text-center">
                        <a href=" " class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-8 border-b">Minyak</td>
                    <td class="py-2 px-8 border-b text-center">9</td>
                    <td class="py-2 px-8 border-b">
                        <a href=" " class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-8 border-b"></td>
                    <td class="py-2 px-8 border-b text-center"></td>
                    <td class="py-2 px-8 border-b">
                        <a href=" " class="btn btn-orange"
                            style="background-color: #ff8567; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; border: none; margin: 5px; text-transform: none;">Detail
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
