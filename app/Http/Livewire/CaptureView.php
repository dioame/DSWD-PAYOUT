<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\GridView;
use App\Models\Admin\Capture;
class CaptureView extends GridView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Capture::class;

    /**
     * Sets the data to every card on the view
     *
     * @param $model Current model for each card
     */
    public function card($model)
    {
        return [
            'payroll_no' => $model->payroll_no,
            'path' => $model->path,
            'captured_by' => $model->captured_by,
            'captured_at' => $model->captured_at
        ];
    }

    public function onCardClick(Capture $model)
    {

    }
}
