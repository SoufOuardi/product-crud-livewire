<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeEnum extends Command
{
    protected $signature = 'make:enum {name}';
    protected $description = 'Create a new Enum class';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Enums/{$name}.php");

        if (File::exists($path)) {
            $this->error("Enum {$name} already exists!");
            return;
        }

        $template = "<?php\n\nnamespace App\Enums;\n\nenum {$name}: int\n{\n    // Define your cases here\n}\n";

        File::put($path, $template);

        $this->info("Enum {$name} created successfully at {$path}");
    }
}
