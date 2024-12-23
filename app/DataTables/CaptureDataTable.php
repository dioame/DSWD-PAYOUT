<?php

namespace App\DataTables;

use App\Models\Admin\Capture;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class CaptureDataTable extends DataTable
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
            // ->addColumn('name', function ($row) {
            //     return $row->payroll->name ?? '';
            // })
            // ->addColumn('barangay', function ($row) {
            //     return $row->payroll->barangay ?? '';
            // })
            // ->addColumn('municipality', function ($row) {
            //     return $row->payroll->municipality ?? '';
            // })
            ->addColumn('captured_by', function ($row) {
                return $row->captured_by ?? '';
            })
            ->addColumn('image', function ($row) {
                return ' <div style="width:30px;"><a href="'.asset("storage/" . $row->path).'" target=_blank>
                            <img src="'.asset("storage/" . $row->path).'" alt="" style="max-width:100%;max-height:100%;border-radius:50px;">
                        </a></div>';
            })
            ->addColumn('action', function ($row) {
                return '<a class="btn btn-danger btn-xs delete-item" href="#" onclick=" event.preventDefault(); confirmDelete('.$row->id.')">  <i class="fa fa-trash"></i>    </a>
                <a class="btn btn-warning btn-xs delete-item" href="'.route('capture.edit-form', $row->id).'">  <i class="fa fa-edit"></i> </a>';
            })
            ->setRowId('id')
            ->rawColumns(['image','action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Capture $model): QueryBuilder
    {
        return $model->newQuery()
        ->join('payroll', function ($join) {
            $join->on('capture.payroll_no', '=', 'payroll.payroll_no')
                ->on('capture.municipality', '=', 'payroll.municipality')
                ->on('capture.modality', '=', 'payroll.modality')
                ->on('capture.year', '=', 'payroll.year');
        })
        ->select('capture.*', 'payroll.barangay', 'payroll.name')
        ->orderByDesc('capture.created_at');
    }

    public function countRecords(): int
    {
        return Capture::count();
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
                    // ->minifiedAjax()
                    // ->dom('Bfrtip')
                    // ->orderBy(1)
                    // ->serverSide(true)
                    // ->selectStyleSingle()
                    // ->buttons([
                    //     // Button::make('excel'),
                    //     Button::make('csv'),
                    //     // Button::make('pdf'),
                    //     // Button::make('print'),
                    //     // Button::make('reset'),
                    //     // Button::make('reload')
                    // ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            Column::make('id'),
            Column::make('payroll_no'),
            Column::make('name')->searchable(false),
            Column::make('barangay')->searchable(false), //theres a bug if set to true ongoing fix
            Column::make('municipality'),
            Column::make('modality'),
            Column::make('year'),
            Column::make('captured_by'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('image'),
            Column::make('action'),
        ];
    }

    
    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Capture_' . date('YmdHis');
    }
}
