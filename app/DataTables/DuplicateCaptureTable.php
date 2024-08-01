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
use Illuminate\Support\Facades\DB;

class DuplicateCaptureTable extends DataTable
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
            ->addColumn('name', function ($row) {
                return $row->payroll->name ?? '';
            })
            ->addColumn('image', function ($row) {
                return ' <div style="width:30px;"><a href="'.asset("storage/" . $row->path).'" target=_blank>
                            <img src="'.asset("storage/" . $row->path).'" alt="" style="max-width:100%;max-height:100%;border-radius:50px;">
                        </a></div>';
            })
            ->addColumn('action', function ($row) {
                return '<a class="btn btn-danger btn-xs delete-item" href="#" onclick=" event.preventDefault(); confirmDelete('.$row->id.')">  <i class="fa fa-trash"></i>    </a>
                <a class="btn btn-warning btn-xs delete-item" href="'.route('print.edit-capture-form', $row->id).'">  <i class="fa fa-edit"></i>    </a>';
            })
            // ->addColumn('action', 'capture.action')
            ->setRowId('id')
            ->rawColumns(['image','action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Capture $model): QueryBuilder
    {
        return $model->newQuery()
        ->select('capture.*')
        ->join(
            DB::raw('(SELECT c.payroll_no as p_no, c.modality, c.municipality, c.year 
                      FROM capture c 
                      WHERE c.deleted_at IS NULL 
                      GROUP BY c.payroll_no, c.modality, c.municipality, c.year 
                      HAVING COUNT(*) > 1) as duplicates'),
            function ($join) {
                $join->on('capture.payroll_no', '=', 'duplicates.p_no')
                     ->on('capture.modality', '=', 'duplicates.modality')
                     ->on('capture.municipality', '=', 'duplicates.municipality')
                     ->on('capture.year', '=', 'duplicates.year');
            }
        )->orderBy('capture.payroll_no', 'asc');
    }

    public function countRecords(): int
    {
        return Capture::select('capture.*')
        ->join(
            DB::raw('(SELECT c.payroll_no as p_no, c.modality, c.municipality, c.year 
                      FROM capture c 
                      WHERE c.deleted_at IS NULL 
                      GROUP BY c.payroll_no, c.modality, c.municipality, c.year 
                      HAVING COUNT(*) > 1) as duplicates'),
            function ($join) {
                $join->on('capture.payroll_no', '=', 'duplicates.p_no')
                     ->on('capture.modality', '=', 'duplicates.modality')
                     ->on('capture.municipality', '=', 'duplicates.municipality')
                     ->on('capture.year', '=', 'duplicates.year');
            }
        )->count();
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
            Column::make('name'),
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
