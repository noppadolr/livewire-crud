<!-- Modal -->
<div class="modal fade addCountry" wire:ignore.self id="addCountryModal"
        tabindex="-1"
        aria-labelledby="addCountryModal"
        aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false"
        >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCountryModalLabel">Add New Country</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form wire:submit.prevent="save">

            <div class="form-group mb-3">
                <label for="continent" class="mb-1">Continent</label>
                <select class="form-select @error('continent')is-invalid @enderror" wire:model="continent" id="continent" aria-label="Default select example">
                    <option value="">No Selected</option>
                    @foreach($continents as $continent )
                        <option value="{{ $continent->id }}">{{ $continent->continent_name }}</option>
                    @endforeach
                </select>
                @error('continent') <span class="text-danger"> {{$message}}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="country_name" class="mb-1">Country Name</label>
                <input type="text" class="form-control @error('country_name')is-invalid @enderror" placeholder="Country Name" id="country_name" wire:model="country_name">
                @error('country_name') <span class="text-danger"> {{$message}}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="capital_city" class="mb-1">Capital City</label>
                <input type="text" class="form-control @error('capital_city')is-invalid @enderror" placeholder="Capital City" id="capital_city" wire:model="capital_city">
                @error('capital_city') <span class="text-danger"> {{$message}}</span> @enderror
            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
