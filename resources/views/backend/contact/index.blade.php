@extends('backend.master')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">User Contact Messages</h2>
        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">Total Messages: {{ $messages->count() }}</span>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-emerald-100 text-emerald-800 rounded-lg font-medium text-sm">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-600 text-sm font-semibold uppercase tracking-wider">
                        <th class="p-4">Status</th>
                        <th class="p-4">Sender Details</th>
                        <th class="p-4">Phone No</th>
                        <th class="p-4">Short Message</th>
                        <th class="p-4">Received At</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                    @forelse($messages as $row)
                        <tr x-data="{ 
                                openModal: false, 
                                localStatus: '{{ $row->status }}',
                                markAsRead() {
                                    this.openModal = true;
                                    if(this.localStatus === 'unread') {
                                        fetch('{{ route('admin.messages.markAsRead', $row->id) }}', {
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                'Content-Type': 'application/json'
                                            }
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if(data.success) {
                                                this.localStatus = 'read'; // পেজ রিলোড ছাড়াই স্ক্রিনে Read হয়ে যাবে
                                            }
                                        });
                                    }
                                }
                            }" 
                            class="hover:bg-gray-50/50 transition-colors"
                            :class="localStatus === 'unread' ? 'font-bold bg-blue-50/20' : ''">
                            
                            <td class="p-4">
                                <template x-if="localStatus === 'unread'">
                                    <span class="bg-blue-100 text-blue-700 text-xs px-2.5 py-1 rounded-full">Unread</span>
                                </template>
                                <template x-if="localStatus !== 'unread'">
                                    <span class="bg-gray-100 text-gray-500 text-xs px-2.5 py-1 rounded-full">Read</span>
                                </template>
                            </td>

                            <td class="p-4">
                                <div class="text-gray-900">{{ $row->name }}</div>
                                <div class="text-xs text-gray-400 font-normal mt-0.5">{{ $row->email }}</div>
                            </td>
                            <td class="p-4 font-mono text-gray-600">{{ $row->phone }}</td>
                            <td class="p-4 text-gray-500 font-normal">
                                {{ Str::limit($row->message, 40) }}
                            </td>
                            <td class="p-4 text-xs text-gray-400 font-normal font-mono">{{ $row->created_at->format('d M Y, h:i A') }}</td>
                            
                            <td class="p-4 text-center flex items-center justify-center gap-2">
                                <button @click="markAsRead()" class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1.5 rounded transition-all">
                                    View
                                </button>
                                
                                <form action="{{ route('admin.messages.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-rose-500 hover:bg-rose-600 text-white text-xs px-3 py-1.5 rounded transition-all">
                                        Delete
                                    </button>
                                </form>

                                <div x-show="openModal" 
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-x-hidden overflow-y-auto bg-black/50"
                                     style="display: none;">
                                    
                                    <div @click.away="openModal = false" 
                                         x-transition:enter="transition ease-out duration-300"
                                         x-transition:enter-start="opacity-0 scale-90"
                                         x-transition:enter-end="opacity-100 scale-100"
                                         class="relative w-full max-w-2xl bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden text-left font-normal">
                                        
                                        <div class="bg-gray-50 p-5 border-b border-gray-100 flex justify-between items-center">
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-800">Message from {{ $row->name }}</h3>
                                                <p class="text-xs text-gray-400 mt-0.5">Received: {{ $row->created_at->format('d M Y, h:i A') }}</p>
                                            </div>
                                            <button @click="openModal = false" class="text-gray-400 hover:text-gray-600 font-bold text-xl">&times;</button>
                                        </div>
                                        
                                        <div class="p-6 space-y-6">
                                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-gray-50/50 p-4 rounded-xl border border-gray-100">
                                                <div>
                                                    <span class="text-[11px] text-gray-400 block uppercase font-semibold tracking-wider">Full Name</span>
                                                    <strong class="text-gray-800 text-sm">{{ $row->name }}</strong>
                                                </div>
                                                <div>
                                                    <span class="text-[11px] text-gray-400 block uppercase font-semibold tracking-wider">Email Address</span>
                                                    <strong class="text-gray-800 text-sm font-mono break-all">{{ $row->email }}</strong>
                                                </div>
                                                <div>
                                                    <span class="text-[11px] text-gray-400 block uppercase font-semibold tracking-wider">Phone Number</span>
                                                    <strong class="text-gray-800 text-sm font-mono">{{ $row->phone }}</strong>
                                                </div>
                                            </div>

                                            <div>
                                                <span class="text-[11px] text-gray-400 block uppercase font-semibold tracking-wider mb-2">Message</span>
                                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-gray-700 text-sm leading-relaxed whitespace-pre-line max-h-60 overflow-y-auto">
                                                    {{ $row->message }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bg-gray-50 p-4 border-t border-gray-100 flex justify-end">
                                            <button @click="openModal = false" class="bg-gray-200 hover:bg-gray-300 text-gray-700 text-xs font-semibold px-4 py-2 rounded-lg transition-all">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="p-8 text-center text-gray-400 italic">No messages received yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection