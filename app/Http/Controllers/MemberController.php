<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MemberController extends Controller
{
    /**
     * Members that can be managed here are attendees and speakers only.
     * Admin and organiser accounts are protected from these actions.
     */
    private function query()
    {
        return User::whereIn('role', ['attendee', 'speaker'])->latest();
    }

    public function index(): View
    {
        $members = $this->query()->get();

        return view('members.index', compact('members'));
    }

    public function create(): View
    {
        return view('members.form', ['member' => new User()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', Rule::in(['attendee', 'speaker'])],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        User::create($data);

        return redirect()->route('members.index')->with('status', 'Member created.');
    }

    public function edit(User $member): View
    {
        abort_unless(in_array($member->role, ['attendee', 'speaker'], true), 403, 'This account cannot be managed here.');

        return view('members.form', compact('member'));
    }

    public function update(Request $request, User $member): RedirectResponse
    {
        abort_unless(in_array($member->role, ['attendee', 'speaker'], true), 403, 'This account cannot be managed here.');

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($member->id)],
            'password' => ['nullable', 'string', 'min:8'],
            'role' => ['required', Rule::in(['attendee', 'speaker'])],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        $data['password'] = $data['password'] ?? $member->password;
        $member->update($data);

        return redirect()->route('members.index')->with('status', 'Member updated.');
    }

    public function destroy(User $member): RedirectResponse
    {
        abort_unless(in_array($member->role, ['attendee', 'speaker'], true), 403, 'This account cannot be managed here.');

        $member->delete();

        return back()->with('status', 'Member removed.');
    }
}