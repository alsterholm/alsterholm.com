---
title: Using Models as Flags
published_at: 2024-06-07
tags:
    - Laravel
    - Database
---

One thing I've been experimenting with lately, with positive results, is using models as flags. When
you need to flag one of your models somehow, you might add a boolean to your table to indicate a
certain status. For example, let's say you add a feature to your application for deactivating users.
You alter your users table with a migration like this:

```php
Schema::table('users', function (Blueprint $table) {
    $table->boolean('is_deactivated')->default(false);
});
```

Great stuff! You can now update the `is_deactivated` column in your database and check the
`$user->is_deactivated` in your code whenever you need to deal with a user's deactivation state.
This was the pattern I was using when I started out, and for a lot of use cases, this works
perfectly fine.

## Using timestamps as flags

However, a bunch of years ago, I came across a Twitter post (sadly I cannot remember who wrote it,
sorry!) recommeding that we use _timestamps_, rather than boolean flags:

```php
Schema::table('users', function (Blueprint $table) {
    $table->timestamp('deactivated_at')->nullable();
});
```

This would have the added benefit of allowing you to see _when_ a user was deactivated, without much
trade-off (save for a few extra bytes of database storage). What I tend to do when applying this
pattern is to add a `isDeactivated` method on my model to make sure the code still reads well.

```php
public function isDeactivated(): bool
{
    return $this->deactivated_at !== null;
}
```

## Simple flag limitations

The downside of using simple flags in your database (be it booleans or timestamps), is the data we
have available is very limited. In the first case, we simply have a yes or no to our question, and
in the latter, the small addition of a timestamp (which would be deleted if we ever decide to
reactivate the user again).

But what if we needed to know _who_ deactivated the user? Sure, we could add something like a
`deactivated_by` and in most cases, that would work just fine. But maybe we want to attach a text
field where the person doing the deactivation could add a reason or something.

## Using models as flags

The solution I've started exploring recently is using models as flags, and it's no magic really.
It's just as simple as adding a new model with a relationship to the model you want to flag. In 
the exampel above with being able to deactivate users, we could simple add a `Deactivation` model
and define a relationship between the two:

```php
Schema::create('deactivations', function (Blueprint $table) {
    $table->id();
    $table->text('reason')->nullable();
    $table->foreignId('user_id');
    $table->foreignId('admin_id');
    $table->timestamps();
    $table->softDeletes();
});
```

```php
public function deactivations(): HasMany
{
    return $this->hasMany(Deactivation::class);
}
```

Now we can add basically any data we want. With soft deletes enabled on the Deactivation model, we
get the added benefit of a historic view of the user's deactivations and reactivations.

We could even take this a step further and make the relationship polymorphic and extract the
functionality into a `Deactivatable` trait, allowing us to use this on virtually any model we'd
like.

```php
Schema::create('deactivations', function (Blueprint $table) {
    $table->id();
    $table->text('reason')->nullable();
    $table->morphs('deactivatable');
    $table->timestamps();
    $table->softDeletes();
});
```

```php
trait Deactivatable
{
    public function deactivations()
    {
        return $this->morphMany(Deactivation::class, 'deactivatable');
    }

    public function isDeactivated()
    {
        return $this->deactivations->exists();
    }

    // Additional helper methods
}
```

## A word of advice

In most cases, a simple boolean or timestamp column will serve you just fine. It's important to note
that the techniques shown above introduce _a lot_ of complexity, and the benefits you'd get may be
things that you don't actually need. As with everything, make sure you consider your individual use
case before using this in the applications you're working on.
