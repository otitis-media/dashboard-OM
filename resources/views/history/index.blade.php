@extends('dashboard')

@section('contentdashboard')

<div class="flex p-8 bg-white max-md:hidden">
  <div class="w-full flex flex-col">
    <div id="modalContainer"></div>

    <div class="flex justify-between">
      <div>
        <h1 class="text-3xl font-bold p-4">Riwayat</h1>
      </div>
      <div class="flex h-full items-center">
        <button type="button" class="bg-primary_btn hover:bg-hover_btn text-white px-4 py-2 rounded-lg" id="openModalButton">Tambah Gambar</button>
      </div>
      <script>
        function openModal() {
          document.getElementById('myModal').style.display = 'block';
        }

        function closeModal() {
          document.getElementById('myModal').style.display = 'none';
        }

        document.getElementById('openModalButton').addEventListener('click', function() {
          fetch("{{ route('modal.content') }}")
            .then(response => response.text())
            .then(html => {
              document.getElementById('modalContainer').innerHTML = html;
              openModal();
            });
        });
      </script>
    </div>
    <div class="flex flex-col gap-8">
      @foreach ($data as $item)
      <div class="bg-white shadow-xl w-full flex rounded-lg p-4 gap-8">
        <img class="rounded-xl w-72 h-72" src="https://gizianfuzskcultaqcsz.supabase.co/storage/v1/object/public/bucket-test-1/{{$item->gambar}}" alt="satu">
        <div class="flex flex-col justify-between">
          <div>
            <h1 class="text-2xl font-bold">Informasi</h1>
            <p class="text-lg">Tanggal: {{$item->date}}</p>
            <p class="text-lg">{{$item->deskripsi}} </p>
            @if ($item->prediksi == '0')
            <span class="text-lg">Hasil klasifikasi: <strong class="text-green-500">Normal</strong> </span>
            @else
            <span class="text-lg">Hasil klasifikasi: <strong class="text-red-500">Otitis Media stadium {{$item->prediksi}}</strong> </span>
            @endif
          </div>
          <div>
            <div class="flex gap-4 mt-4">
              <button class="bg-primary_btn hover:bg-hover_btn text-white px-4 py-2 rounded-lg">Edit</button>
              <form action="{{ route('history.delete', $item->id) }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="bg-red-500 hover:bg-red-800 text-white px-4 py-2 rounded-lg">Hapus</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<div class="flex p-8 bg-white md:hidden">
  <div class="w-full flex flex-col">
    <div class="">
      <a href="{{ route('home') }}" class="bg-primary_btn hover:bg-hover_btn text-white font-semibold py-2 px-4 rounded-lg">Home</a>
    </div>
    <div>
      <h1 class="text-3xl font-bold p-4">Riwayat</h1>
    </div>
    <div class="flex flex-col gap-8">
      <div class="bg-white shadow-xl w-full flex flex-col rounded-lg p-4 gap-8">
        <img class="rounded-xl w-72 h-72" src="{{ asset('images/dummy1.png') }}" alt="satu">
        <div class="flex flex-col justify-between">
          <div>
            <h1 class="text-2xl font-bold">Informasi</h1>
            <p class="text-lg">Tanggal: <?php echo date('Y-m-d'); ?></p>
            <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed etiam, ut inchoavit aut adiit in partem aliqua, quae quaerebat, investigavit. Quod quidem iam fit etiam in Academia. </p>
            <span class="text-lg">Hasil klasifikasi: <strong class="text-red-500">Otitis Media stadium 1</strong> </span>
          </div>
          <div>
            <div class="flex gap-4 mt-4">
              <button class="bg-primary_btn hover:bg-hover_btn text-white px-4 py-2 rounded-lg">Edit</button>
              <button class="bg-red-500 hover:bg-red-800 text-white px-4 py-2 rounded-lg">Hapus</button>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-white shadow-xl w-full flex flex-col rounded-lg p-4 gap-8">
        <img class="rounded-xl w-72 h-72" src="{{ asset('images/dummy2.png') }}" alt="satu">
        <div class="flex flex-col justify-between">
          <div>
            <h1 class="text-2xl font-bold">Informasi</h1>
            <p class="text-lg">Tanggal: <?php echo date('Y-m-d'); ?></p>
            <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed etiam, ut inchoavit aut adiit in partem aliqua, quae quaerebat, investigavit. Quod quidem iam fit etiam in Academia. </p>
            <span class="text-lg">Hasil klasifikasi: <strong class="text-red-500">Otitis Media stadium 4</strong> </span>
          </div>
          <div>
            <div class="flex gap-4 mt-4">
              <button class="bg-primary_btn hover:bg-hover_btn text-white px-4 py-2 rounded-lg">Edit</button>
              <button class="bg-red-500 hover:bg-red-800 text-white px-4 py-2 rounded-lg">Hapus</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
