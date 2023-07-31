<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExistsInTable implements Rule
{
    protected $table;
    protected $column;

    public function __construct($table, $column)
    {
        $this->table = $table;
        $this->column = $column;
    }

    public function passes($attribute, $value)
    {
        // Check if the value exists in the specified table and column
        return DB::table($this->table)
            ->where($this->column, $value)
            ->exists();
    }

    public function message()
    {
        return 'The selected :attribute does not exist in the specified table.';
    }
}