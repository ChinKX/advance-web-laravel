<?php

use App\Common;
use App\Division;
?>

<section class="filters">

{!! Form::open([
'route' => ['member.index'],
'method' => 'get',
'class' => 'form-inline'
]) !!}

{!! Form::label('member-membership_no', 'Membership
No.', [ 'class' => 'control-label col-sm-3',
]) !!}

{!! Form::text('membership_no', null, [
'id'        => 'member-membership_no',
'class'     => 'form-control',
'maxlength' => 10,
]) !!}

{!! Form::label('member-nric', 'NRIC
No.', ['class'         => 'control-label col-sm-3',
]) !!}

{!! Form::text('nric', null, [
'id'        => 'member-nric',
'class'     => 'form-control',
'maxlength' => 12,
]) !!}

{!! Form::label('member-name', 'Name', [
'class'         => 'control-label col-sm-3',
]) !!}
{!! Form::text('name', null, [
'id'        => 'member-name',
'class'     => 'form-control',
'maxlength' => 100,
]) !!}

{!! Form::label('member-gender', 'Gender', [
'class'         => 'control-label col-sm-3',
]) !!}

{!! Form::select('gender', Common::$genders, null, [
'class'         => 'form-control',
'placeholder'   => '-All-',
]) !!}

{!! Form::label('member-division_id', 'Division', [
'class'         => 'control-label col-sm-3',
]) !!}

{!! Form::select('division_id',
Division::pluck('name', 'id'),
null, ['class'         => 'form-control',
'placeholder'   => '-All-',
]) !!}


{!! Form::button('Filter', [
'type'          => 'submit',
'class'         => 'btn btn-primary',
]) !!}

{!! Form::close() !!}
</div>
</section>