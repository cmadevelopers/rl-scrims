<!-- Rl Rank Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rl_rank_id', 'Rl Rank Id:') !!}
    {!! Form::number('rl_rank_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Team Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_id', 'Team Id:') !!}
    {!! Form::number('team_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 60,'maxlength' => 60]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control','maxlength' => 25,'maxlength' => 25]) !!}
</div>

<!-- Steamid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('steamid', 'Steamid:') !!}
    {!! Form::text('steamid', null, ['class' => 'form-control','maxlength' => 17,'maxlength' => 17]) !!}
</div>

<!-- Nick Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nick', 'Nick:') !!}
    {!! Form::text('nick', null, ['class' => 'form-control','maxlength' => 25,'maxlength' => 25]) !!}
</div>

<!-- Platform Field -->
<div class="form-group col-sm-6">
    {!! Form::label('platform', 'Platform:') !!}
    {!! Form::text('platform', null, ['class' => 'form-control']) !!}
</div>

<!-- Rank Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rank_status', 'Rank Status:') !!}
    {!! Form::text('rank_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Bio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::text('bio', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Picture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('picture', 'Picture:') !!}
    {!! Form::text('picture', null, ['class' => 'form-control','maxlength' => 1024,'maxlength' => 1024]) !!}
</div>

<!-- Cover Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cover', 'Cover:') !!}
    {!! Form::text('cover', null, ['class' => 'form-control','maxlength' => 1024,'maxlength' => 1024]) !!}
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush