<h6 class="text-sm my-1 px-4 font-bold uppercase mt-3 ">
    Educational Background
</h6>

<!-- Repeat the structure for each grade level -->
@for ($gradeLevel = 7; $gradeLevel <= 12; $gradeLevel++)
    <h6 class="text-sm my-1 px-4 font-bold uppercase mt-3 text-gray-500">
        Grade {{ $gradeLevel }}
    </h6>
    <x-grid columns="3" gap="4" px="0" mt="0">
        <div class="relative mb-3 px-4">
            <x-label for="name_{{ $gradeLevel }}">Name of school</x-label>
            <x-input wire:model="education.{{ $gradeLevel }}.name"
            id="name_{{ $gradeLevel }}" />
        </div>

        <div class="relative mb-3 px-4">
            <x-label for="section_{{ $gradeLevel }}">Section</x-label>
            <x-input wire:model="education.{{ $gradeLevel }}.section"
            id="section_{{ $gradeLevel }}" />
        </div>

        <div class="relative mb-3 px-4">
            <x-label for="school_year_{{ $gradeLevel }}">School Year</x-label>
            <x-input wire:model="education.{{ $gradeLevel }}.school_year"
            id="school_year_{{ $gradeLevel }}" />
        </div>
    </x-grid>
@endfor
