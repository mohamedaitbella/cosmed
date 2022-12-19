<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form action="{{route('configuration.update')}}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 items-center">
                        <x-contact.label for="email" :value="__('Eemail de réception contacts :')"  />
                        <input value="{{$email}}"  name="email" class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-800 col-span-3" />

                        <x-contact.error :messages="$errors->get('email')" class="mt-2" />
                        
                            <button type="submit"
                            class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
