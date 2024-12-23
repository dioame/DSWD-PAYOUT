<?php

namespace App\DataTables;

use App\Models\Admin\Payroll;
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

class NYCaptureDataTable extends DataTable
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
            ->addColumn('image', function ($row) {
                return ' <div style="width:30px;"><a href="'.asset("storage/" . $row->path).'" target=_blank>
                            <img src="'.asset("storage/" . $row->path).'" alt="" style="max-width:100%;max-height:100%;border-radius:50px;">
                        </a></div>';
            })
            // ->addColumn('claimed_status', function ($row) {
            //     $options = [
            //         'unclaimed' => 'Unclaimed / not yet claimed',
            //         'claimed_no_photo_docs' => 'Claimed but no photo docs',
            //         'will_not_claim' => 'Will not claim',
            //     ];
            //     $select = '<select class="form-control" onchange="claimedStatus('.$row->id.',this.value)">';
            //     foreach ($options as $value => $label) {
            //         $selected = ($value == $row->claimed_status) ? 'selected' : '';
            //         $select .= "<option value='$value' $selected>$label</option>";
            //     }
            //     $select .= '</select>';
            //     return $select;
            // })
            ->addColumn('claimed_status', function ($row) {
                $options = [
                    'unclaimed' => 'Unclaimed / not yet claimed',
                    'claimed_no_photo_docs' => 'Claimed but no photo docs',
                    'will_not_claim' => 'Will not claim',
                    'duplication' => 'Duplication',
                ];
                return $row['claimed_status'] ? $options[$row['claimed_status']] : "-";
            })
            ->addColumn('action', function ($row) {
                return "<button class='btn btn-success btn-xs' data-bs-toggle='modal' data-bs-target='#editModal' onclick='selectModal(`$row->id`)'><span class='fa fa-edit'></span></button>";
            })
            // ->addColumn('action', 'capture.action')
            ->setRowId('id')
            ->rawColumns(['image','claimed_status','action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Payroll $model): QueryBuilder
    {
        return $model->newQuery()->leftJoin(DB::raw('(SELECT * FROM capture WHERE deleted_at IS NULL) c'),    function ($join) {
            $join->on('payroll.payroll_no', '=', 'c.payroll_no')
                 ->on('payroll.modality', '=', 'c.modality')
                 ->on('payroll.municipality', '=', 'c.municipality')
                 ->on('payroll.year', '=', 'c.year');
        })
            ->select('payroll.*')
            ->whereNull('c.payroll_no')
            ->whereNull('c.deleted_at');
    }

    public function countRecords(): int
    {
        return Payroll::leftJoin(DB::raw('(SELECT * FROM capture WHERE deleted_at IS NULL) c'),    function ($join) {
                $join->on('payroll.payroll_no', '=', 'c.payroll_no')
                     ->on('payroll.modality', '=', 'c.modality')
                     ->on('payroll.municipality', '=', 'c.municipality')
                     ->on('payroll.year', '=', 'c.year');
            })
        ->select('payroll.*')
        ->whereNull('c.payroll_no')
        ->whereNull('c.deleted_at')
        ->count();
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
            Column::make('barangay'),
            Column::make('municipality'),
            Column::make('modality'),
            Column::make('year'),
          
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('claimed_status'),
            Column::make('action'),
            // Column::make('image'),
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
