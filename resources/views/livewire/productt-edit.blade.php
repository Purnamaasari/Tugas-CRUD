<div>
    <!-- Modal -->
    <div x-data="{ showModal: false }" x-init="$watch('showModal', value => { if (value) { $('#editModal').modal('show'); } else { $('#editModal').modal('hide'); } })" x-cloak wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model.defer="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.defer="price">
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
                    <button type="button" class="btn btn-warning" wire:click.prevent="producttUpdate">Update</button>
                </div>
            </div>
        </div>
    </div>
  </div>