<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class InvoiceStatusBarChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        parent::__construct();
          $this->labels(['الفواتير الغير المدفوعة', 'الفواتير المدفوعة','الفواتير المدفوعة جزئيا']);

        $this->dataset('حالات الفواتير', 'bar', $data)
             ->backgroundColor(['#ec5858', '#81b214', '#ff9642']);
    }
}
