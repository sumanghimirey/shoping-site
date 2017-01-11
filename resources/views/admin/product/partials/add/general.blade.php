<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.category') }} </label>

    <div class="col-sm-9">
        <select name="category_id" class="col-sm-5">
            @if ($data['category']->count() > 0)
                @foreach($data['category'] as $category)

                    @php

                        $selected = '';
                        if(old('category_id')) {
                            if ($category->id == old('category_id'))
                                $selected = 'selected';
                        } elseif (isset($data['row']) && $data['row']->category_id == $category->id) {
                            $selected = 'selected';
                        }

                    @endphp

                    <option value="{{ $category->id }}" {{ $selected  }} >{{ $category->title }}</option>
                @endforeach
            @else
                <option value="0">No category Added</option>
            @endif
        </select>
    </div>
</div>

<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="name"> {{ trans($trans_path.'content.common.name') }} </label>

    <div class="col-sm-9">
        <input type="text" name="name" id="name" value="{{ ViewHelper::getData('name', isset($data['row'])?$data['row']:[]) }}" placeholder="Name" class="col-xs-10 col-sm-12">
    </div>
</div>
<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.old_price') }} </label>

    <div class="col-sm-9">
        <input type="text" name="old_price" id="old_price" value="{{ ViewHelper::getData('old_price', isset($data['row'])?$data['row']:[]) }}" placeholder="Old Price" class="col-xs-10 col-sm-5">
    </div>
</div>
<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.new_price') }} </label>

    <div class="col-sm-9">
        <input type="text" name="new_price" id="new_price" value="{{ ViewHelper::getData('new_price', isset($data['row'])?$data['row']:[]) }}" placeholder="New Price" class="col-xs-10 col-sm-5">
    </div>
</div>
<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.quantity') }} </label>

    <div class="col-sm-9">
        <input type="number" min="0" max="100" name="quantity" id="quantity" value="{{ ViewHelper::getData('quantity', isset($data['row'])?$data['row']:[]) }}" placeholder="Quantity" class="col-xs-10 col-sm-5">
    </div>
</div>
<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.short_desc') }} </label>

    <div class="col-sm-9">
        <textarea name="short_desc" id="short_desc" cols="50" rows="10">{{ ViewHelper::getData('short_desc', isset($data['row'])?$data['row']:[]) }}</textarea>
    </div>
</div>
<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.long_desc') }} </label>

    <div class="col-sm-9">
        <textarea name="long_desc" id="long_desc" cols="50" rows="10">{{ ViewHelper::getData('long_desc', isset($data['row'])?$data['row']:[]) }}</textarea>
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