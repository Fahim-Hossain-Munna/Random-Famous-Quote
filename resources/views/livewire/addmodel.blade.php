
      <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="cancel()"></button>
        </div>
        <div class="modal-body">
            <div class="basic-form">
                <form wire:submit.prevent="update" >
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Writer Name</label>
                            <input type="text" class="form-control" value="" wire:model="name">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Writer Quote</label>
                            <input type="text" class="form-control" wire:model='quote'>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary" wire:click="update()">Submit</button>
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click.prevent="cancel()">Close</button>
        </div>
      </div>
    </div>
  </div>


