@extends('layouts.index')

@section('content')
<div>
    <section>
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <livewire:crops-table />
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Initialize TomSelect after loading the scripts -->
<script>
    document.addEventListener('livewire:load', function () {
        const commoditiesSelect = new TomSelect('#commodities-select', {
            plugins: ['remove_button'],
            // Add more Tom Select options and styling here
        });

        // Listen to Livewire changes and update the Tom Select dropdown
        Livewire.on('filtersUpdated', (data) => {
            if (data.filters.commodities) {
                const selectedValues = data.filters.commodities;
                commoditiesSelect.setValue(selectedValues, true);
            }
        });
    });
</script>

<style>
    /* Style the multi-select container */
    .tom-select {
        width: 100%; /* Adjust the width as needed */
    }

    /* Style the selected items */
    .item {
        background-color: #007BFF;
        color: #fff;
    }

    /* Style the dropdown options */
    .dropdown-content {
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        color: #333;
    }

    /* Style the dropdown arrow */
    .caret {
        color: #007BFF;
    }
</style>
@endsection
