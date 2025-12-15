@extends('layouts.admin')

@section('header', 'Messages')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Name
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Email
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Date
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr class="{{ !$contact->is_read ? 'bg-indigo-50' : '' }}">
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-medium">{{ $contact->name }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $contact->email }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $contact->created_at->format('M d, Y H:i') }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.contacts.show', $contact) }}"
                                        class="text-indigo-600 hover:text-indigo-900">View</a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $contacts->links() }}
            </div>
            @if($contacts->isEmpty())
                <div class="text-center py-4 text-gray-500">No messages found.</div>
            @endif
        </div>
    </div>
@endsection