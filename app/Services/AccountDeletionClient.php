<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class AccountDeletionClient
{
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.admin_api.url'), '/');
        $this->apiKey  = config('services.admin_api.account_deletion_key');
    }

    public function requestDeletion(string $email, string $origin = 'website'): array
    {
        $res = Http::withHeaders(['X-Api-Key' => $this->apiKey])
            ->timeout(15)
            ->acceptJson()
            ->post("{$this->baseUrl}/api/account-deletion/request", [
                'email'  => $email,
                'origin' => $origin,
            ]);

        return [
            'ok'     => $res->successful() || $res->status() === 202,
            'status' => $res->json('status'),
            'message'=> $res->json('message'),
        ];
    }

    public function confirmDeletion(string $token): array
    {
        $res = Http::withHeaders(['X-Api-Key' => $this->apiKey])
            ->timeout(15)
            ->acceptJson()
            ->post("{$this->baseUrl}/api/account-deletion/confirm", [
                'token' => $token,
            ]);

        return [
            'ok'     => $res->successful(),
            'status' => $res->json('status'),
            'email'  => $res->json('email'),
        ];
    }
}