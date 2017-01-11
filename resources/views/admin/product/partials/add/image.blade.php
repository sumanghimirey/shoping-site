
<div class="space-4"></div>

@if (isset($data['row']))

    @if ($data['row']->main_image)


        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.edit.existing_banner') }} </label>

            <div class="col-sm-9">
                <img width="200" src="{{ asset('images/product/'.$data['row']->main_image ) }}" alt="">
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



<div class="form-group col-sm-12">

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Image</th>
            <th>Caption</th>
            <th>Alt Text</th>
            <th>Rank</th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>

        <tbody id="gallery-image-row-wrapper">


        </tbody>
    </table>

    <table class="table table-striped table-bordered table-hover">
        <tbody>
        <tr>
            <td>
                <div class="btn-group">
                    <a id="gallery-image-add-btn" class="btn btn-xs btn-primary" style="float: right !important;">
                        <i class="icon-plus bigger-120"></i>
                    </a>
                </div>

            </td>
        </tr>


        </tbody>
    </table>
</div>
