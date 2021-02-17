<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">Students List</div>
                <form method="POST" action="/search/">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control" />
                    <a href='/search/' class="form-label" for="form1">Search</a>
                </div>
                </form>
                <div class="flex-auto text-right mt-2">
                    <a href="/student" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new Student</a>
                </div>
            </div>
            <table class="w-full text-md rounded mb-4">
            <thead>
                <tr class="border-b">
                    <th class="text-left p-4 px-5">First Name</th>
                    <th class="text-left p-4 px-5">Last Name</th>
                    <th class="text-left p-4 px-5">Phone</th>
                    <th class="text-left p-4 px-5">Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach(auth()->user()->students as $student)
                <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 px-5">
                        {{$student->first_name}}
                    </td>
                    <td class="p-3 px-5">
                        {{$student->last_name}}
                    </td>
                    <td class="p-3 px-5">
                        {{$student->phone}}
                    </td>
                    <td class="p-3 px-5">
                        {{$student->email}}
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>
</x-app-layout>
