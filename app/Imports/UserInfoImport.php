<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class UserInfoImport implements ToCollection
{
    use Importable;


    private $rows = 0;
    private $data = [];



    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if ($row[1] != 'USERID' && $row[2] != 'Badgenumber'   && $row[3] != 'Name') {
               

           
              
                   
                $this->data[] = [
                    'user_id' => $row[0],
                    'badge_number' => $row[1],
                    'name' =>  $row[3],

                ];
               
           
    
                $this->rows++;
                // dd($rows);
            }
            //main if
        }
        //foreach
    }

    public function getRowCount()
    {
        return $this->rows;
       
    }

    public function getData()
    {
        return $this->data;
       
    }

    
}
