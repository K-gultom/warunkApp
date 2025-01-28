<div>

    
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-8">
                @if (Session::has('message'))
                    <div class="alert alert-success" id="flash-message">
                       <strong> {{Session::get('message')}} </strong>
                    </div>
                    <script>
                        setTimeout(function (){
                            document.getElementById('flash-message').style.display='none';
                        }, {{ session('timeout', 5000) }});
                    </script>
                @endif
                <div class="card">
                    <div class="card-header">Meta Product</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Name</th>
                                <th class="text-center">Date</th>
                                <th>Desc</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($dataProduct as $key => $value)
                                    <tr>
                                        <td>{{ $dataProduct->firstItem() + $key }}</td>
                                        <td>{{ $value->name_product }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($value->date)->format('d/m/Y') }}</td>
                                        <td>{{ $value->desc }}</td>
                                        {{-- <td>{{ \Illuminate\Support\Str::limit($value->desc, 10) }}</td> --}}
                                        <td>
                                            <a wire:click="edit({{ $value->id}})" class="btn btn-warning btn-sm">Edit</a>
                                            
                                            <a wire:click="delete_confirmation({{ $value->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Del</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $dataProduct->links() }}
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Add Meta Product</div>
                    <div class="card-body">
                        <form>
                            {{-- <!-- <form wire:submit="save" method="post">  --> --}}
                            
                            <div class="mb-3">
                                <label for="name_product">Name Product</label>
                                <input type="text" wire:model="name_product" id="name_product" class="form-control @error('name_product') is-invalid @enderror" placeholder="Input Name Product....">
                                @error('name_product')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date">Date</label>
                                <input type="date" wire:model="date" id="date" class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="desc">Name Product</label>
                                <textarea id="desc" wire:model="desc" class="form-control @error('desc') is-invalid @enderror" cols="30" rows="5" placeholder="Input Description of Product...."></textarea>
                                @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
            
                            <div class="d-flex justify-content-end">
                                @if ($updateButton == false)
                                    <button type="button" name="submit" wire:click='save()' class="btn btn-primary me-2">Save</button>
                                @else
                                    <button type="button" name="submit" wire:click='update()' class="btn btn-warning me-2">Update</button>
                                @endif
                                <button type="button" name="submit" wire:click='clear()' class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin akan menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" wire:click="delete()" data-bs-dismiss="modal">Iya</button>
                </div>
            </div>
        </div>
    </div>


    

</div>