<?php

use App\Common;
use App\Group;
?>

<section class="filters">

{!! Form::open([
'route' => ['group.index'],
'method' => 'get',
'class' => 'form-inline'
]) !!}

{!! Form::label('group-name', 'Name', [
'class'         => 'control-label col-sm-3',
]) !!}
{!! Form::text('name', null, [
'id'        => 'division-name',
'class'     => 'form-control',
'maxlength' => 100,
]) !!}


{!! Form::button('Filter', [
'type'          => 'submit',
'class'         => 'btn btn-primary',
]) !!}

{!! Form::close() !!}
</div>
</section>