<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FixExceptionViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:exception-views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix exception views compilation issues with Bootstrap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fixing exception views...');
        
        // Path yang benar ke file context component
        $contextPath = resource_path('views/exceptions/components/context.blade.php');
        $exceptionsDir = resource_path('views/exceptions');
        $componentsDir = resource_path('views/exceptions/components');
        
        // Ensure directories exist
        if (!is_dir($exceptionsDir)) {
            mkdir($exceptionsDir, 0755, true);
            $this->info('Created exceptions directory');
        }
        
        if (!is_dir($componentsDir)) {
            mkdir($componentsDir, 0755, true);
            $this->info('Created exceptions/components directory');
        }
        
        // Check dan fix file context jika ada masalah
        if (file_exists($contextPath)) {
            $this->info('Found context component at: ' . $contextPath);
            
            $content = file_get_contents($contextPath);
            
            // Fix Bootstrap compilation issues
            // Contoh: Tambahkan CSS/JS yang dibutuhkan Bootstrap
            if (!strpos($content, '@vite') && !strpos($content, 'bootstrap')) {
                $viteDirective = "@vite(['resources/css/app.css', 'resources/js/app.js'])\n";
                $content = $viteDirective . $content;
                $this->info('Added Vite directive for Bootstrap assets');
            }
            
            // Fix syntax issues yang sering terjadi
            $content = str_replace(['{{--', '--}}'], ['<!-- ', ' -->'], $content);
            
            // Write back the fixed content
            file_put_contents($contextPath, $content);
            $this->info('Context component fixed!');
            
        } else {
            $this->warn('Context component not found at: ' . $contextPath);
            $this->info('Creating basic context component...');
            
            // Create basic context component if not exists
            $basicContent = '<div class="exception-context">
    <!-- Exception context content -->
    {{ $slot ?? "" }}
</div>';
            
            file_put_contents($contextPath, $basicContent);
            $this->info('Basic context component created!');
        }
        
        $this->info('Exception views fixed successfully!');
        
        return Command::SUCCESS;
    }
}