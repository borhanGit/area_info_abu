@extends('layouts.admin')
@section('content')
@can('child_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.children.create') }}">
                সন্তান অ্যাড করুন 
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        সন্তানের তালিকা
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Child">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            সিরিয়াল নম্বর 
                        </th>
                        <th>
                            বাড়ি
                        </th>
                        <th>
                            সন্তানের নাম 
                        </th>
                        <th>
                            পেশা 
                        </th>
                        <th>
                            মোবাইল 
                        </th>
                        <th>
                            স্বামী/ স্ত্রী নাম 
                        </th>
                        <th>
                            স্বামী/ স্ত্রী মোবাইল 
                        </th>
                        <th>
                            স্বামী/ স্ত্রী পেশা
                        </th>
                        <th>
                            রক্তের গরূপ
                        </th>
                        <th>
                            সন্তানের সংখ্যা 
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($children as $key => $child)
                        <tr data-entry-id="{{ $child->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $child->id ?? '' }}
                            </td>
                            <td>
                                {{ $child->house->house_name ?? '' }}
                            </td>
                            <td>
                                {{ $child->children_name ?? '' }}
                            </td>
                            <td>
                                {{ $child->profession ?? '' }}
                            </td>
                            <td>
                                {{ $child->mobile_no ?? '' }}
                            </td>
                            <td>
                                {{ $child->spouse_name ?? '' }}
                            </td>
                            <td>
                                {{ $child->spouse_mobile_no ?? '' }}
                            </td>
                            <td>
                                {{ $child->spouse_profession ?? '' }}
                            </td>
                            <td>
                                {{ $child->blood_group ?? '' }}
                            </td>
                            <td>
                                {{ $child->children_number ?? '' }}
                            </td>
                            <td>
                                @can('child_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.children.show', $child->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('child_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.children.edit', $child->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('child_delete')
                                    <form action="{{ route('admin.children.destroy', $child->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('child_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.children.massDestroy') }}",
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
  let table = $('.datatable-Child:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection