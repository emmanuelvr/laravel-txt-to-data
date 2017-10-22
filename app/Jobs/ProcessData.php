<?php

namespace App\Jobs;

use App\Data;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $path;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename)
    {
        $this->path = 'tmp/' . $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Data::truncate(); // For testing only

        $content = utf8_encode(Storage::get($this->path));
        Storage::delete($this->path);
        $rows = explode("\r\n", $content);

        $datas = [];
        $count = 0;

        foreach($rows as $row){
            $values = explode('|', $row);
            $this->makeModel($values);
            $count++;
        }
        return;
    }

    public function makeModel($values)
    {
        $data = new Data();
        $fields = ['nombre', 'direccion', 'telfijo', 'ciudad', 'celular', 'cedula'];

        foreach($values as $key => $value){
            if($key === 6){
                continue;
            }
            $field = $fields[$key];
            $data->$field = $value;
        }
        $data->save();
        return $data;
    }
}
