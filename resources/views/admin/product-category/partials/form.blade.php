<div class="space-4"></div>


<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.title') }} </label>

    <div class="col-sm-9">
        <input type="text" name="title" id="title" value="{{ ViewHelper::getData('title', isset($data['category'])?$data['category']:[]) }}" placeholder="Title" class="col-xs-10 col-sm-5">
    </div>
</div>
<div class="space-4"></div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.short_desc') }} </label>

    <div class="col-sm-9">
        <input type="text" name="short_desc" id="short_desc" value="{{ ViewHelper::getData('short_desc', isset($data['category'])?$data['category']:[]) }}" placeholder="Short Description" class="col-xs-10 col-sm-5">
    </div>
</div>
<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.description') }} </label>

    <div class="col-sm-9">
        <textarea name="long_desc" id="long_desc" cols="50" rows="10">{{ ViewHelper::getData('long_desc', isset($data['category'])?$data['category']:[]) }}</textarea>
    </div>
</div>

@if (isset($data['category']))

    @if ($data['category']->main_image)


        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.edit.existing_banner') }} </label>

            <div class="col-sm-9">
                <img width="200" src="{{ asset('images/category/'.$data['category']->main_image ) }}" alt="">
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
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.main_image') }} </label>

    <div class="col-sm-9">
        <input type="file" name="main_image">
    </div>
</div>
<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.seo_title') }} </label>

    <div class="col-sm-9">
        <input type="text" name="seo_title" id="seo_title" value="{{ ViewHelper::getData('seo_title', isset($data['category'])?$data['category']:[]) }}" placeholder="Seo Title" class="col-xs-10 col-sm-5">
    </div>
</div>

<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.seo_description') }} </label>

    <div class="col-sm-9">
        <textarea name="seo_description" id="seo_description" cols="50" rows="10">{{ ViewHelper::getData('seo_description', isset($data['category'])?$data['category']:[]) }}</textarea>
    </div>
</div>

<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.seo_keyword') }} </label>

    <div class="col-sm-9">
        <input type="text" name="seo_keyword" id="seo_keyword" value="{{ ViewHelper::getData('seo_keyword', isset($data['category'])?$data['category']:[]) }}" placeholder="Seo Keyword" class="col-xs-10 col-sm-5">
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
                elseif (isset($data['category'])) {

                    if ($data['category']->status == 0) {
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
