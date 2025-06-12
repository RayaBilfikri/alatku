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
        
        // Path ke vendor Laravel exception renderer
        $vendorContextPath = base_path('vendor/laravel/framework/src/Illuminate/Foundation/resources/exceptions/renderer/components/context.blade.php');
        
        // Check apakah file vendor ada
        if (!file_exists($vendorContextPath)) {
            $this->error('Vendor context file not found at: ' . $vendorContextPath);
            return Command::FAILURE;
        }
        
        $this->info('Found vendor context file: ' . $vendorContextPath);
        
        // Baca content file
        $content = file_get_contents($vendorContextPath);
        
        // Check apakah sudah di-patch
        if (strpos($content, 'method_exists($exception, \'requestHeaders\')') !== false) {
            $this->info('File already patched!');
            return Command::SUCCESS;
        }
        
        // Backup original content (optional)
        $backupPath = storage_path('framework/patches/context.blade.php.backup');
        if (!file_exists(dirname($backupPath))) {
            mkdir(dirname($backupPath), 0755, true);
        }
        file_put_contents($backupPath, $content);
        $this->info('Backup created at: ' . $backupPath);
        
        // Apply patch: ganti @forelse yang bermasalah
        $oldPattern = '@forelse ($exception->requestHeaders() as $key => $value)';
        $newPattern = '@forelse (method_exists($exception, \'requestHeaders\') ? $exception->requestHeaders() : [] as $key => $value)';
        
        // Atau pattern yang lebih fleksibel jika syntax berbeda
        $patterns = [
            // Pattern 1: Direct call
            '/@forelse\s*\(\s*\$exception->requestHeaders\(\)\s+as\s+\$key\s*=>\s*\$value\s*\)/' => '@forelse (method_exists($exception, \'requestHeaders\') ? $exception->requestHeaders() : [] as $key => $value)',
            
            // Pattern 2: Dengan spasi berbeda
            '/@forelse\s*\(\s*\$exception->requestHeaders\(\)\s*as\s*\$key\s*=>\s*\$value\s*\)/' => '@forelse (method_exists($exception, \'requestHeaders\') ? $exception->requestHeaders() : [] as $key => $value)',
        ];
        
        $patched = false;
        foreach ($patterns as $pattern => $replacement) {
            if (preg_match($pattern, $content)) {
                $content = preg_replace($pattern, $replacement, $content);
                $patched = true;
                $this->info('Applied patch using pattern: ' . $pattern);
                break;
            }
        }
        
        // Fallback: simple string replace
        if (!$patched && strpos($content, '$exception->requestHeaders()') !== false) {
            $content = str_replace(
                '$exception->requestHeaders()',
                'method_exists($exception, \'requestHeaders\') ? $exception->requestHeaders() : []',
                $content
            );
            $patched = true;
            $this->info('Applied patch using string replacement');
        }
        
        if (!$patched) {
            $this->warn('No matching pattern found. File might already be different.');
            return Command::SUCCESS;
        }
        
        // Write patched content
        if (file_put_contents($vendorContextPath, $content)) {
            $this->info('✅ Vendor context file patched successfully!');
            $this->info('Fixed: method_exists check added for requestHeaders()');
        } else {
            $this->error('❌ Failed to write patched file');
            return Command::FAILURE;
        }
        
        return Command::SUCCESS;
    }
}