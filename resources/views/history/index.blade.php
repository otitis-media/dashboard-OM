@extends('dashboard')

@section('contentdashboard')
<div class="flex p-8 bg-white max-md:hidden">
  <div class="w-full flex flex-col">
    <div>
      <h1 class="text-3xl font-bold p-4">Riwayat</h1>
    </div>
    <div class="flex flex-col gap-8">
      <div class="bg-white shadow-xl h-96 w-full flex rounded-lg p-4 gap-8">
        <img class="rounded-xl" src="{{ asset('images/dummy1.png') }}" alt="satu">
        <div class="flex flex-col justify-between h-full">
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
      <div class="bg-white shadow-xl h-96 w-full flex rounded-lg p-4 gap-8">
        <img class="rounded-xl" src="{{ asset('images/dummy2.png') }}" alt="satu">
        <div class="flex flex-col justify-between h-full">
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
        <img class="rounded-xl" src="{{ asset('images/dummy1.png') }}" alt="satu">
        <div class="flex flex-col justify-between h-full">
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
        <img class="rounded-xl" src="{{ asset('images/dummy2.png') }}" alt="satu">
        <div class="flex flex-col justify-between h-full">
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