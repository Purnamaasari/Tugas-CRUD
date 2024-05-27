<div>
    @include('livewire.productt-edit')
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $item)
                <tr>
                    <td>{{ $products->firstItem() + $index }}</td>
                    <td>{{ $item->name }}</td>
                    <td>Rp.{{ number_format ($item->price) }}</td>
                    <td>
                        <button class="btn badge bg-warning" data-bs-toggle="modal" data-bs-target="#editModal" wire:click="producttEdit({{ $item }})">Update</button>
                        <button class="btn badge bg-danger" wire:click="producttDelete({{$item->id}})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>