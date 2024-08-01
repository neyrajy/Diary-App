<div>
    <div class="mb-4 flex justify-between items-center">
        <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Search...">
        <select wire:model="sortBy" class="form-control ml-2">
            <option value="id_asc">ID (Asc)</option>
            <option value="id_desc">ID (Desc)</option>
            <option value="firstname_asc">Parent Name (Asc)</option>
            <option value="firstname_desc">Parent Name (Desc)</option>
            <option value="fees_paid_asc">Fees Paid (Low to High)</option>
            <option value="fees_paid_desc">Fees Paid (High to Low)</option>
        </select>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Parent Name</th>
                    <th>Child's Name</th>
                    <th>Mobile Phone</th>
                    <th>Address</th>
                    <th>Fee Paid (TZS)</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parents as $parent)
                <tr>
                    <td>{{ $parent->id }}</td>
                    <td>{{ $parent->firstname }} {{ $parent->lastname }}</td>
                    <td>Alisha Abel</td>
                    <td>{{ $parent->phone }}</td>
                    <td>{{ $parent->address }}</td>
                    <td>100000/=</td>
                    <td>
                        <a href="{{ route('superadmin.edit-parent', $parent->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('superadmin.destroy-parent', $parent->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    {{ $parents->links() }}
</div>
