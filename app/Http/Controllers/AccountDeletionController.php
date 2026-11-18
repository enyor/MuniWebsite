<?php
namespace App\Http\Controllers;

use App\Services\AccountDeletionClient;
use Illuminate\Http\Request;

class AccountDeletionController extends Controller
{
    protected AccountDeletionClient $client;

    public function __construct(AccountDeletionClient $client)
    {
        $this->client = $client;
    }

    public function showForm()
    {
        return view('account_deletion.form');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'email'   => 'required|email|max:255',
            'confirm' => 'accepted', // checkbox obligatorio
        ]);

        $this->client->requestDeletion($data['email'], 'website');

        // Siempre mostramos el mismo mensaje (no revelar si existe)
        return back()->with('status',
            'Si el correo está registrado, recibirás un enlace de confirmación en los próximos minutos. Revisa también spam.');
    }

    public function confirm(string $token)
    {
        $result = $this->client->confirmDeletion($token);

        return match ($result['status']) {
            'confirmed'         => view('account_deletion.confirmed', ['email' => $result['email'] ?? null]),
            'confirmed_deleted' => view('account_deletion.confirmed', ['email' => $result['email'] ?? null, 'deleted' => true]),
            'already_confirmed' => view('account_deletion.already_confirmed', ['email' => $result['email'] ?? null]),
            'expired'           => view('account_deletion.expired'),
            'not_found'         => view('account_deletion.not_found'),
            default             => view('account_deletion.error'),
        };
    }
}