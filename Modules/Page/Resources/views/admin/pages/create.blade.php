@extends('layouts.master')

@section('content-header')
<h1>
    {{ trans('page::pages.create page') }}
</h1>
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{
            trans('core::core.breadcrumb.home') }}</a></li>
    <li><a href="{{ URL::route('admin.page.page.index') }}">{{ trans('page::pages.pages') }}</a></li>
    <li class="active">{{ trans('page::pages.create page') }}</li>
</ol>
@stop

@push('css-stack')
<style>
    .checkbox label {
        padding-left: 0;
    }
</style>
@endpush

@section('content')
{!! Form::open(['route' => ['admin.page.page.store'], 'method' => 'post']) !!}
<input type="hidden" name="type" value="page">
<div class="row">
    <div class="col-md-10">
        <div class="nav-tabs-custom">
            @include('partials.form-tab-headers', ['fields' => ['title', 'body']])
            <div class="tab-content">
                <?php $i = 0; ?>
                <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                <?php ++$i; ?>
                <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                    @include('page::admin.pages.partials.create-fields', ['lang' => $locale])
                </div>
                <?php endforeach; ?>
                <?php if (config('asgard.page.config.partials.normal.create') !== []): ?>
                <?php foreach (config('asgard.page.config.partials.normal.create') as $partial): ?>
                @include($partial)
                <?php endforeach; ?>
                <?php endif; ?>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create')
                        }}</button>
                    <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('admin.page.page.index')}}"><i
                            class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                </div>
            </div>
        </div> {{-- end nav-tabs-custom --}}
    </div>
    <div class="col-md-2">
        <div class="box box-primary">
            <div class="box-body">
                <div class="checkbox{{ $errors->has('is_home') ? ' has-error' : '' }}">
                    <input type="hidden" name="is_home" value="0">
                    <label for="is_home">
                        <input id="is_home" name="is_home" type="checkbox" class="flat-blue" value="1" />
                        {{ trans('page::pages.form.is homepage') }}
                        {!! $errors->first('is_home', '<span class="help-block">:message</span>') !!}
                    </label>
                </div>
                <hr />
                <div class='form-group{{ $errors->has("template") ? ' has-error' : '' }}'>
                    {!! Form::label("template", trans('page::pages.form.template')) !!}
                    {!! Form::select("template", $page_templates, old("template", 'page.default'), ['class' =>
                    "form-control", 'placeholder' => trans('page::pages.form.template')]) !!}
                    {!! $errors->first("template", '<span class="help-block">:message</span>') !!}
                </div>
                <hr>
                @tags('asgardcms/page')
                <hr>
                @mediaSingle('page_featured_image')
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@stop

@section('footer')
<a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
<dl class="dl-horizontal">
    <dt><code>b</code></dt>
    <dd>{{ trans('page::pages.navigation.back to index') }}</dd>
</dl>
@stop

@push('js-stack')
<script>
    $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.page.page.index') ?>" }
                ]
            });
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
</script>
@endpush