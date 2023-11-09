@section('content')
    <div class="container">
        <h1>Assign Role to User</h1>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('assignRole') }}">
            @csrf

            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="role">Select Role:</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="guest">Guest</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Assign Role</button>
        </form>
    </div>
@endsection
