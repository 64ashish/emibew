<x-app-layout>
    <!-- Main 3 column grid -->
    <div class="grid grid-cols-1 gap-4 items-start lg:gap-8">
        <!-- Left column -->
        <section aria-labelledby="section-1-title">

            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                    <p class="text-left text-sm font-semibold text-white pb-4">
                        SCB Emigranter
                    </p>
                    <div class="inline-block min-w-full py-2 align-middle">

                        <div class="shadow-sm ring-1 ring-black ring-opacity-5">

                            <table class="min-w-full border-separate" style="border-spacing: 0">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50
                                bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900
                                backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">{{ __('Full name') }}</th>
                                    <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50
                                bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur
                                backdrop-filter sm:table-cell"> {{ __('Province') }}</th>
                                    <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50
                                bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur
                                backdrop-filter lg:table-cell"> {{ __('From year') }}</th>
                                    <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50
                                bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur
                                backdrop-filter"> {{ __('Birth year') }}</th>
                                    <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50
                                bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur
                                backdrop-filter">
                                        {{ __('Destination') }}
                                    </th>
                                    <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50
                                bg-opacity-75 text-right py-3.5 pr-4 pl-3 backdrop-blur backdrop-filter sm:pr-6 lg:pr-8">

                                    </th>
                                </tr>
                                </thead>
                                                                    <tbody class="bg-white">
                                                                    @foreach($records as $record)
                                                                        <tr  class="odd:bg-white even:bg-gray-100">
                                                                            <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm
                                                                    font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                                                                {{ $record->first_name }} {{ $record->last_name }}</td>
                                                                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm
                                                                    text-gray-500 hidden sm:table-cell">{{ $record->from_province}}</td>
                                                                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm
                                                                    text-gray-500 hidden lg:table-cell">{{ $record->from_year }}</td>
                                                                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm
                                                                    text-gray-500">{{ $record->birth_year }}</td>
                                                                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm
                                                                    text-gray-500">
                                                                                {{  $record->destination }}
                                                                            </td>
                                                                            <td class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-4 pl-3
                                                                     text-sm text-right font-medium sm:pr-6 lg:pr-8">
                                                                                <a href="{{ route('records.show', ["9",$record]) }}" class="inline-flex text-indigo-700
                                           items-center px-3 py-1.5 text-indigo-700">View</a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                    <!-- More people... -->
                                                                    </tbody>
                            </table>
                            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                            {{ $records->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>
</x-app-layout>
