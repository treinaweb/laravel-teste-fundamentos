<?php

namespace App\Services;

class SpreadsheetService
{
    public function processSpreadsheet($filePath)
    {
        $products_data = app('importer')->import($filePath);

        $validItems = [];
        foreach ($products_data as $row) {
            if ($this->validateRow($row)) {
                $validItems[] = $row;
            }
        }
    
        return $validItems;
    }

    private function validateRow(array $row): bool
    {
        if (empty($row['product_code']) || !isset($row['quantity'])) {
            return false;
        }

        if (!is_int($row['quantity']) || $row['quantity'] < 1) {
            return false;
        }

        return true;
    }
}
