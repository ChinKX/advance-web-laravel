<?php

use App\Common;
use App\Division;
?>

<section class="filters">

{!! Form::open([
'route' => ['division.index'],
'method' => 'get',
'class' => 'form-inline'
]) !!}

{!! Form::label('division-code', 'Code', [ 'class' => 'control-label col-sm-3',
]) !!}

{!! Form::text('code', null, [
'id'        => 'division-code',
'class'     => 'form-control',
'maxlength' => 10,
]) !!}


{!! Form::label('division-name', 'Name', [
'class'         => 'control-label col-sm-3',
]) !!}
{!! Form::text('name', null, [
'id'        => 'division-name',
'class'     => 'form-control',
'maxlength' => 100,
]) !!}


{!! Form::label('division-state', 'Division', [
'class'         => 'control-label col-sm-3',
]) !!}

{!! Form::select('state', Common::$states, null, [
	'class' => 'form-control',
	'placeholder' => '- Select State -',
	]) !!}


{!! Form::button('Filter', [
'type'          => 'submit',
'class'         => 'btn btn-primary',
]) !!}

{!! Form::close() !!}
</div>
</section>