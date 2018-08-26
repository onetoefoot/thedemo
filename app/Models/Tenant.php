<?php

namespace App\Models;

use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Illuminate\Support\Facades\Hash;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;

/**
 * @property Website website
 * @property Hostname hostname
 * @property User admin
 */
class Tenant
{
    public function __construct(Website $website = null, Hostname $hostname = null, User $admin = null)
    {
        $this->website = $website;
        $this->hostname = $hostname;
        $this->admin = $admin;
    }

    public function delete()
    {
        app(HostnameRepository::class)->delete($this->hostname, true);
        app(WebsiteRepository::class)->delete($this->website, true);
    }

    public static function createFrom($name, $email, $password = null): Tenant
    {
        $website = new Website;
        app(WebsiteRepository::class)->create($website);

        // associate the website with a hostname
        $hostname = new Hostname;
        $baseUrl = config('app.url_base');
        $hostname->fqdn = "{$name}.{$baseUrl}";
        app(HostnameRepository::class)->attach($hostname, $website);

        // make hostname current
        app(Environment::class)->hostname($hostname);

        $admin = static::makeAdmin($website, $name, $email, $password ?: str_random());

        return new Tenant($website, $hostname, $admin);
    }

    private static function makeAdmin($website, $name, $email, $password): User
    {
        $tenancy = app(Environment::class);
        $tenancy->tenant($website);

        $user = new User;
        $admin = $user->create(['name' => $name, 'email' => $email, 
            'password' => Hash::make($password), 'active' => 1, 'confirmed' => 1]);
        $admin->guard_name = 'web';
        $admin->assignRole('admin');

        return $admin;
    }

    public static function retrieveBy($fqdn): ?Tenant
    {
        if ($hostname = Hostname::where('fqdn', $fqdn)->first()) {
            $website = Website::where('id', $hostname['website_id'])->first();
            return new Tenant($website, $hostname);
        }

        return null;
    }
}