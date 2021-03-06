@extends('global.master')

@section('content')
{!! Form::open(['action' => 'Content\ThumbnailController@saveThumbnail']) !!}
<input type="hidden" name="id" value="{!! $content->hashId() !!}">

<select class="image-picker" name="thumbnail">
    <option value=""></option>
    @foreach ($thumbnails as $id => $thumbnail)
        <option data-img-src="{!! $thumbnail !!}" value="{!! $id !!}"></option>
    @endforeach
</select>

<div class="form-group col-lg-12">
    <button type="submit" class="btn btn-secondary btn-primary pull-right">Zapisz</button>
</div>

{!! Form::close() !!}
@stop

@section('sidebar')

@stop
