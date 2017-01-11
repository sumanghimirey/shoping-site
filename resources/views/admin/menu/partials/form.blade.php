
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.title') }} </label>

    <div class="col-sm-9">
        <input type="text" name="title" id="title" value="{{ ViewHelper::getData('title', isset($data['row'])?$data['row']:[]) }}" placeholder="Title" class="col-xs-10 col-sm-5">
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans($trans_path.'content.common.pages') }} </label>

    <div class="col-sm-9">

        <select class="form-control" name="pages[]"  multiple="multiple">
            @if (isset($data['pages']) && $data['pages']->count() > 0)

                @foreach($data['pages'] as $page)
                    <option value="{{ $page->id }}" {{ isset($data['row'])?ViewHelper::checkPageExistOnMenu($page, $data['row']->pages):'' }}>{{ $page->title }}</option>
                @endforeach

                @else

                <option value="0">No Pages</option>

            @endif
        </select>


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

<hr>

<div class="form-group">

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Page</th>
            <th>Order</th>
            <th></th>
        </tr>
        </thead>

        <tbody id="mult-page-row-wrapper">

        @if (!isset($data['row']))

            <tr>

                    <td>
                        <select name="page[]">
                            @if (isset($data['pages']))

                                @foreach($data['pages'] as $page)

                                    <option value="{{ $page->id }}">{{ $page->title }}</option>

                                @endforeach

                                @endif

                        </select>
                    </td>
                    <td><input type="number" min="0" name="page_order[]"></td>
                    <td>
                        <div class="btn-group">

                            <a href="javascript:void(0);" class="btn btn-xs btn-danger remove-btn">
                                <i class="icon-trash bigger-120"></i>
                            </a>
                        </div>

                    </td>
                </tr>

            @else


            @if (isset($data['menu_page']))

                @foreach($data['menu_page'] as $menu_page)



                    <tr>

                        <td>
                            <select name="page[]">
                                @if (isset($data['pages']))

                                    @foreach($data['pages'] as $page)

                                        <option value="{{ $page->id }}" {{ ($page->id == $menu_page->id)?"selected":"" }}>{{ $page->title }}</option>

                                    @endforeach

                                @endif

                            </select>
                        </td>
                        <td><input type="number" min="0" name="page_order[]" value="{{ $menu_page->page_order }}"></td>
                        <td>
                            <div class="btn-group">

                                <a href="javascript:void(0);" class="btn btn-xs btn-danger remove-btn">
                                    <i class="icon-trash bigger-120"></i>
                                </a>
                            </div>

                        </td>
                        <input type="hidden" name="menu_pages_id[]" value="{{ $menu_page->menu_pages_id }}">
                    </tr>



                    @endforeach

                @endif


        @endif


        </tbody>
    </table>

    <table class="table table-striped table-bordered table-hover">
        <tbody>
        <tr>
            <td>
                <div class="btn-group">
                    <a id="multi-page-add-btn" class="btn btn-xs btn-primary" style="float: right !important;">
                        <i class="icon-plus bigger-120"></i>
                    </a>
                </div>

            </td>
        </tr>


        </tbody>
    </table>
</div>
