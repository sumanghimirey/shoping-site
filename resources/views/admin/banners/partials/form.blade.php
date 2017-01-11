<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/banner/general.content.common.alt_text') }} </label>

    <div class="col-sm-9">
        <input type="text" id="textalt" value="{{ ViewHelper::getData('alt_text', isset($data['row'])?$data['row']:[]) }}" name="alt_text"  placeholder="{{ trans('admin/banner/general.content.placeholder.alt_text') }}" class="col-xs-10 col-sm-5">
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/banner/general.content.common.caption') }} </label>

    <div class="col-sm-9">
        <textarea name="caption" id="caption" rows="5" placeholder="{{ trans('admin/banner/general.content.placeholder.caption') }}" class="col-xs-10 col-sm-5">{{ ViewHelper::getData('caption', isset($data['row'])?$data['row']:[]) }}</textarea>
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/banner/general.content.common.image') }} </label>

    <div class="col-sm-9">

        @if(isset($data['row']) && $data['row']->image!=='')
    <img src="{{ url('/images/banner/').'/'.$data['row']->image }}" style="height: 100px; float: left;"><div style="clear: both"></div>
    @endif
        <input type="file" id="image" name="image" class="col-xs-10 col-sm-5">
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/banner/general.content.common.link') }} </label>

    <div class="col-sm-9">
        <input type="text" id="link"  name="link" value="{{ ViewHelper::getData('link', isset($data['row'])?$data['row']:[]) }}" placeholder="{{ trans('admin/banner/general.content.placeholder.link') }}" class="col-xs-10 col-sm-5">
    </div>
</div>


<div class="space-4"></div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/banner/general.content.common.position') }} </label>

    <div class="col-sm-9">
        <input type="text" id="position" name="slider_key" value="{{ ViewHelper::getData('slider_key', isset($data['row'])?$data['row']:[]) }}" placeholder="{{ trans('admin/banner/general.content.placeholder.position') }}" class="col-xs-10 col-sm-5">
    </div>
</div>


<div class="space-4"></div>


<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/banner/general.content.common.status') }} </label>

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
                    <span class="lbl"> {{ trans('admin/banner/general.content.common.active') }}</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input name="status" type="radio" class="ace" {{ $inactive }} value="0">
                    <span class="lbl"> {{ trans('admin/banner/general.content.common.in_active') }}</span>
                </label>
            </div>


        </div>



    </div>
</div>

<div class="space-4"></div>