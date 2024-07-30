<?php

namespace App\DataTables;

use App\Models\LibModality;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class LibModalityDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->toDateTimeString();
            })
            ->addColumn('updated_at', function ($row) {
                return Carbon::parse($row->updated_at)->toDateTimeString();
            })
            ->addColumn('action', function ($row) {
                return "
                <a class='btn btn-danger btn-xs delete-item' href='#' onclick=' event.preventDefault(); confirmDelete(".$row->id.")'>  
                    <i class='fa fa-trash'></i>    
                </a>
                <a class='btn btn-warning btn-xs' href=".route('lib_modalities.edit', $row->id).">  
                    <i class='fa fa-edit'></i>    
                </a>";
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(LibModality $model): QueryBuilder
    {
        return $model->newQuery()->orderByDesc('created_at');
    }

    public function countRecords(): int
    {
        return LibModality::count();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('payroll-table')
                    ->columns($this->getColumns())
                    ->serverSide(true)
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['excel','pdf', 'print', 'reload'],
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('description'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('action'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'LibModality_' . date('YmdHis');
    }
}
