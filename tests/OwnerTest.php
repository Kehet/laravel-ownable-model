<?php

use Kehet\LaravelOwnableModel\Tests\Models\Comment;
use Kehet\LaravelOwnableModel\Tests\Models\User;

it('can get owner relation', function () {
    $user = User::create([
        'name' => 'Erkki Esimerkki',
    ]);

    $comment = Comment::create([
        'body' => 'Tämä on hyvä',
        'owned_by_id' => $user->id,
    ]);

    expect($comment->owner)
        ->toBeInstanceOf(User::class)
        ->id
        ->toBe($user->id);
});

it('can check owner', function () {
    $goodUser = User::create([
        'name' => 'Erkki Esimerkki',
    ]);

    $badUser = User::create([
        'name' => 'Maija Mallinen',
    ]);

    $comment = Comment::create([
        'body' => 'Tämä on hyvä',
        'owned_by_id' => $goodUser->id,
    ]);

    expect($comment->isOwnedBy($goodUser))
        ->toBeTrue()
        ->and($comment->isOwnedBy($badUser))
        ->toBeFalse()
        ->and($comment->isNotOwnedBy($goodUser))
        ->toBeFalse()
        ->and($comment->isNotOwnedBy($badUser))
        ->toBeTrue();
});

it('can query with owner', function () {
    $goodUser = User::create([
        'name' => 'Erkki Esimerkki',
    ]);

    $badUser = User::create([
        'name' => 'Maija Mallinen',
    ]);

    $goodComment = Comment::create([
        'body' => 'Tämä on hyvä',
        'owned_by_id' => $goodUser->id,
    ]);

    $badComment = Comment::create([
        'body' => 'Tämä on paha',
        'owned_by_id' => $badUser->id,
    ]);

    expect(Comment::whereOwnedBy($goodUser)->get())
        ->toHaveCount(1)
        ->first()->id
        ->toBe($goodComment->id);

    expect(Comment::whereNotOwnedBy($goodUser)->get())
        ->toHaveCount(1)
        ->first()->id
        ->toBe($badComment->id);
});
