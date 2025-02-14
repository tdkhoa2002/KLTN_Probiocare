<div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
    {!! Form::label('icon', trans('menu::menu-items.form.icon')) !!}
    {!! Form::text('icon', old('icon', $menuItem->icon), [
        'class' => 'form-control',
        'placeholder' => trans('menu::menu-items.form.icon'),
    ]) !!}
    {!! $errors->first('icon', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">
    {!! Form::label('class', trans('menu::menu-items.form.class')) !!}
    {!! Form::text('class', old('class', $menuItem->class), ['class' => 'form-control']) !!}
    {!! $errors->first('class', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group link-type-depended link-page">
    <label for="page">{{ trans('menu::menu-items.form.page') }}</label>
    <select class="form-control" name="page_id" id="page">
        <option value="">--{{ trans('menu::menu-items.form.choose_page') }}--</option>
        @foreach ($pages as $page)
            @if ($page->type == 'page')
                <option value="{{ $page->id }}" {{ $menuItem->page_id == $page->id ? 'selected' : '' }}>
                    {{ $page->title }}
                </option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group link-type-depended link-post">
    <label for="post">{{ trans('menu::menu-items.menu-type.post') }}</label>
    <select class="form-control" name="post_id" id="post">
        <option value="">--{{ trans('menu::menu-items.form.choose_post') }}--</option>
        @foreach ($pages as $page)
            @if ($page->type == 'post')
                <option value="{{ $page->id }}" {{ $menuItem->page_id == $page->id ? 'selected' : '' }}>
                    {{ $page->title }}
                </option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="parent_id">{{ trans('menu::menu-items.form.parent menu item') }}</label>
    <select class="form-control" name="parent_id" id="parent_id">
        <option value=""></option>
        @foreach ($menuSelect as $parentMenuItemId => $parentMenuItemName)
            @if ($menuItem->id != $parentMenuItemId)
                <option value="{{ $parentMenuItemId }}"
                    {{ $menuItem->parent_id == $parentMenuItemId ? ' selected' : '' }}>{{ $parentMenuItemName }}
                </option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="target">{{ trans('menu::menu-items.form.target') }}</label>
    <select class="form-control" name="target" id="target">
        <option value="_self" {{ $menuItem->target === '_self' ? 'selected' : '' }}>
            {{ trans('menu::menu-items.form.same tab') }}</option>
        <option value="_blank" {{ $menuItem->target === '_blank' ? 'selected' : '' }}>
            {{ trans('menu::menu-items.form.new tab') }}</option>
    </select>
</div>
