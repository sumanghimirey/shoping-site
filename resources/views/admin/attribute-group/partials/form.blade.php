
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.title') }} </label>

    <div class="col-sm-9">
        <input type="text" name="title" id="title" value="{{ ViewHelper::getData('title', isset($data['row'])?$data['row']:[]) }}" placeholder="Title" class="col-xs-10 col-sm-5">
    </div>
</div>

<div class="space-4"></div>



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