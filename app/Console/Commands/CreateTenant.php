<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use App\Notifications\TenantCreated;
use Hyn\Tenancy\Models\Hostname;
use Illuminate\Console\Command;

class CreateTenant extends Command
{
    protected $signature = 'tenant:create {name} {email} {password}';

    protected $description = 'Creates a tenant with the provided name and email address e.g. php artisan tenant:create boise boise@example.com';

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        $baseUrl = config('app.url_base');
        $fqdn = "{$name}.{$baseUrl}";

        if ($this->tenantExists($fqdn)) {
            $this->error("A tenant with fqdn '{$fqdn}' already exists.");

            return;
        }

        $tenant = Tenant::createFrom($name, $email, $password);
        $this->info("Tenant '{$name}' is created and is now accessible at {$tenant->hostname->fqdn}");

        // invite admin
        $tenant->admin->notify(new TenantCreated($tenant->hostname));
        $this->info("Admin {$email} has been invited!");
    }

    private function tenantExists($fqdn): bool
    {
        return Hostname::where('fqdn', $fqdn)->exists();
    }
}