    <?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;

class productDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'productdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->make(true);
    }


    public function query(User $model)
    {
        $products = Products::select();
        return $this->applyScopes($products);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        ->columns([
            'products_id',
            'name',
            'details',
            'price',
        ])
        ->parameters([
            'dom' => 'Bfrtip',
            'buttons' => ['csv','excel', 'pdf'],
        ]);}

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'add your columns',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_' . date('YmdHis');
    }
}
