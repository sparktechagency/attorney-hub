<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use Illuminate\Support\Str;

class GenerateCategoryUuids extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:generate-uuids';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate UUIDs for categories that don\'t have them';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $categories = Category::whereNull('uuid')->get();
        
        if ($categories->isEmpty()) {
            $this->info('All categories already have UUIDs!');
            return 0;
        }

        $this->info("Found {$categories->count()} categories without UUIDs. Generating...");

        foreach ($categories as $category) {
            $category->uuid = Str::uuid();
            $category->save();
            $this->line("Generated UUID for category: {$category->name} -> {$category->uuid}");
        }

        $this->info('All UUIDs generated successfully!');
        return 0;
    }
} 