@extends('layouts.admin')

@section('header', 'View Message')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900">Message Details</h3>
                <p class="text-sm text-gray-500">Sent on {{ $contact->created_at->format('F d, Y \a\t h:i A') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1 p-3 bg-gray-50 rounded-md border border-gray-200">
                        {{ $contact->name }}
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1 p-3 bg-gray-50 rounded-md border border-gray-200">
                        <a href="mailto:{{ $contact->email }}"
                            class="text-indigo-600 hover:underline">{{ $contact->email }}</a>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Message</label>
                <div class="mt-1 p-4 bg-gray-50 rounded-md border border-gray-200 whitespace-pre-wrap">
                    {{ $contact->message }}
                </div>
            </div>

            <div class="flex items-center justify-between">
                <a href="mailto:{{ $contact->email }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Reply via Email
                </a>
                <div class="flex space-x-3">
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
                        onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900 font-bold py-2 px-4">Delete
                            Message</button>
                    </form>
                    <a href="{{ route('admin.contacts.index') }}"
                        class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800 py-2 px-4">
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection