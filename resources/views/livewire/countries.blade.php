<div>
    <button class="btn btn-primary btn-sm mb-3 mt-2 btn-round" wire:click="OpenAddCountryModal()">Add New Country</button>
    <table class="table table-hover  table-responsive">
        <thead class="thead-inverse">
            <tr>

                <th>Continent</th>
                <th>Country</th>
                <th>Capital City</th>

            </tr>
        </thead>
        <tbody>
            <td >Continent X</td>
            <td >Country x</td>
            <td >Capital x</td>
        </tbody>

        </thead>

     </table>
     @include('modals.add-modal')
</div>
<script>
    document.addEventListener('livewire:initialized',()=>{
        @this.on('OpenAddCountryModal',(event)=>{
            $('.addCountry').find('sapn').html('');
            $('.addCountry').find('form')[0].reset();
            $('.addCountry').modal('show')
        })

    @this.on('CloseAddCountryModal',(event)=>{
        $('.addCountry').find('sapn').html('');
        $('.addCountry').find('form')[0].reset();
        $('.addCountry').modal('hide');

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timeProgressBar: true,
        });
       Toast.fire(
           {
               icon: 'success',
                title: 'New Country Has been Saved'
           }
       )

        // alert('New Country Has been Saved Successfully');
    })





    })
</script>
