<div>
    @include('livewire.addmodel')

    {{-- Submited massege alert start --}}
    @if (session()->has('quote_massage'))
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: "{{ session('quote_massage')}}",
            })
        </script>
    @endif

    {{-- Deleted massege alert start --}}
    @if (session()->has('quote_delete_massage'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'error',
        title: "{{ session('quote_delete_massage')}}",
        })
    </script>
    @endif

    {{-- Updated massege alert start --}}
    @if (session()->has('quote_updated_massage'))
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: "{{ session('quote_updated_massage')}}",
            })
        </script>
    @endif

      <div class="row">
        <div class="col-xl-6 col-xx-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Submit Information,</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form wire:submit.prevent="insert_quote">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Writer Name</label>
                                    <input type="text" class="form-control" value="" wire:model="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Writer Quote</label>
                                    <input type="text" class="form-control" wire:model='quote'>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="table-responsive" >
            <div class="form-group col-md-3">
                <label>Search Name of Writer</label>
                <input type="text" class="form-control" value="" wire:model="search">
            </div>
            <table class="table table-responsive-md table-bordered ">
                <thead>
                    <tr>
                        <th>ID NO.</th>
                        <th>Writer Name</th>
                        <th>Quote</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($infos as $info)
                    <tr>
                        <td>{{ $infos->firstitem() + $loop->index}}</td>
                        <td>{{ $info->name }}</td>
                        <td>
                            {{ $info->quote }}
                        </td>

                        <td>
                            <button wire:click="deleteit({{ $info->id }})" class="btn btn-danger btn-sm m-2">Delete</button>
                            <button type="button" wire:click="edit_it({{ $info->id }})" class="btn btn-info btn-sm m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">edit</button>
                        </td>


                    </tr>
                  @empty

                  <tr>
                     <td colspan="50" class="text-danger text-center"> No Data Found</td>
                  </tr>
                  @endforelse
                </tbody>
            </table>
            <div class="d-flex">
                {{ $infos->withQueryString()->links() }}
            </div>
        </div>

      </div>



    </div>
