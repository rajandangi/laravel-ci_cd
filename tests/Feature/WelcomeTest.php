<?php

use App\Models\User;
use Illuminate\Support\Facades\Redis;

it('increments the page count for each visit', function () {
    Redis::del('landing-page-views');

    $this->get('/');
    $this->get('/');
    $this->get('/');

    expect(Redis::get('landing-page-views'))->toEqual(3);
});

it('provides users in random paginated order', function () {
    $users = User::factory(3)->create();

    $users = collect($this->get('/')->viewData('users')->items())
        ->merge($this->get('/?page=2')->viewData('users')->items());

    expect($users->count())->toBe($users->unique('id')->count());
})->repeat(3);
