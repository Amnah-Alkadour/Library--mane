<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('message.book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Button trigger modal for adding book -->
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addBookModal">
                {{ __('message.add') }}
            </button>

            <!-- Modal for adding book -->
            <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addBookModalLabel">{{ __('message.addform') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('books.store') }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <!-- Add form fields for book here -->
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">{{ __('message.categoryname') }}</label>
                                    <select class="form-select" id="categoryId" name="categoryId" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('message.bookname') }}</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="author" class="form-label">{{ __('message.author') }}</label>
                                    <input type="text" class="form-control" id="author" name="author" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">{{ __('message.description') }}</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="history" class="form-label">{{ __('message.history') }}</label>
                                    <input type="date" class="form-control" id="history" name="history" rows="3" required>
                                </div>
                                <div class="mb-3">
                                    <label for="number_page" class="form-label">{{ __('message.numberpage') }}</label>
                                    <input type="number" class="form-control" id="number_page" name="number_page" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">{{ __('message.price') }}</label>
                                    <input type="text" class="form-control" id="price" name="price" required>
                                </div>
                                <div class="mb-3">
                                    <label for="language" class="form-label">{{ __('message.language') }}</label>
                                    <input type="text" class="form-control" id="language" name="language" required>
                                </div>
                                <div class="mb-3">
                                    <label for="state" class="form-label">{{ __('message.state') }}</label>
                                    <input type="text" class="form-control" id="state" name="state" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">{{ __('message.image') }}</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('message.save') }}</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.close') }}</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="text-align: unset">{{ __('message.number') }}</th>
                                <th style="text-align: unset">{{ __('message.categoryname') }}</th>
                                <th style="text-align: unset">{{ __('message.bookname') }}</th>
                                <th style="text-align: unset">{{ __('message.author') }}</th>
                                <th style="text-align: unset">{{ __('message.description') }}</th>
                                <th style="text-align: unset">{{ __('message.history') }}</th>
                                <th style="text-align: unset">{{ __('message.numberpage') }}</th>
                                <th style="text-align: unset">{{ __('message.price') }}</th>
                                <th style="text-align: unset">{{ __('message.language') }}</th>
                                <th style="text-align: unset">{{ __('message.state') }}</th>
                                <th style="text-align: unset">{{ __('message.image') }}</th>
                                <th style="text-align: unset">{{ __('message.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->history }}</td>
                                    <td>{{ $item->number_page }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->language }}</td>
                                    <td>{{ $item->state }}</td>
                                    <td>
                                        <img src="data:image/jpeg;base64,{{ $item->image }}" alt="Image" width="100">
                                    </td>
                                    
                                    <td>
                                        <!-- Edit Button -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">{{ __('message.edit') }}</button>
                                        
                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">{{ __('message.delete') }}</button>

                                        <!-- Edit Modal -->
                                        <div style="color: #000;" class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">{{ __('message.editeform') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('books.update', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <!-- Add form fields for book here with existing values -->
                                                            <div class="mb-3">
                                                                <label for="category_id" class="form-label">{{ __('message.categoryname') }}</label>
                                                                <select class="form-select" id="categoryId" name="categoryId" required>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">{{ __('message.bookname') }}</label>
                                                                <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="author" class="form-label">{{ __('message.author') }}</label>
                                                                <input type="text" class="form-control" id="author" name="author" value="{{ $item->author }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">{{ __('message.description') }}</label>
                                                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $item->description }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="history" class="form-label">{{ __('message.history') }}</label>
                                                                <textarea class="form-control" id="history" name="history" rows="3" required>{{ $item->history }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="number_page" class="form-label">{{ __('message.numberpage') }}</label>
                                                                <input type="number" class="form-control" id="number_page" name="number_page" value="{{ $item->number_page }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="price" class="form-label">{{ __('message.price') }}</label>
                                                                <input type="text" class="form-control" id="price" name="price" value="{{ $item->price }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="language" class="form-label">{{ __('message.language') }}</label>
                                                                <input type="text" class="form-control" id="language" name="language" value="{{ $item->language }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="state" class="form-label">{{ __('message.state') }}</label>
                                                                <input type="text" class="form-control" id="state" name="state" value="{{ $item->state }}" required>
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
                                        <div style="color: #000;" class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">{{ __('message.deleteform') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ __('message.deleteconfirmation') }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('books.destroy', $item->id) }}" method="POST">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
