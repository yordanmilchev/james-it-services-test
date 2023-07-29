<div>
    <!--begin::Portlet-->
    <div class="kt-portlet {{ $showFilters ? '' : 'kt-portlet--collapsed' }}" id="kt_portlet_filters_form">
        <div class="kt-portlet__head kt-ribbon kt-ribbon--success">
            <div class="kt-ribbon__target" style="top: 15px; left: -14px;"><i class="fa fa-search"></i></div>
            <div class="kt-portlet__head-label"
                 onclick="document.getElementById('searchOptionsToggleBtn').click();"
                 style="min-width:70%">
                <h3 class="kt-portlet__head-title">
                    Search by
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-group">
                    <a href="javascript:;" data-ktportlet-tool="toggle" id="searchOptionsToggleBtn"
                       class="btn btn-sm btn-icon btn-outline-brand btn-icon-md"><i
                            class="la la-angle-down"></i></a>
                    <a href="javascript:;" data-ktportlet-tool="reload"
                       class="btn btn-sm btn-icon btn-outline-success btn-icon-md"><i
                            class="la la-refresh"></i></a>
                    <a href="javascript:;" data-ktportlet-tool="remove"
                       class="btn btn-sm btn-icon btn-outline-danger btn-icon-md"><i
                            class="la la-close"></i></a>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="kt-portlet__body" id="filters_form">
            <div class="form-group row">
                <div class="col-lg-4 mt-3">
                    <label>Name:</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">
                                <i class="fas fa-font"></i>
                            </span></div>
                        <input wire:model="name" type="text"
                               class="form-control">

                    </div>
                </div>
            </div>
        </div>
        <!--end::Form-->
    </div>
    <!--end::Portlet-->

    <!--begin::Portlet-->
    <div class="kt-portlet">
        <div class="kt-portlet__body">
            <!--begin::Section-->
            <div class="kt-section">
                <div class="kt-section__content">
                    @include('components.flashes')

                    <div class="table-responsive mb-4 text-right">
                        <button wire:click="create" type="button" class="btn btn-label-brand btn-bold text-right ml-auto" data-toggle="modal" data-target="#edit_task">New Task</button>
                    </div>

                    <div class="table-responsive">
                        {{ $tasks->links() }}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                            <tr>
                                <th wire:click="sortBy('id')" class="text-center font-weight-bold" style="cursor:pointer;">ID
                                    @if($sortField == 'id')
                                        @include('components.sorting_arrow')
                                    @endif
                                </th>
                                <th wire:click="sortBy('name')" class="text-center font-weight-bold" style="cursor:pointer;">Name
                                    @if($sortField == 'name')
                                        @include('components.sorting_arrow')
                                    @endif
                                </th>
                                <th wire:click="sortBy('description')" class="text-center font-weight-bold" style="cursor:pointer;">Description
                                    @if($sortField == 'description')
                                        @include('components.sorting_arrow')
                                    @endif
                                </th>
                                <th wire:click="sortBy('due_date')" class="text-center font-weight-bold" style="cursor:pointer;">Due Date
                                    @if($sortField == 'due_date')
                                        @include('components.sorting_arrow')
                                    @endif
                                </th>
                                <th class="text-center font-weight-bold">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($tasks as $taskItem)
                                <tr>
                                    <td class="text-center" style="width: 1%;">
                                        {{ $taskItem->id }}
                                    </td>
                                    <td class="text-center">
                                        {{ $taskItem->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ $taskItem->description }}
                                    </td>
                                    <td class="text-center">
                                        {{ Carbon\Carbon::parse($taskItem->due_date)->format('d.m.Y') }}
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <button wire:click="edit({{ $taskItem->id }})" role="button" data-toggle="modal" data-target="#edit_task"
                                                class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2"><i
                                                class="flaticon-edit"></i>
                                        </button>

                                        @if($confirming === $taskItem->id)
                                            <button wire:click="delete({{ $taskItem->id }})" role="button"
                                                    class="btn btn-sm btn-success btn-text-success btn-hover-success btn-icon mr-2">
                                                Yes
                                            </button>
                                            <button wire:click="cancelDelete()" role="button"
                                                    class="btn btn-sm btn-danger btn-icon mr-2">
                                                No
                                            </button>
                                        @else
                                            <button wire:click="confirmDelete({{ $taskItem->id }})" role="button"
                                                    class="btn btn-sm btn-danger btn-icon mr-2">
                                                <i class="flaticon-delete"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">No results</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
            <!--end::Section-->
        </div>
    </div>
    <!--end::Portlet-->

    @include('components.task_edit')

</div>
