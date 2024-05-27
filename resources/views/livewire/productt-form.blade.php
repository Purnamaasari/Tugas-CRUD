<div>
    <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Produk
  </button>
  <!-- Modal "Tambah Produk" -->
  <div x-data="{ showModal: false }" x-init="$watch('showModal', value => { if (value) { $('#exampleModal').modal('show'); } else { $('#exampleModal').modal('hide'); } })" x-cloak wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="productName">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="myInput" wire:model="name">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="productPrice">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="productPrice" wire:model="price">
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="showModal = false">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="store">Submit</button>
            </div>
        </div>
    </div>
  </div>
  <script>
      var myModal = document.getElementById('exampleModal')
      var myInput = document.getElementById('myInput')
    
      myModal.addEventListener('shown.bs.modal', function () {
       myInput.focus();
    })
    </script>
  </div>