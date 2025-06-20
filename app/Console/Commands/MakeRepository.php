<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repo {repository_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to create your custom repository.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try{
            $app_path = app_path("Repository");
            if(!file_exists($app_path)){
                mkdir($app_path);
            }
            $this->makeRepo($app_path,$this->argument('repository_name'));
        }catch(Exception $e){
            $this->error($e->getMessage());
        }
    }

    private function makeRepo($app_path,$repo_name){
        $repo_name = ucfirst($repo_name);
        $stub = self::stub($repo_name);
        $file  = $app_path.DIRECTORY_SEPARATOR .$repo_name."Repository.php";

        if(file_exists($file)){
            throw new Exception("{$file} already exists");
        }

        $handle = fopen($file, "w");
        if ($handle) {
            fwrite($handle, $stub);
            fclose($handle);
            $this->info("{$file} created successfully");
        } else {
            throw new Exception("Failed to create file: $file");
        }
    }

    private function stub($repo_name){
        $functionAndParameter = [
            "store" => 'Model $model,array $data',
            "update" => 'Model $model,array $data',
            "updateStatus" => 'Model $model',
            "delete" => 'Model $model',
        ];

        $stub = "<?php".PHP_EOL;
        $stub .= "namespace App\Repository;".PHP_EOL;
        $stub .= "".PHP_EOL;
        $stub .= "use App\Interface\RepositoryInterface;".PHP_EOL;
        $stub .= "use Illuminate\Database\Eloquent\Model;".PHP_EOL;
        $stub .= "".PHP_EOL;
        $stub .= "class {$repo_name}Repository implements RepositoryInterface{".PHP_EOL;
        $stub .= "\t".'public function __construct(){'.PHP_EOL;
        $stub .= "\t\t".'//empty construct'.PHP_EOL;
        $stub .= "\t}".PHP_EOL;
        $stub .= "".PHP_EOL;
        foreach($functionAndParameter as $function => $params){
            $parameters = explode(',',$params);
            $comment = $this->generatePHPDoc($function,$parameters);
            $stub .= $comment;
            $stub .= "\tpublic function {$function} ($params){".PHP_EOL;
            $stub .= "\t\t".'//do something here'.PHP_EOL;
            $stub .= "\t}".PHP_EOL;
            $stub .= "".PHP_EOL;
        }
        $stub .= "}".PHP_EOL;
        return $stub;
    }

    private function generatePHPDoc($function,$parameters){
        $prettifiedFunctionName = $this->prettifyFunctionName($function);
        $comment = "\t/**".PHP_EOL;
        $comment .= "\t *".PHP_EOL;
        $comment .= "\t * {$prettifiedFunctionName}".PHP_EOL;
        foreach($parameters as $p){
            $comment .= "\t * @param {$p}".PHP_EOL;
        }
        $comment .= "\t * @return void".PHP_EOL;
        $comment .= "\t */".PHP_EOL;
        return $comment;
    }

    private function prettifyFunctionName($name){
        // Converts camelCase like 'updateStatus' into 'Update Status'
        return ucwords(preg_replace('/(?<!^)[A-Z]/', ' $0', $name));
    }
}