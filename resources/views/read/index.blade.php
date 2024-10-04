<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('message.read') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="GET" action="{{ route('read.index') }}">
                        <div class="mb-4">
                            <label for="search" class="form-label">{{ __('message.searchUser') }}</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="{{ __('message.enterUserName') }}" value="{{ request('search') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('message.search') }}</button>
                    </form>
                    <table class="table-auto" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="text-align: unset">{{__('message.number')}}</th>
                                <th style="text-align: unset">{{__('message.userName')}}</th>
                                <th style="text-align: unset">{{__('message.bookname')}}</th>
                                <th style="text-align: unset">{{__('message.BookingPeriod')}}</th>
                                <th style="text-align: unset">{{__('message.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reades as $read)
                                <tr>
                                    <td>{{ $read->id }}</td>
                                    <td>{{ $read->user->name  }}</td>
                                    <td>{{ $read->book->title  }}</td>
                                    <td>{{ $read->BookingPeriod }}</td>
                                    <td>
                                         <!-- Edit Button -->
                                         <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $read->id }}">{{ __('message.edit') }}</button>
                                        
                                         <!-- Delete Button -->
                                         <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $read->id }}">{{ __('message.delete') }}</button>
                     
                                         <!-- Edit Modal -->
                                         <div class="modal fade" id="editModal{{ $read->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $read->id }}" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h5 class="modal-title" id="editModalLabel{{ $read->id }}">{{ __('message.editform') }}</h5>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                     </div>
                                                     <div class="modal-body">
                                                         <form action="{{ route('reads.update', $read->id) }}" method="POST">
                                                             @csrf
                                                             @method('PUT')
                                                             <div class="mb-3">
                                                                <label for="user_id" class="form-label">{{ __('message.userName') }}</label>
                                                                <select class="form-select" id="user_id" name="user_id">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}" {{ $user->id == $read->user_id ? 'selected' : '' }}>
                                                                            {{ $user->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>                                                                
                                                             </div>
                                                             <div class="mb-3">
                                                                 <label for="book_id" class="form-label">{{ __('message.book_id') }}</label>
                                                                 <select class="form-select" id="book_id" name="book_id">
                                                                    @foreach ($books as $book)
                                                                        <option value="{{ $book->id }}" {{ $book->id == $read->book_id ? 'selected' : '' }}>
                                                                            {{ $book->title }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>                                                                
                                                             </div>
                                                             <div class="mb-3">
                                                                 <label for="BookingPeriod" class="form-label">{{ __('message.BookingPeriod') }}</label>
                                                                 <input type="date" class="form-control" id="BookingPeriod" name="BookingPeriod" value="{{$read->BookingPeriod}}" required/>
                                                             </div>
                                                             <button type="submit" class="btn btn-warning">{{ __('message.edit') }}</button>
                                                         </form>
                                                     </div>
                                                     <div class="modal-footer">
                                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.close') }}</button>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                     
                                         <!-- Delete Modal -->
                                         <div class="modal fade" id="deleteModal{{ $read->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $read->id }}" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h5 class="modal-title" id="deleteModalLabel{{ $read->id }}">{{ __('message.deleteform') }}</h5>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                     </div>
                                                     <div class="modal-body">
                                                         {{ __('message.deleteconfirmation') }}
                                                     </div>
                                                     <div class="modal-footer">
                                                         <form action="{{ route('reads.destroy', $read->id) }}" method="POST">
                                                             @csrf
                                                             @method('DELETE')
                                                             <button type="submit" class="btn btn-danger">{{ __('message.delete') }}</button>
                                                         </form>
                                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.close') }}</button>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
