@extends('admin.template.aside')

@section('container')

<div class="col-md-7 mt-4 ms-5">
          <div class="card">
            <div class="card-header pb-0 px-3" style="border-bottom: none; background-color: white;">
              <h6 class="mb-0">Detail Barang</h6>
            </div>

            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class=" align-items-start" style="width: 100%;">

<div class="row">
    <div class="col">
    <span class="mb-2 text-s">Nama Barang: <span class="text-dark font-weight-bold ms-sm-2"> {{ $data->slug }}</span></span>
</div>
<div class="col">
        <span> tanggal : {{$data->created_at}}</span>
</div>
</div>



                    <div class="pt-1">
                    <span class="mb-2 text-s">Harga Barang :


                    <span class="text-dark ms-sm-2 font-weight-bold">
                       {{ $data->harga_barang }}
                           </span>
                    </span>

                    <div class="pt-1">
                    <span class="text-s">Jumlah Barang:
                    <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->stok_barang }}</span>
</div>

                    <div class="pt-1">
		            <span class="text-s">Deskripsi:
                    <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->deks_barang }}</span>
                    </div>


</div>



                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        </div>
        </div>

</div>

</div>


@endsection
