<!-- resources/views/modals/my_modal.blade.php -->
<div class="fixed z-10 inset-0 overflow-y-auto shadow-2xl" style="display: none; background-color: rgba(0, 0, 0, 0.5);" id="myModal">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
      <form method="POST" action="{{ route('modals.add-gambar') }}" enctype="multipart/form-data">
        @csrf
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900">Tambahkan Gambar</h3>
              <div class="mt-2">
                <div class="mb-4">
                  <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                  <input type="text" name="judul" id="judul" class="p-2 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                  <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                  <textarea name="deskripsi" id="deskripsi" rows="3" class="p-2 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
                <div class="mb-4">
                  <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                  <input type="file" name="gambar" id="gambar" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal()">Batalkan</button>
          <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 sm:w-auto sm:text-sm">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>