<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row-reverse  mb-4">
                <a href="{{route('contact.export')}}"    class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Export</a>

            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900">
                  
                    {{-- table --}}
                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Date
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            IP
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Nom
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Prénom
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Email
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Tél
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Ville
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Destinataire
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @isset($contacts)
                                    @foreach($contacts as $contact) 
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                           {{$contact->dateHumain}}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{$contact->ip_visiteur}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$contact->nom}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$contact->prenom}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$contact->email}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$contact->telephone}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$contact->ville}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$contact->destinataireParser}}
                                        </td>

                                    </tr>
                                    @endforeach
                                @endisset
                                </tbody>
                            </table>
                        </div>
                        @isset($contacts)
                        <div class="mt-6">
                            {{ $contacts->links() }}  
                        </div>
                        @endisset
                    {{-- end table --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
