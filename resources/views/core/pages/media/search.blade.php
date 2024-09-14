<x-layout>
    <h1 class="text-5xl font-bold text-primary mb-8">Multimedia Search</h1>
    <fieldset>
        <legend class="text-2xl font-bold text-primary">Search Criteria</legend>
        <form method="get" action="/media/search" class="grid grid-col-1 gap-4">
            <div>
                <label class="text-lg" for="test-search-2">Search Taxa</label>
                <div class="flex items-center group">
                    <x-select class="rounded-r-none w-48">
                        <option value="Any Name">Any Name</option>
                        <option value="Scientific Name">Scientific Name</option>
                        <option value="Family">Family</option>
                        <option value="Taxonomy Group">Taxonomy Group</option>
                        <option value="Common">Common</option>
                    </x-select>
                    <x-autocomplete-input id="test-search-2" placeholder="Type to search..." search="/api/taxa/search">
                        <x-slot:input class="w-80 peer-input p-1 z-10 bg-base-200 rounded-l-none border-l-0"></x-slot>
                            <x-slot:menu class="w-80">Menu</x-slot>
                    </x-autocomplete-input>
                </div>
            </div>

            <x-checkbox name="usethes" label="Include Synonyms" :default_value="request('usethes')" />

            <x-select label="Creator">
                <option value="1">Dummy Creator 1</option>
                <option value="2">Dummy Creator 2</option>
            </x-select>

            <div class="grid grid-cols-2 grid-row-1">
                <div>
                    <x-select label="Multimedia Tags">
                        <option value="1">with</option>
                        <option value="2">without</option>
                    </x-select>
                </div>
                <div class="align-bottom mt-auto">
                    <x-select>
                        <option value="1">Tag 1</option>
                        <option value="2">Tag 2</option>
                    </x-select>
                </div>
            </div>

            <x-radio name="resource_counts" :default_value="request('resource_counts') ?? 'all_multimedia'" label="Multimedia Tags" :options="[
                [ 'value' => 'all_multimedia', 'label' => 'All Multimedia' ],
                [ 'value' => 'one_per_taxon', 'label' => 'One per taxon' ],
                [ 'value' => 'one_per_spec', 'label' => 'One per specimen' ],
            ]">
            </x-radio>

            <x-radio name="resource_type" :default_value="request('resource_type') ?? 'all_multimedia'" label="Resource Type" :options="[
                [ 'value' => 'all_multimedia', 'label' => 'All Multimedia' ],
                [ 'value' => 'one_per_taxon', 'label' => 'Specimen/Vouchered Multimedia' ],
                [ 'value' => 'one_per_spec', 'label' => 'Field Multimedia (lacking specific locality details)' ],
            ]">
            </x-radio>

            <x-radio name="media_type" :default_value="request('media_type') ?? 'all'" label="Multimedia Type" :options="[
                [ 'value' => 'all', 'label' => 'All' ],
                [ 'value' => 'image', 'label' => 'Image' ],
                [ 'value' => 'audio', 'label' => 'Audio' ],
            ]">
            </x-radio>

            <x-select label="Page Count">
                <option value="200">200</option>
                <option value="400">400</option>
                <option value="600">600</option>
                <option value="800">800</option>
                <option value="1000">1000</option>
            </x-select>
            <x-button type="submit">
                Load Multimedia
            </x-button>
        </form>
        <div id="photo-gallery" class="flex flex-wrap flex-row gap-3">
            @for ($i = 0; $i < 30; $i++) <div id="{{ $i }}">
                <img class="max-w-48"
                    src="https://api.idigbio.org/v2/media/12102b9f6e3c7c28f182644921d7c96f?size=thumbnail" />
        </div>
        @endfor

        </div>
    </fieldset>
</x-layout>
