<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.menu') }} </label>

    <div class="col-sm-9">
        <select name="menu_id">
            @if ($data['menu']->count() > 0)
                @foreach($data['menu'] as $menu)

                    @php

                    $selected = '';
                    if(old('menu_id')) {
                        if ($menu->id == old('menu_id'))
                            $selected = 'selected';
                    } elseif (isset($data['row']) && $data['row']->menu_id == $menu->id) {
                        $selected = 'selected';
                    }

                    @endphp

                    <option value="{{ $menu->id }}" {{ $selected  }} >{{ $menu->title }}</option>
                @endforeach
            @else
                <option value="0">No Menu Added</option>
            @endif
        </select>
    </div>
</div>

<div class="space-4"></div>


<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.title') }} </label>

    <div class="col-sm-9">
        <input type="text" name="title" id="title" value="{{ ViewHelper::getData('title', isset($data['row'])?$data['row']:[]) }}" placeholder="Title" class="col-xs-10 col-sm-5">
    </div>
</div>

<div class="space-4"></div>


@if (isset($data['row']))

    @if ($data['row']->banner)


        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.edit.existing_banner') }} </label>

            <div class="col-sm-9">
                <img width="200" src="{{ asset('images/page/'.$data['row']->banner ) }}" alt="">
            </div>
        </div>


        @else

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.edit.existing_banner') }} </label>

            <div class="col-sm-9">
                <p>No Banner Uploaded.</p>
            </div>
        </div>

        @endif

    @endif


<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.banner') }} </label>

    <div class="col-sm-9">
        <input type="file" name="banner">
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.description') }} </label>

    <div class="col-sm-9">
        <textarea name="description" id="description" cols="50" rows="10">{{ ViewHelper::getData('description', isset($data['row'])?$data['row']:[]) }}</textarea>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.status') }} </label>

    <div class="col-sm-9">

        <div class="control-group">

           @php
                $active = 'checked';
                $inactive = '';

                if (old('status')) {
                    if (old('status') == 0) {
                        $inactive = 'checked';
                        $active = '';
                    }
                }
                elseif (isset($data['row'])) {

                    if ($data['row']->status == 0) {
                        $inactive = 'checked';
                        $active = '';
                    }

                }

            @endphp

            <div class="radio">
                <label>
                    <input name="status" {{ $active }} type="radio" class="ace" value="1">
                    <span class="lbl"> {{ trans($trans_path.'content.common.active') }}</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input name="status" {{ $inactive }} type="radio" class="ace" value="0">
                    <span class="lbl"> {{ trans($trans_path.'content.common.in_active') }}</span>
                </label>
            </div>


        </div>



    </div>
</div>

<div class="space-4"></div>