<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class CheckTimeImport implements ToCollection
{
    use Importable;

    protected $startDate;
    protected $endDate;

    private $rows = 0;
    private $data = [];

    

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;

        // dd($startDate, $endDate);
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if ($row[1] != 'CHECKTIME' && $row[0] != 'USERID') {
                $checkTime = Date::excelToDateTimeObject($row[1]);
                // dd($checkTime, $this->startDate, $this->endDate);

                $checkTimeFormatted = $checkTime->format('Y-m-d');

                // Check if the date is within the specified range
                if ($checkTimeFormatted >= $this->startDate && $checkTimeFormatted <= $this->endDate){
                   
                $this->data[] = [
                    'user_id' => $row[0],
                    'check_time' => $checkTime->format('Y-m-d H:i:s')
                ];
               
            }else
            //inner ifelse
             {
                // Debugging statement to see if data is being correctly filtered
                Log::debug("Row {$row[0]} filtered out: {$checkTime->format('Y-m-d H:i:s')}");
            }
    
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
