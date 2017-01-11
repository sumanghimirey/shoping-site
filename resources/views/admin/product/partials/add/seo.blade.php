
<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.seo_title') }} </label>

    <div class="col-sm-9">
        <input type="text" name="seo_title" id="seo_title" value="{{ ViewHelper::getData('seo_title', isset($data['row'])?$data['row']:[]) }}" placeholder="Seo Title" class="col-xs-10 col-sm-5">
    </div>
</div>

<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.seo_description') }} </label>

    <div class="col-sm-9">
        <textarea name="seo_description" id="seo_description" cols="50" rows="10">{{ ViewHelper::getData('seo_description', isset($data['row'])?$data['row']:[]) }}</textarea>
    </div>
</div>

<div class="space-4"></div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.seo_keyword') }} </label>

    <div class="col-sm-9">
        <input type="text" name="seo_keyword" id="seo_keyword" value="{{ ViewHelper::getData('seo_keyword', isset($data['row'])?$data['row']:[]) }}" placeholder="Seo Keyword" class="col-xs-10 col-sm-5">
    </div>
</div>

