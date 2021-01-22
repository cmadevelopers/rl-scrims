<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Rl Rank Id</th>
        <th>Team Id</th>
        <th>Password</th>
        <th>Email</th>
        <th>Name</th>
        <th>Username</th>
        <th>Steamid</th>
        <th>Nick</th>
        <th>Platform</th>
        <th>Rank Status</th>
        <th>Bio</th>
        <th>Picture</th>
        <th>Cover</th>
        <th>Email Verified At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->rl_rank_id }}</td>
            <td>{{ $user->team_id }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->steamid }}</td>
            <td>{{ $user->nick }}</td>
            <td>{{ $user->platform }}</td>
            <td>{{ $user->rank_status }}</td>
            <td>{{ $user->bio }}</td>
            <td>{{ $user->picture }}</td>
            <td>{{ $user->cover }}</td>
            <td>{{ $user->email_verified_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
