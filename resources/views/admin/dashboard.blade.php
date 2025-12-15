@extends('layouts.admin')

@section('header', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Projects -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Projects</div>
                <div class="mt-2 flex items-baseline">
                    <div class="text-3xl font-semibold text-gray-900">{{ $projectCount }}</div>
                </div>
            </div>
        </div>

        <!-- Experiences -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="text-gray-500 text-sm font-medium uppercase tracking-wide">Experiences</div>
                <div class="mt-2 flex items-baseline">
                    <div class="text-3xl font-semibold text-gray-900">{{ $experienceCount }}</div>
                </div>
            </div>
        </div>

        <!-- Skills -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="text-gray-500 text-sm font-medium uppercase tracking-wide">Skills</div>
                <div class="mt-2 flex items-baseline">
                    <div class="text-3xl font-semibold text-gray-900">{{ $skillCount }}</div>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="text-gray-500 text-sm font-medium uppercase tracking-wide">Messages</div>
                <div class="mt-2 flex items-baseline">
                    <div class="text-3xl font-semibold text-indigo-600">{{ $messageCount }}</div>
                    <div class="ml-2 text-sm text-gray-500">Unread</div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Recent Messages</h3>
            <div class="mt-4">
                @if(count($recentContacts) > 0)
                    <ul class="divide-y divide-gray-200">
                        @foreach($recentContacts as $contact)
                            <li class="py-4">
                                <div class="flex space-x-3">
                                    <div class="flex-1 space-y-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-sm font-medium">{{ $contact->name }}</h3>
                                            <p class="text-sm text-gray-500">{{ $contact->created_at->diffForHumans() }}</p>
                                        </div>
                                        <p class="text-sm text-gray-500">{{ Str::limit($contact->message, 100) }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        <a href="{{ route('admin.contacts.index') }}"
                            class="text-sm font-medium text-indigo-600 hover:text-indigo-500">View all messages &rarr;</a>
                    </div>
                @else
                    <p class="text-gray-500">No messages yet.</p>
                @endif
            </div>
        </div>
    </div>
@endsection