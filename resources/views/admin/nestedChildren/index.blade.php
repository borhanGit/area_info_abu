@extends('layouts.admin')
@section('content')
@can('nested_child_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.nested-children.create') }}">
                পরবর্তী সন্তান অ্যাড করুন
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        পরবর্তী সন্তানের তালিকা 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-NestedChild">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            সিরিয়াল নম্বর 
                        </th>
                        <th>
                            পিতা/মাতার নাম 
                        </th>
                        <th>
                            সন্তানের নাম 
                        </th>
                        <th>
                            বয়স 
                        </th>
                        <th>
                            পড়াশুনা করে কি না 
                        </th>
                        <th>
                            কি পড়াশুনা করছে 
                        </th>
                        <th>
                            পড়াশুনার জায়গার নাম 
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nestedChildren as $key => $nestedChild)
                        <tr data-entry-id="{{ $nestedChild->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $nestedChild->id ?? '' }}
                            </td>
                            <td>
                                {{ $nestedChild->children->children_name ?? '' }}
                            </td>
                            <td>
                                {{ $nestedChild->name ?? '' }}
                            </td>
                            <td>
                                {{ $nestedChild->age ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\NestedChild::STUDY_RADIO[$nestedChild->study] ?? '' }}
                            </td>
                            <td>
                                {{ $nestedChild->study_stage ?? '' }}
                            </td>
                            <td>
                                {{ $nestedChild->study_place ?? '' }}
                            </td>
                            <td>
                                @can('nested_child_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.nested-children.show', $nestedChild->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('nested_child_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.nested-children.edit', $nestedChild->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('nested_child_delete')
                                    <form action="{{ route('admin.nested-children.destroy', $nestedChild->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('nested_child_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.nested-children.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-NestedChild:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection