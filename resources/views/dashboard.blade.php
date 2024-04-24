<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Workers') }}
        </h2>
    </x-slot>
    <div class="container">
        <form action="{{route('workers.store')}}" method="POST">
            @csrf
            <div class="border-b border-gray-900/10 pb-2">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="text" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                        <div class="mt-2">
                            <input type="text" name="phone" id="text" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="birth" class="block text-sm font-medium leading-6 text-gray-900">Birthday</label>
                        <div class="mt-2">
                            <input type="date" name="birth" id="birth" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
                <div class="mt-1 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </div>
        </form>
    </div>

    <div class="w-full container mt-4 border-collapse">
        <table class="table table-striped" >
            <thead class="border-2">
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="border-2">
            @foreach($workers as $worker)
                <tr>
                    <td>{{$worker->id}}</td>
                    <td>{{$worker->name}}</td>
                    <td>{{$worker->phone}}</td>
                    <td>{{$worker->birth}}</td>
                    <td>
                        <button type="button" class="btn btn-link">Update</button>
                        <button type="button" class="btn btn-info">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
